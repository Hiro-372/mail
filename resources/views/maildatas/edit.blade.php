<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>メール編集画面</title>
    </head>
    
    <body>
        <h1 class="title">編集画面</h1>
        
        <div class="content">
            <form action="/maildatas/{{ $maildata->id }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='maildata[title]' value="{{ $maildata->title }}">
                </div>
        
                <div class='content__message'>
                    <h2>本文</h2>
                    <input type='text' name='maildata[message]' value="{{ $maildata->message }}">
                </div>
                
                <div class='content__date'>
                    <h2>受信日</h2>
                    <input type='text' name='maildata[date]' value="{{ $maildata->date }}">
                </div>
                
                <div class="content__deadline">
                    <h2>提出期限日</h2>
                    <input type='text' name='maildata[deadline]' value="{{ $maildata->deadline }}">
                </div>
                
                <div class='content__link'>
                    <h2>メールへのリンク</h2>
                    <input type='text' name='maildata[link]' value="{{ $maildata->link }}">
                </div>
                
                <div class='content__category'>
                    <h2>カテゴリー選択</h2>
                    <p>現在のカテゴリー : {{ $maildata->category->name }}</p>
                    <select name="maildata[categories_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='content__user'>
                    <h2>ユーザー選択</h2>
                    <p>現在のユーザー : {{ $maildata->user->name }}</p>
                    <select name="maildata[users_id]">
                        <option value="{{ $maildata->user->id}}">{{ $maildata->user->name}}</option>
                    </select>
                </div>

                <input type="submit" value="更新">

            </form>
        </div>
        
        <div class="back"><a href="/">[メール一覧へ]</div>
        
    </body>
    
</html>