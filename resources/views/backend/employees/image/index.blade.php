@extends('layouts.backend')

@section('title', 'Employee Images')

@section('content')
<div class="col-md-6">
    <a class="btn btn-success" href="{{route('mylegacy.employees.{employee}.images.create',$employee->id)}}"><i class="fa fa-fw fa-image"></i> Create New Image</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Image Name</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <th>{{$image->name}}</th>
                <th>
                    <a href="{{route('mylegacy.employees.{employee}.images.confirm', ['employee'=>$employee->id, 'image'=>$image->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div><div class="clearfix"></div>
@endsection