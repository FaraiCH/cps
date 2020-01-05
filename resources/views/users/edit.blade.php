@extends('layouts.app')

@section('content')
    <div class="container">


                <div class="card">
                    <div class="card-header" style="background-color: #005cbf; color: white">Profile</div>
                    <div class="card-body">
                        <form action="{{route('users.update-profile')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Profile Pic (Not compulsery)</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="about">About Me</label>
                                <textarea name="about" class="form-control" id="about" cols="5" rows="3">{{$user->about}}
                                </textarea>
                            </div>

                             <button type="submit" class="btn btn-primary">Update User</button>
                        </form>
                    </div>
                </div>
            </div>


@endsection