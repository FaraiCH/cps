@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{isset($category) ? 'Edit Category' : 'Create Category'}}
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-info">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-info">
                                {{$error}}
                            </li>
                        @endforeach

                    </ul>
                </div>

            @endif
            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="post">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{isset($category) ? $category->name : ""}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        @if(isset($category))
                            Edit Category
                            @else
                            Add Category
                        @endIF
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection