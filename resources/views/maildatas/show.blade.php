<x-app-layout>
    <x-slot name="header">
        {{ __('Show') }}
    </x-slot>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>件名{{ $maildatas->title }}</title>
        <!-- Fonts -->
        <link href='../css/show.css' rel="stylesheet">
        <script type="text/javascript" src="../js/index.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h2 class="title">
            件名：{{ $maildatas->title }}<br>
            受信日：{{ $maildatas->date }}
        </h2>

        <h2>本文</h2>
            <input type="text" class="message" value="{{ $maildatas->message }}" disabled/>
        
        <div class="category">
            <p>カテゴリー名 ：
                <a href="/categories/{{ $maildatas->category->id }}">
                    {{ $maildatas->category->name }}
                </a>
            </p>
        </div>
        
        <div class="deadline">
            <p>提出期限日：{{ $maildatas->deadline }}
                <br>
                    <p class="caution">※提出期限日がない場合は何も表示されません。</p>
                </br>
            </p>
        </div>
        
        <div class="mailLink">
            <p>メールリンク：
                <a href="{{ $maildatas->link }}" target="_blank" rel="noopener noreferrer">{{ $maildatas->link }}</a>
            </p>
        </div>
        
        <div class="footer">
            @can('isCorrectUser', $maildatas)
                <p class="edit">[<a href="/maildatas/{{ $maildatas->id }}/edit">編集</a>]</p>
            @endcan
            <a href="/">[メール一覧へ]</a>
            <a href="/categories/list">[カテゴリー一覧へ]</a>
        </div>
    </body>
    
</html>
</x-app-layout>