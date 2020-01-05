@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>


      <div class="card card-default">
          <div class="card-header text-white" style="background-color: #CE272D">
              Posts
          </div>
          <div class="card-body">
              @if($posts->count() > 0)
              <table class="table">
                  <thead>
                  <th>image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th></th>
                  <th></th>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                      <tr>
                          <td><img src="{{asset('storage/'.$post->image)}}" width="60px" height="60px" alt=""> </td>
                          <td>{{$post->title}}</td>
                          <td>
                              {{$post->category->name}}
                          </td>
                          @if($post->trashed())
                              <td>
                                  <form action="{{route('restore-posts.index', $post->id)}}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <button type="submit" class="btn btn-dark btn-sm">Restore</button>
                                  </form>
                              </td>

                          @else
                              <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                          @endif
                          <td>
                              <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">
                                      {{$post->trashed() ? 'Delete':'Trash'}}
                                  </button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              @else
                <p class="text-center">No Posts Made</p>
              @endif
          </div>
      </div>



@endsection