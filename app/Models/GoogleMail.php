<?php
namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\Gmail;

require __DIR__ . '../../../vendor/autoload.php';

class GoogleMail
{
    public function index()
    {
        $client = $this->getClient();
        $service = new Gmail($client);
        
        $user = 'me';
        $messages = $service->users_messages->listUsersMessages($user);
        
        
        foreach ($messages->getMessages() as $message) {
            $message_id = $message->getID();
            $message_contents = $service->users_messages->get($user, $message_id);
            
            //ヘッダーの取得
            $headers = $message_contents['payload']['headers'];
            $subject_key = array_search('Subject', array_column($headers, 'name'));
            $subject[] = $headers[$subject_key]->value;
            
            //Body
            $size = $message_contents['payload']['body']['size'];
            if (!empty($size)) {
                $datas[] = $url_safe_data = $message_contents['payload']['body']['data'];
                $body[] = base64_decode(str_replace(array('-', '_'), array('+', '/'), $url_safe_data));
            } else {
                $body_parts = $message_contents['payload']['parts'];
                $body[] = $this->get_body($body_parts);
            }
            
        }
        $message_counter = count($subject);
        $message = array('subject' => $subject,'body' => $body);
        return array($message,$message_counter,$datas);
    }
    
    private function get_body($body_parts)
    {
        foreach ($body_parts as $body_part) {
            if ($body_part->mimeType == 'text/html') {
                $datas[] = $url_safe_data = $body_part->body->data;
                $data = str_replace(array('-','_'), array('+','/'), $url_safe_data);
                return base64_decode($data);
            }
        }
    }
    
    private function getClient()
    {
        $oauth_credential = Storage::path('oauth-credential.json');
        $oauth_access_token = Storage::path('oauth-access_token.json');
        
        if(file_exists($oauth_credential)) {
            file_put_contents($oauth_credential,env('TOKEN'));
            
        }
        
        $client = new Client();
        $client->setApplicationName('Gmail API PHP Quickstart');
        $client->setScopes(Gmail::GMAIL_READONLY);
        $client->setAuthConfig($oauth_credential);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        
        if (file_exists($oauth_access_token)) {
            file_put_contents($oauth_access_token,env('TEXT'));
            $accessToken = json_decode(file_get_contents($oauth_access_token), true);
            $client->setAccessToken($accessToken);
        }
        //アクセストークンの有効期限が切れている場合
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($oauth_access_token, json_encode($client->getAccessToken()));
        }
        
        file_put_contents($oauth_access_token,'');
        file_put_contents($oauth_credential,'');
        
        return $client;
    }
    
    

}