<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>カテゴリー一覧</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>カテゴリー一覧</h1>
        <div class='categories'>
            @foreach($categories as $category)
                <div class='category'>
                    <h2 class = 'name'>
                        <p>カテゴリー名</p>
                        <a href="/categories/{{ $category->id }}"> {{ $category->name }}</a>
                    </h2>
                    <p>カテゴリー説明文</p>
                    <p class = 'explanatory'>{{ $category->explanatory }}</p>
                </div>
            @endforeach
        </div>
        
        <div class="back"><a href="/">戻る</div>
        
    </body>
</html>
