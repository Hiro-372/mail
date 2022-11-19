<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>メール一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="text/javascript" src="../js/index.js"></script>
        <link href="../css/index.css" rel="stylesheet">
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
                    
                    <p>カテゴリー:
                    <a href="/categories/{{ $maildata->category->id}}">{{ $maildata->category->name }}</a>
                    </p>
                    
                    <form action="/maildatas/{{ $maildata->id }}" id="form_{{ $maildata->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteMaildata({{ $maildata->id }})">削除</button>
                    </form>
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
            <a href='/categories/create'>新規作成</a>
            <a href=''>変更</a>
            <a href=''>削除</a>
        </div>
    
        <div class='paginate'>
            {{ $maildatas->links() }}
        </div>
    
    </body>
    
</html>
