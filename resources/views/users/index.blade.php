@extends('layouts.app')

@section('content')

<div class="container container-wide">
    <div class="card card-default card">
        <div class="card-header text-white" style="background-color: #fdb813">
            Users
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table table-sm">
                    <thead>
                    <th>Profile Pic</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{Gravatar::src($user->email)}}" width="50%" height="50%" alt="">
                            </td>

                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->role}}
                            </td>
                            <td>
                                @if(!$user->isAdmin() && $user->isMember('none'))
                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf

                                        <button disabled type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                    @elseif(!$user->isAdmin() && $user->isMember('prime'))
                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                @elseif(!$user->isAdmin() && $user->isMember('master'))
                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                    @endif

                                    @if(!$user->isWriter()&& $user->isMember('prime'))
                                    <form action="{{route('users.make-writer', $user->id)}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-success btn-sm">Make Writer</button>
                                    </form>
                                    @elseif(!$user->isWriter()&& $user->isMember('master'))
                                        <p class="btn btn-default btn-sm text-white" style="background-color: #856100">Master</p>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No Users Yet</p>
            @endif
        </div>
    </div>
</div>





@endsection