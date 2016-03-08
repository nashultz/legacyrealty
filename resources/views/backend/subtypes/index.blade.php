@extends('layouts.backend')

@section('title', 'Subtypes')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.subtypes.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New Subtype</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subtypes as $subtype)
            <tr>
                <th><a href="{{route('mylegacy.subtypes.edit', $subtype->id)}}">{{$subtype->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.subtypes.edit', $subtype->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.subtypes.confirm', $subtype->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $subtypes->render() !!}
@endsection