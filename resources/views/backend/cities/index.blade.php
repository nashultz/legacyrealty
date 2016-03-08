@extends('layouts.backend')

@section('title', 'Cities')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.cities.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New City</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <th><a href="{{route('mylegacy.cities.edit', $city->id)}}">{{$city->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.cities.edit', $city->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.cities.confirm', $city->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $cities->render() !!}
@endsection