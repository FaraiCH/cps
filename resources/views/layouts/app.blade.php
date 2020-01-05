<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    @yield('css')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown " style="font-family: Verdana">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fa fa-user" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                        My Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session()->has('success'))
                <div class="alert alert-info">
                    {{session()->get('success')}}
                </div>
                @elseif(session()->has('danger'))
                <div class="alert alert-danger">
                    {{session()->get('danger')}}
                </div>
                @endif
           @auth
                <div class="container container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item text-success mx-4 fa fa-paint-brush">
                                    <a style="font-family:Verdana" href={{url('/home')}}> Dashboard</a>
                                </li>
                                @if(auth()->user()->isAdmin())
                                    <li class="list-group-item mx-4 text-warning fa fa-user-ninja">
                                        <a style="font-family:Verdana" href={{route('users.index')}}> Users</a>
                                    </li>
                                    @endif
                                <li class="list-group-item mx-4 text-danger fa fa-pen">

                                    @if(auth()->user()->isAdmin())
                                    <a style="font-family:Verdana" href={{route('posts.index')}}> Post</a>
                                        @else
                                        <a style="font-family:Verdana" href={{route('posts.first', auth()->user()->maid())}}> Post</a>
                                    @endif

                                </li>

                                <li class="list-group-item text-primary mx-4 fa fa fa-clipboard">
                                    <a style="font-family:Verdana" href="/categories"> Category</a>
                                </li>
                                <li class="list-group-item mx-4 fa fa-tags" style="color:mediumpurple">
                                    <a style="font-family:Verdana" href="{{route('tags.index')}}">Tags</a>
                                </li>
                                @if(!auth()->user()->isMember('none'))
                                <li class="list-group-item mx-4 fa fa-pray" style="color:darkblue;">
                                    <a style="font-family:Verdana" href="{{route('primes.index')}}"> Prime Members</a>
                                </li>
                                @endif
                                <li class="list-group-item mx-4 fa fa-user-astronaut" style="color:aqua;">
                                    <a style="font-family:Verdana" href="{{route('primes.create')}}"> Membership</a>
                                </li>
                                <li class="list-group-item mx-4 fa fa-medal" style="wwcolor:#ff6844">
                                    <a style="font-family:Verdana" href="{{route('achieves.index')}}"> Achievements</a>
                                </li>
                            </ul>

                            <ul class="list-group my-5">
                                <li class="list-group-item mx-4 fa fa-remove-format" style="color:#9a000e">
                                    <a style="font-family:Verdana" href={{route('trashed-posts.index')}}> Trashed Posts</a>
                                </li>
                                <li class="list-group-item mx-4 fa fa-user-slash" style="color:#9a000e">
                                    <a style="font-family:Verdana" href={{route('suspended.index')}}> Suspended Users</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>

                </div>

            @else
                @yield('content')
            @endAuth
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>
