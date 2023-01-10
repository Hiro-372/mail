<x-app-layout>
    <x-slot name="header">
        {{ __('EditCategory') }}
    </x-slot>
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー編集画面</title>
    </head>
    
    <body>
        <h1 class="title">編集画面</h1>
        
        <div class="content">
            <form action="/categories/{{ $categories->id }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class='content__name'>
                    <h2>カテゴリー名</h2>
                    <input type='text' name='category[name]' value="{{ $categories->name }}">
                </div>
        
                <div class='content__explanatory'>
                    <h2>説明文</h2>
                    <input type='text' name='category[explanatory]' value="{{ $categories->explanatory }}">
                </div>
                
                <div class='content__user'>
                    <h2>ユーザー選択</h2>
                    <p>現在のユーザー : {{ $categories->user->name }}</p>
                    <select name="category[users_id]">
                        <option value="{{ $categories->user->id}}">{{ $categories->user->name }}</option>
                    </select>
                </div>

                <input type="submit" value="更新">

            </form>
        </div>
        
        <div class="back"><a href="/categories/list">[カテゴリー一覧へ]</div>
        
    </body>
    
</html>
</x-app-layout>