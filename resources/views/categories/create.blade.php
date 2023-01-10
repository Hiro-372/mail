<x-app-layout>
    <x-slot name="header">
        {{ __('CreateCategory') }}
    </x-slot>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー作成画面</title>
    </head>
    
    <body>
        <h1>カテゴリー作成</h1>
        <form action="/categories" method="POST">
            @csrf
            
            <div class="name">
                <h2>カテゴリー名</h2>
                <input type="text" name="category[name]" placeholder="example name"/>
                <p class="name__error" style="color:red">{{ $errors->first('category.name') }}</p>
            </div>
            
            <div class="explanatory">
                <h2>説明文</h2>
                <textarea name="category[explanatory]" placeholder="example explanatory"></textarea>
                <p class="explanatory__error" style="color:red">{{ $errors->first('category.explanatory') }}</p>
            </div>
            
            <div class="user">
                <h2>ユーザー選択</h2>
                <select name="category[users_id]">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
        <input type="submit" value="作成"/>
        </form>
        
        <div class="links">
            <a href="/">[メール一覧へ]</div>
            <a href="/categories/list">[カテゴリー一覧へ]</a>
        </div>
        
    </body>
    
</html>
</x-app-layout>