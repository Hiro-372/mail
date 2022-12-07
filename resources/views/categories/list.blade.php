<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <title>カテゴリー一覧</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="text/javascript" src="../js/index.js"></script>
        <link href="../css/list.css" rel="stylesheet">        
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
                
                <a href="/categories/{{ $category->id }}/edit">編集</a>
                <form action="/categories/{{ $category->id }}" id="form_{{ $category->id }}" method="post">
                    @csrf
                    @method('DELETE')            
                    <button type="button" onclick="deleteCategory({{ $category->id }})">削除</button>
                </form>
            @endforeach
        </div>
        
        <div class="links">
            <a id="create" href="/categories/create">[カテゴリー作成]</a>
            <br>
                <a href="/">[メール一覧へ]</a>
            </br>
        </div>
    </body>
</html>
