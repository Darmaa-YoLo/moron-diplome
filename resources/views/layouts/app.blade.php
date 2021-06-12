<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="uk-background-muted" style="min-height: 100vh; height: auto;">
    <nav class="uk-navbar-container" style="background-color: #2396f3 !important" uk-navbar>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav ">
                <li class="uk-active"><a style="color: white;" href="{{url('/projects')}}">Миний төслүүд</a></li>
                <li class="uk-active">
                    <a style="color: white;" href="#">{{ Auth::user()->name }}</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Гарах') }}
                                </x-dropdown-link>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>