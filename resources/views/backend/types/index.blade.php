@extends('layouts.backend')

@section('title', 'Types')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.types.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New Type</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($types as $type)
            <tr>
                <th><a href="{{route('mylegacy.types.edit', $type->id)}}">{{$type->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.types.edit', $type->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.types.confirm', $type->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $types->render() !!}
@endsection