@extends('layouts.backend')

@section('title', 'Offices')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.offices.create')}}"><i class="fa fa-fw fa-building"></i> Create New Office</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offices as $office)
            <tr>
                <th><a href="{{route('mylegacy.offices.edit', $office->id)}}">{{$office->name}}</a></th>
                <th>{{$office->address}}</th>
                <th>
                    <a href="{{route('mylegacy.offices.edit', $office->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.offices.confirm', $office->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $offices->render() !!}
@endsection