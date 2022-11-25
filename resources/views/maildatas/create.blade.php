<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>メール登録画面</title>
        <link rel="stylesheet" href="../css/create.css">
    </head>
    
    <body>
        <h1>メール登録</h1>
        <form action="/maildatas" method="POST">
            @csrf
            
            <div class="title">
                <h2>件名</h2>
                <input type="text" name="maildata[title]" placeholder="件名を入力"/>
                <p class="title__error" style="color:red">{{ $errors->first('maildata.title') }}</p>
            </div>
            
            <div class="message">
                <h2>本文</h2>
                <textarea name="maildata[message]" placeholder="本文を入力"></textarea>
                <p class="message__error" style="color:red">{{ $errors->first('maildata.message') }}</p>
            </div>
            
            <div class="date">
                <h2>受信日</h2>
                <input type="datetime-local" name="maildata[date]"/>
                <p class="date__error" style="color:red">{{ $errors->first('maildata.date') }}</p>
            </div>
            
            <div class="deadline">
                <h2>提出期限日</h2>
                <input type="datetime-local" name="maildata[deadline]"/>
                <p>※提出期限がない場合は不要</p>
            </div>
            
            <div class="link">
                <h2>メールへのリンク</h2>
                <textarea name="maildata[link]" placeholder="メールへのURLを入力"></textarea>
                <p class="link__error" style="color:red">{{ $errors->first('maildata.link') }}</p>
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
            
        <input type="submit" value="保存"/>
        </form>
        
        <div class="back"><a href="/">[メール一覧へ戻る]</div>
        
    </body>
    
</html>