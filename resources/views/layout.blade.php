<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark color_header">
            <div class="container">
                <a class="navbar-brand" href="{{ session('home_url') }}">
                    <img src="{{ asset('img/Lously.png') }}">
                    <div>@yield('dashboard')</div>
                </a>
            </div>
        </nav>
    </header>
    <main>
        @include('componente.msg')
        @yield('main')
    </main>
</body>
@if (session('msg'))
    @if (session('msg') == 'Ok')
        <script>
            msgOk();
        </script>
    @else
        <script>
            msgError();
        </script>
    @endif
    <?php Session::forget('msg'); ?>
@endif
@if (session('login'))
    @if (session('login') == 'ERRO')
        <script>
            acesso();
        </script>
        <?php Session::forget('login'); ?>
    @endif
@endif

</html>
