@extends('layouts.community')
        @section('title')
            Arts And Creatives
        @endsection

@section('header')
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>For Any Artistic Talent</h1>
                    <p class="lead-2 opacity-90 mt-6">Create And Post Your Work For The World To See</p>

                </div>
            </div>

        </div>
    </header>
    @endsection

        @section('content')
            <main class="main-content">
                <div class="section bg-gray">
                    <div class="container">
                        <div class="row">


                            <div class="col-md-7 col-xl-9">
                                <div class="row">

                                    <div class="col-md-6">
                                        @forelse($posts as $post)
                                            <div class="card border hover-shadow-6 mb-6 d-block">
                                                <a href="{{route('community.show', $post->id)}}"><img oncontextmenu="return false" class="card-img-top" src="{{asset('/storage/'. $post->image)}}" alt="Card image cap"></a>
                                                <div class="p-6 text-center">
                                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">{{$post->category->name}}</a></p>
                                                    <h5 class="mb-0"><a class="text-dark" href="{{route('community.show', $post->id)}}">{{$post->title}}</a></h5>
                                                </div>
                                            </div>

                                            @empty
                                            <p class="text-center">No result for search {{strtoupper(request()->query('search'))}}</p>
                                        @endforelse

                                    </div>

                                    <div class="col-md-6">
                                        @foreach($posts as $post)
                                    <div class="my-11">

                                        <p><img src="{{Gravatar::src($post->user->email)}}"> {{$post->user->name}}</p>
                                        @if($post->user->membership === 'prime')
                                            <p class="badge badge-pill text-white" style="background-color: #007bb6">
                                                prime member
                                            </p>
                                        @endif

                                    </div>
                                        @endforeach
                                    </div>

                                </div>


                                {{--<nav class="flexbox mt-30">--}}
                                    {{--<a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>--}}
                                    {{--<a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>--}}
                                {{--</nav>--}}

                                {{$posts->appends(['search' => request()->query('search')])->links()}}
                            </div>



                            @include('partials.sidebar')

                        </div>
                    </div>
                </div>
            </main>
        @endsection

@section('footer')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row gap-y align-items-center">

                <div class="col-6 col-lg-3">
                    <a href="../index.html"><img src="../assets/img/logo-dark.png" alt="logo"></a>
                </div>

                <div class="col-6 col-lg-3 text-right order-lg-last">
                    <div class="social">
                        <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                        <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                        <a class="nav-link" href="../uikit/index.html">Terms and Conditions</a>
                        <a class="nav-link" href="../block/index.html">Community</a>
                        <a class="nav-link" href="../page/about-1.html">About</a>

                        <a class="nav-link" href="../page/contact-1.html">Contact</a>
                    </div>
                </div>

            </div>
        </div>
    </footer><!-- /.footer -->
    @endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">



    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
</head>

<body>


<!-- Navbar -->
<!-- /.navbar -->


<!-- Header -->
<!-- /.header -->


<!-- Main Content -->





<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js"')}}"></script>

</body>
</html>

