<x-app-layout>
    <x-slot name="header">
        {{ __('IndexCategory') }}
    </x-slot>
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
        <form action="/categories/{{ $category->id }}" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
        
        <h1>{{ $category->name }}メール一覧</h1>
        <div class='maildatas'>
            @forelse($maildatas as $maildata)
                <div class='maildata'>
                    <h2 class = 'title'>
                        <input class="title" id="title" type="checkbox" name="title[]" form="deleteMail" value={{ $maildata->id }}>
                        <a href="/maildatas/{{ $maildata->id }}"> {{ $maildata->title }}</a>
                    </h2>
                    <p class = 'message'>{{ $maildata->message }}</p>
                    <p class = 'date'>{{ $maildata->date }}</p>
                    
                    <p>カテゴリー:
                    <a href="/categories/{{ $maildata->category->id }}">{{ $maildata->category->name }}</a>
                    </p>
                    
                    @can('edit', $maildata)
                        <a id="edit" href="/maildatas/{{ $maildata->id }}/edit">編集</a>
                    @endcan

                </div>
            @empty
                <h2 id="message">メールデータが見つかりません！</h2>
            @endforelse
        </div>
        
        <div class="mail">
            <h3>メール</h3>
            <a href='/maildatas/create'>新規登録</a>
            <form name="deleteMail" id="deleteMail" action="/categories/{{ $category->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">一括削除</button>
            </form>
        </div>

        <div class="category">
            <h3>カテゴリー</h3>
            <a href='/categories/create'>新規作成</a>
            <br>
                <a href='/categories/{{ $category->id }}/edit'>変更</a>
            </br>
        </div>
        
        <div class="links">
            <a href="/categories/list">[カテゴリー一覧へ]</a>
            <br>
                <a href="/">[メール一覧へ]</a>
            </bt>
        </div>
        
        <a href='/maildatas/top'>TOPページへ</a>
    
        <div class='paginate'>
            {{ $maildatas->appends(request()->input())->links() }}
        </div>
        
    </body>
    
</html>
</x-app-layout>