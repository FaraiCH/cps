<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>



    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
</head>

<body>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="../index.html">

                {{--LOGO--}}
                <img class="logo-dark" src="../assets/img/logo-dark.png" alt="logo">

            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">

                @foreach($categories as $category)

                <li class="nav-item">
                    <a class="nav-link" href="{{route('community.category', $category->id)}}" style="color:black">{{$category->name}}</a>

                </li>
                @endforeach


            </ul>
        </section>



        <div class="navbar-nav ml-auto">
            <!-- Left Side Of Navbar -->





                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-dark btn btn-xs btn-round btn-success text-white" href="{{route('home')}}">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>


        </div>


    </div>
</nav><!-- /.navbar -->


<!-- Header -->
<!-- /.header -->

@yield('header')
<!-- Main Content -->
@yield('content')


@yield('footer')


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js"')}}"></script>

</body>
</html>

