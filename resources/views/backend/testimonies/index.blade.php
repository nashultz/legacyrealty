@extends('layouts.backend')

@section('title', 'Testimonies')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.testimonies.create')}}"><i class="fa fa-fw fa-comment"></i> Create New Testimony</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($testimonies as $testimony)
            <tr>
                <th><a href="{{route('mylegacy.testimonies.edit', $testimony->id)}}">{{$testimony->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.testimonies.edit', $testimony->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.testimonies.confirm', $testimony->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $testimonies->render() !!}
@endsection