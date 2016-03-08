@extends('layouts.backend')

@section('title', 'Specialties')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.specialties.create')}}"><i class="fa fa-fw fa-graduation-cap"></i> Create New Specialty</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($specialties as $specialty)
            <tr>
                <th><a href="{{route('mylegacy.specialties.edit', $specialty->id)}}">{{$specialty->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.specialties.edit', $specialty->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.specialties.confirm', $specialty->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $specialties->render() !!}
@endsection