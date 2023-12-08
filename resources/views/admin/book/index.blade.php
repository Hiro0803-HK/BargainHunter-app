<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍一覧</title>
</head>
<body>
    <main>
        <h1>書籍一覧</h1>
        @if (session('message'))
            <div style="color: blue">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('book.create') }}"></a>
        <table border="1">
            <tr>
                <th>カテゴリ</th>
                <th>書籍名</th>
                <th>価格</th>
            </tr>
            @foreach ($books as $book)
                <tr @if ($loop->even) style="background:#EEE" @endif>
                    <td>{{ $book->category->title }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price }}</td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>