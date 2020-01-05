@extends('layouts.app')

@section('content')



    <div class="card card-default">
        <div class="card-header text-white" style="background-color: darkblue">
            Prime Users
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table">
                    <thead>
                    <th>Profile Pic</th>
                    <th>Username</th>
                    <th>Membership</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{Gravatar::src($user->email)}}" width="30%" height="30%" alt="">
                            </td>

                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->membership}}
                            </td>
                            <td>

                                @if(!$user->isMember('prime') && !$user->isMember('master') && $user->isMember('none'))
                                    <form action="{{route('primes.make-member', $user->id)}}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-default btn-sm text-white" style="background-color: #1b4b72">Membership</button>
                                    </form>

                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No Prime Members Yet</p>
            @endif
        </div>
    </div>



@endsection