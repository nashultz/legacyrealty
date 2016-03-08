@extends('layouts.backend')

@section('title', 'Employees')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.employees.create')}}"><i class="fa fa-fw fa-user-secret"></i> Create New Employee</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th><a href="{{route('mylegacy.employees.edit', $employee->id)}}">{{$employee->name}}</a></th>
                <th>{{$employee->email}}</th>
                <th>
                    <a href={{route('mylegacy.employees.{employee}.images.index',$employee->id)}}>Images</a>
                </th>
                <th>
                    <a href="{{route('mylegacy.employees.edit', $employee->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                </th>
                <th>
                    <a href="{{route('mylegacy.employees.confirm', $employee->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $employees->render() !!}
@endsection