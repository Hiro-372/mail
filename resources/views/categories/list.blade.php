<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>カテゴリー一覧</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="text/javascript" src="../js/index.js"></script>
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
                
                <form action="/categories/{{ $category->id }}" id="form_{{ $category->id }}" method="post">
                    @csrf
                    @method('DELETE')            
                    <button type="button" onclick="deleteCategory({{ $category->id }})">削除</button>
                </form>
            @endforeach
        </div>
        
        <a href="/categories/create">カテゴリー作成</a>
        <div class="back"><a href="/">[メール一覧へ]</div>
    </body>
</html>
