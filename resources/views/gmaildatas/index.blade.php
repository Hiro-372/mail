<x-app-layout>
    <x-slot name="header">
        {{ __('Gmail') }}
    </x-slot>    
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <link href='../css/gmail.scc' rel="stylesheet">
        <title>メール取得一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>メール取得一覧</h1>
        <div class="gmaildatas">
            @for($i = 0; $i < $counter; $i++)
                <form action="/maildatas" method="post">
                    @csrf
                    
                    <div class="title">
                        <input class="subject" id="subject" type="hidden" name="maildata[title]" value={{ $messages['subject'][$i] }}>
                        <h2>件名:{{ $messages['subject'][$i]}}</h2>
                    </div>
                    
                    <div class="message">
                        <input class="body" id="body" type="text" name="maildata[message]" placeholder="本文を入力"/><br>
                        <iframe
                            srcdoc="{{ $messages['body'][$i] }}"
                            width="600"
                            height="300"
                        ></iframe>
                    </div>
                    
                    <div class="date">
                        <h2>受信日</h2>
                        <input type="datetime-local" name="maildata[date]"/>
                    </div>
                    
                    <div class="deadline">
                        <h2>提出期限日</h2>
                        <input type="datetime-local" name="maildata[deadline]"/>
                        <p>※提出期限がない場合は不要</p>
                    </div>
                    
                    <div class="link">
                        <h2>メールへのリンク</h2>
                        <textarea name="maildata[link]" placeholder="メールへのURLを入力"></textarea>
                    </div>
                    
                    <div class="category">
                        <h2>カテゴリー選択</h2>
                        <select name="maildata[categories_id]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="user">
                        <h2>ユーザー選択</h2>
                        <select name="maildata[users_id]">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                <button type="submit">保存</button>
                </form>
            @endfor
            
        </div>
        
    </body>
    
</html>
</x-app-layout>