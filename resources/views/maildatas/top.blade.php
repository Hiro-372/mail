<x-app-layout>
    <x-slot name="header">
        {{ __('Top') }}
    </x-slot>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>HOME</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="../css/top.css" rel="stylesheet">
    </head>
    
    <body>
        <h2>メール一覧</h2>
        <div class='maildatas'>
            <a href='/'>メール一覧へ</a>
        </div>
        
        <h2>カテゴリー一覧</h2>
        <div class="categories">
            <a href='/categories/list'>カテゴリー一覧へ</a>
        </div>
        
        <h2>メール</h2>
        <div class="mail">
            <a href='/maildatas/create'>新規登録</a>
        </div>
        
        <h2>カテゴリー</h2>
        <div class="category">
            <a href='/categories/create'>新規作成</a>
        </div>
    </body>
    
</html>
</x-app-layout>