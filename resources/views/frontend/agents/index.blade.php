@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="property-list">
                    <h3 class="">Our Agents</h3>
                    <div class="">
                        @foreach($agents as $agent)
                            <div class="property-list-item">
                                <article class="property">
                                    <h4>{{$agent->name}}</h4>
                                    <figure class="col-sm-4">
                                        @foreach($agent->images as $ind => $aimg)
                                            @if($ind == 0)<img src="images/employees/{{$agent->name}}/{{$aimg->name}}" class="attachment-property-thumb-image size-property-thumb-image" alt="{{$agent->name}}" />@endif
                                        @endforeach
                                    </figure>
                                    <div class="col-sm-8">
                                     <div class="property-details">
                                        <p><i class="fa fa-envelope fa-fw"></i> {{$agent->email}}</p>
                                         <p><i class="fa fa-phone fa-fw"></i> {{$agent->phone}}</p>
                                         <p><i class="fa fa-mobile fa-fw"></i> {{$agent->cell ? : 'N/A'}}</p>
                                         <p><i class="fa fa-fax fa-fw"></i> {{$agent->fax}}</p>
                                    </div></div><div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <a href="{{route('site.agents.show',$agent->id)}}" class="btn btn-info pull-right">More Details</a>
                                    </div><div class="clearfix"></div>
                                </article>
                            </div><div class="clearfix"></div>&nbsp;
                        @endforeach
                    </div><div class="clearfix"></div>&nbsp;
                </section>
            </div><div class="clearfix"></div>
        </div>
    </div>
@endsection