@extends('layouts.backend')

@section('title', 'Listing Images')

@section('content')
    <a class="btn btn-success" href="{{route('mylegacy.listings.{listing}.images.create',$listing->id)}}"><i class="fa fa-fw fa-image"></i> Create New Image</a>
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
                    <a href="{{route('mylegacy.listings.{listing}.images.confirm', ['listing'=>$listing->id, 'image'=>$image->id])}}"><i class="fa fa-fw fa-trash"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection