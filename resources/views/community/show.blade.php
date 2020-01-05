@extends('layouts.community')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <main class="main-content">


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Blog content
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section">
            <div class="container">

                <div class="text-center mt-8">
                    <h2>{{$post->title}}</h2>
                    <p>{{$post->published_at}} <a href="#">{{$post->category->name}}</a></p>
                    <p>By {{$post->user->name}}</p>
                    <img src="{{Gravatar::src($post->user->email)}}">
                    <br>
                    @if($post->user->membership === 'prime')
                        <p class="badge badge-pill text-white" style="background-color: #007bb6">
                            prime member
                        </p>
                    @endif
                </div>


                <div oncontextmenu="return false" class="text-center my-8">
                    <img class="rounded-md" src="{{asset('storage/'. $post->image)}}" alt="...">
                </div>

                <p>Artist</p>

                <p class="badge badge-secondary" style="background-color: #856100; color: white">{{$post->user->name}}</p>
                @if($post->user->membership === 'prime')
                <p class="badge badge-pill text-white" style="background-color: #007bb6">
                    prime member
                </p>
                @endif
                <p>Tags</p>

                @foreach($post->tags as $tag)
                <!--Post Tags-->
                    <a href="{{route('community.tag', $tag->id)}}" class="badge badge-secondary" style="background-color: #856100; color: white">{{$tag->name}}</a>

                @endforeach

                <hr>
                <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto">
                        <diV class="text-center">
                            <a class="btn btn-lg fa fa-heart text-white" style="background-color: #e83e8c; font-size: large" href=""> Favourite</a>
                        </diV>

                        <br>
                        <br>
                        <p>{!!$post->content!!}</p>

                    </div>

                </div>
                </div>





            </div>


            </div>
        </div>



        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Comments
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section bg-gray">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <div class="media-list">

                            <div class="media">
                                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">

                                <div class="media-body">
                                    <div class="small-1">
                                        <strong>Maryam Amiri</strong>
                                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">24 min ago</time>
                                    </div>
                                    <p class="small-2 mb-0">Thoughts his tend and both it fully to would the their reached drew project the be I hardly just tried constructing I his wonder, that his software and need out where didn't the counter productive.</p>
                                </div>
                            </div>



                            <div class="media">
                                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/2.jpg" alt="...">

                                <div class="media-body">
                                    <div class="small-1">
                                        <strong>Hossein Shams</strong>
                                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">6 hours ago</time>
                                    </div>
                                    <p class="small-2 mb-0">Was my suppliers, has concept how few everything task music.</p>
                                </div>
                            </div>



                            <div class="media">
                                <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/3.jpg" alt="...">

                                <div class="media-body">
                                    <div class="small-1">
                                        <strong>Sarah Hanks</strong>
                                        <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">Yesterday</time>
                                    </div>
                                    <p class="small-2 mb-0">Been me have the no a themselves, agency, it that if conduct, posts, another who to assistant done rattling forth there the customary imitation.</p>
                                </div>
                            </div>

                        </div>


                        <hr>


                        <form action="#" method="POST">

                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" placeholder="Name">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>



    </main>
@endsection