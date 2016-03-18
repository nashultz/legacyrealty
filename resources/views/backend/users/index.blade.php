@extends('layouts.backend')

@section('title', 'Users')

@section('content')
<div id="vjs-users">
    <div class="col-lg-6">
        <a class="btn btn-success" href="#"><i class="fa fa-fw fa-user-plus"></i> Create New User</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th><a href="{{route('mylegacy.users.edit', $user->id)}}">{{$user->name}}</a></th>
                    <th>{{$user->email}}</th>
                    <th>
                        <a href="{{route('mylegacy.users.edit', $user->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                    </th>
                    <th>
                        <a href="{{route('mylegacy.users.confirm', $user->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->render() !!}
    </div>
    <div class="col-lg-6">

    </div>
</div>
@endsection

@section('footer')
    <script src="{{theme('js/vjs_user.js')}}"></script>
@endsection