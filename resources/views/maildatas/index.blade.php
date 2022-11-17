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
                    <a href="/categories/{{ $maildata->category->id}}">{{ $maildata->category->name }}</a>
                </div>
            @endforeach
        </div>
    
        <a href='/maildatas/entry'>entry</a>
    
        <div class='paginate'>
            {{ $maildatas->links() }}
        </div>
    
    </body>
    
</html>
