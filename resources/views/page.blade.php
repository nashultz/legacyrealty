@extends('layouts.frontend')

@section('title', $page->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 page">
                @if($page->view)
                    {!! $page->view->render() !!}
                @else
                    {!! $page->content_html !!}
                @endif
            </div>
            <div class="clearfix"></div><div>&nbsp;</div><div class="clearfix"></div>
        </div>
    </div>
@endsection