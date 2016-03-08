@extends('layouts.backend')

@section('title', 'Counties')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.counties.create')}}"><i class="fa fa-fw fa-trophy"></i> Create New County</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($counties as $county)
            <tr>
                <th><a href="{{route('mylegacy.counties.edit', $county->id)}}">{{$county->name}}</a></th>
                <th>
                    <a href="{{route('mylegacy.counties.edit', $county->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.counties.confirm', $county->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $counties->render() !!}
@endsection