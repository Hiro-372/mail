<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>メール一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>メール一覧</h1>
        <div class='maildatas'>
            @foreach($maildatas as $maildata)
                <div class='maildata'>
                    <h2 class = 'title'>
                        <a href="/maildatas/{{ $maildata->id }}"> {{ $maildata->title}}</a>
                    </h2>
                    <p class = 'message'>{{ $maildata->message }}</p>
                    <p class = 'date'>{{ $maildata->date }}</p>
                    <p>カテゴリー：
                    <a href="/categories/{{ $maildata->category->id}}">{{ $maildata->category->name }}</a>
                </div>
            @endforeach
        </div>

        <div class="mail">
            <h3>メール</h3>
            <a href='/maildatas/entry'>新規登録</a>
            <a href=''>変更</a>
            <a href=''>削除</a>
        </div>
        
        <div class="category">
            <h3>カテゴリー</h3>
            <a href=''>新規作成</a>
            <a href=''>変更</a>
            <a href=''>削除</a>    
    
        <div class='paginate'>
            {{ $maildatas->links() }}
        </div>
    
    </body>
    
</html>
