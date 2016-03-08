@extends('layouts.backend')

@section('title', 'Titles')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.titles.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New Title</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($titles as $title)
            <tr>
                <th><a href="{{route('mylegacy.titles.edit', $title->id)}}">{{$title->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.titles.edit', $title->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.titles.confirm', $title->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $titles->render() !!}
@endsection