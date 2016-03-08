@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="property-list">
                    <h3 class="">Properties</h3>
                    <div class="">
                        @foreach($listings as $listing)
                            <div class="property-list-item">
                                <article class="property">
                                    <h4>{{$listing->title}}</h4>
                                    <figure class="col-sm-4">
                                        @foreach($listing->images as $ind => $limg)
                                            @if($ind == 0)<img src="images/listings/{{$listing->id}}-{{$listing->slug}}/{{$limg->name}}" class="attachment-property-thumb-image size-property-thumb-image" alt="{{$listing->title}}" />@endif
                                        @endforeach
                                        <figcaption class="">{{$listing->l_status}}</figcaption>
                                    </figure>
                                    <div class="col-sm-8">
                                     <div class="property-details">
                                        <h5 class="{{strtolower($listing->l_status)}}"><strong>{{strtoupper($listing->l_status)}}</strong> for ${{number_format($listing->price)}} - {{$listing->type}} {{$listing->subtype}}</h5>
                                        <p>{{$listing->summary}}</p>
                                    </div></div><div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <a href="{{route('site.properties.show',$listing->id)}}" class="btn btn-info pull-right">More Details</a>
                                    </div><div class="clearfix"></div>
                                </article>
                            </div><div class="clearfix"></div>&nbsp;
                        @endforeach
                    </div><div class="clearfix"></div>
                    <div class="col-md-6 col-md-offset-3">
                        {!! $listings->render() !!}
                    </div><div class="clearfix"></div>&nbsp;
                </section>
            </div><div class="clearfix"></div>
        </div>
    </div>
@endsection