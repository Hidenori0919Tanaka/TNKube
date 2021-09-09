<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>TNKube</title>

    <style>
        .top-bar {
            background-color: #343a40;
        }
    </style>

    @yield('css')
</head>
<body>

<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg">
                    <a class="nav-link" href="{{ route('top.index') }}">TNKube <span class="sr-only">(current)</span></a>

                    @auth
                        {{-- <a href="{{ route('top.index') }}" class="nav-link">Home</a> --}}
                        <a href="{{ route('registerchannel.index') }}" class="nav-link">登録チャンネル一覧</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                        <a href="{{ route('register') }}" class="nav-link">ユーザー登録</a>
                    @endauth

                    <form class="form-inline" method="GET" action="{{ route('top.result') }}">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
                </nav>
            </div>
        </div>
    </div>
</div>

@yield('content')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
