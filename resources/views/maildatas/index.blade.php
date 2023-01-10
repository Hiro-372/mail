<x-app-layout>
    <x-slot name="header">
        {{ __('Index') }}
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
        <form action="/" method="GET">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>
        
        <h1>メール一覧</h1>
        <div class='maildatas'>
            @forelse($maildatas as $maildata)
                <div class = 'maildata'>
                    <h2 class = 'title'>
                        <input class="title" id="title" type="checkbox" name="title[]" form="deleteMail" value={{ $maildata->id }}>
                        <a href = "/maildatas/{{ $maildata->id }}"> {{ $maildata->title}}</a>
                    </h2>
                    <p class = 'message'>{{ $maildata->message }}</p>
                    <p class = 'date'>{{ $maildata->date }}</p>
                    
                    <div class='category'>
                        <p>カテゴリー:
                        <a href="/categories/{{ $maildata->category->id }}">{{ $maildata->category->name }}</a>
                        </p>
                    </div>
                    
                    <a id="edit" href="/maildatas/{{ $maildata->id }}/edit">編集</a>
                    
                    <div class="calendar">
                        <p class="title">予定の追加</p>
                        <form action="/calendar" method="post">
                            @csrf
                            <p>
                                件名<input class="subject" type="text" name="data[subject]" size="40" value="{{ $maildata->title }}"><br>
                                詳細<textarea name="data[message]" cols="40"></textarea><br>
                                受信日<input type="datetime-local" name="data[begin]"><br>
                                期限日<input type="datetime-local" name="data[finish]">
                            </p>
                            <button class="button" type="submit" value="{{ $maildata->id }}">[カレンダーに追加]</button>
                        </form>
                    </div>
                    
                </div>
            @empty
                <h2 id="message">メールデータが見つかりません！
                <br>
                    <a href="/">[戻る]</a>
                </br>
                </h2>
            @endforelse
        </div>
        
        <div class="mail">
            <h3>メール</h3>
            <a href='/maildatas/create'>新規登録</a>
            <form name="deleteMail" id="deleteMail" action="/maildatas/{{ $maildata->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">一括削除</button>
            </form>
        </div>

        <div class="createcategory">
            <h3>カテゴリー</h3>
            <a href='/categories/create'>新規作成</a>
        </div>
        
        <a href='/maildatas/top'>TOPページへ</a>
    
        <div class='paginate'>
            {{ $maildatas->appends(request()->input())->links() }}
        </div>
        
    </body>
    
</html>
</x-app-layout>