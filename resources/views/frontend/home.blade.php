@extends('layouts.frontend')

@section('content')
        <!-- SLIDER -->
<div id="carousel-featured-listings" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{theme('img/frontphoto.jpg')}}">
            <div class="carousel-caption">
                <div class="caption-body">Your <span class="legacy">Legacy</span> starts here!</div>
            </div>
        </div>
    </div>
</div>
<div class="quick-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Quick Search</h3>
                {!! Form::open(['method'=>'get','action'=>'HomeController@index']) !!}
                <div class="col-md-4 search-input">
                    {!! form::text('saddress',null,['class'=>'form-control','placeholder'=>'Street Address']) !!}
                </div>
                <div class="col-md-4 search-input">
                    {!! form::text('saddress',null,['class'=>'form-control','placeholder'=>'Minimum Price']) !!}
                </div>
                <div class="col-md-4 search-input">
                    {!! form::text('saddress',null,['class'=>'form-control','placeholder'=>'Maximum Price']) !!}
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 search-input">
                    {!! form::text('saddress',null,['class'=>'form-control','placeholder'=>'Minimum Bedrooms']) !!}
                </div>
                <div class="col-md-4 search-input">
                    {!! form::text('saddress',null,['class'=>'form-control','placeholder'=>'Minimum Bathrooms']) !!}
                </div>
                <div class="col-md-4 search-input">
                    {!! form::submit('Search', ['class'=>'btn btn-block btn-danger']) !!}
                </div>
                <div class="clearfix"></div>
                &nbsp;
                <div class="clearfix"></div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="latest-listings properties">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Recent Properties</h3>
                @foreach($latest as $l)
                    <li class="col-md-4 col-xs-12">
                        <!--======= TAGS =========-->
                        <span class="tag {{strtolower($l->l_status)}}">{{strtoupper($l->l_status)}}</span>
                        <section>
                            <!--======= IMAGE =========-->
                            <div class="img">
                                @foreach($l->images as $ind => $limg)
                                    @if($ind == 0)<img src="images/listings/{{$l->id}}-{{$l->slug}}/{{$limg->name}}" class="img-responsive wp-post-image" alt="{{$l->title}}" />@endif
                                    @endforeach
                                            <!--======= IMAGE HOVER =========-->
                                    <div class="over-proper"> <a href="#" class="btn font-montserrat">More Details</a> </div>
                            </div>
                            <!--======= HOME INNER DETAILS =========-->
                            <ul class="home-in">
                                <li><span></span></li>
                                <li><span></span></li>
                                <li><span></span></li>
                            </ul>
                            <!--======= HOME DETAILS =========-->
                            <div class="detail-sec"> <a href="#" class="font-montserrat">{{$l->title}}</a> <span class="locate"><i class="fa fa-map-marker"></i> {{$l->address}}</span>
                                <p>{{$l->summary}}</p>
                                <div class="share-p"><span class="price font-montserrat">${{number_format($l->price)}}</span><a class="btn btn-sm btn-danger pull-right"  href="{{route('site.properties.show',$l->id)}}">More Details</a></div>
                            </div>
                        </section>
                    </li>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="free-market-analysis">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-sm-6 col-xs-9 call-to-action">
                    Looking for a FREE Market Analysis?
                </div>
                <div class="col-sm-6 col-xs-3 call-to-action">
                    <a href="" class="btn btn-danger pull-right">Find Out Now!</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Testimonials</h3>
                @foreach($testimonies as $t)
                    <div class="col-md-4 col-sm-6 spacer-bottom">
                        <div class="testimony">
                            <p><span class="quote"><i class="fa fa-fw fa-3x fa-quote-left"></i></span>{{$t->body}}</p>
                            <div class="tm-byline pull-right">{{$t->name}}</div>
                            <div class="clearfix"></div>
                        </div>
                    </div><div class="clearfix"></div>
                @endforeach
            </div><div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="btn btn-danger btn-sm pull-right">View All</a>
            </div>
        </div>
    </div>
</div>
@endsection
