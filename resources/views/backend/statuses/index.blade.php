@extends('layouts.backend')

@section('title', 'Statuses')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.statuses.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New Status</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statuses as $status)
            <tr>
                <th><a href="{{route('mylegacy.statuses.edit', $status->id)}}">{{$status->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.statuses.edit', $status->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.statuses.confirm', $status->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $statuses->render() !!}
@endsection