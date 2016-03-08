@extends('layouts.backend')

@section('title', 'States')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.states.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New State</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($states as $state)
            <tr>
                <th><a href="{{route('mylegacy.states.edit', $state->id)}}">{{$state->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.states.edit', $state->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.states.confirm', $state->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $states->render() !!}
@endsection