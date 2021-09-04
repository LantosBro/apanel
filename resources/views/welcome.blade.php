<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APanel App</title>

    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ route('admin.index') }}">Админка</a>
                    @else
                        <a href="{{ route('login') }}">Вход</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
            @foreach($authors as $author)
                <p>Имя автора: {{ $author['name'] }}</p>
                <p>Книги автора:</p>
                <ul>
                    @foreach($author->books as $book)
                        <li>{{ $book['title'] }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </body>
</html>
