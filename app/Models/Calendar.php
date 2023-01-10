<?php
namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\GoogleCalendar;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use DateTime;

require_once __DIR__ . '../../../vendor/autoload.php';

class Calendar
{
    public function index($request)
    {
        $aimJsonPath = Storage::path('aimJsonPath.json');
        $calendarId = env('CALENDAR_ID');
        
        if(file_exists($aimJsonPath)) {
            $json = str_replace('BEGINPRIVATEKEY','BEGIN PRIVATE KEY',env('GCA'));
            $json = str_replace('ENDPRIVATEKEY','END PRIVATE KEY',$json);
            
            file_put_contents($aimJsonPath,$json);
        }
        
        $client = new Client();
        
        $client->setApplicationName('GoogleCalendar');
        
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        
        $client->setAuthConfig($aimJsonPath);
        
        $service = new Google_Service_Calendar($client);
        
        $startTime = new DateTime($request->data['begin']);
        
        $endTime = new DateTime($request->data['finish']);
        
        $event = new Google_Service_Calendar_Event(array(
            'summary' => $request->data['subject'],
            'description' => $request->data['message'],
            'start' => array(
                'dateTime' => $startTime->format('Y-m-d\TH:i:sP'),
                // 'dateTime' => '2022-12-16T16:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),

            'end' => array(
                'dateTime' => $endTime->format('Y-m-d\TH:i:sP'),
                // 'dateTime' => '2022-12-20T08:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
        ));
        
        $event = $service->events->insert($calendarId, $event);
        
        file_put_contents($aimJsonPath,'');
        
        return $event;
    }

}