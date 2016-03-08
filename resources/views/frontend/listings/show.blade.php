@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="property-list">
                    <h3 class="">{{$listing->title}}</h3>
                    <h4>{{$listing->address}}, {{$listing->county}} County, {{$listing->city}}, {{$listing->state}}  {{$listing->zipcode}}</h4>
                    <div class="">
                        <div class="property-list">
                            <article class="property">
                                <figure class="col-sm-12">
                                    @foreach($listing->images as $ind => $limg)
                                        @if($ind == 0)<img src="../images/listings/{{$listing->id}}-{{$listing->slug}}/{{$limg->name}}" class="img-responsive" alt="{{$listing->title}}" />@endif
                                    @endforeach
                                </figure>
                                <div class="col-sm-12">
                                 <div class="property-details">
                                    <h5 class="{{strtolower($listing->l_status)}}"><strong>{{strtoupper($listing->l_status)}}</strong> for ${{number_format($listing->price)}} - {{$listing->type}} {{$listing->subtype}}</h5>
                                </div></div><div class="clearfix"></div>
                            </article>
                        </div><div class="clearfix"></div>&nbsp;
                    </div><div class="clearfix"></div>
                </section>
                <hr>
                <section>
                    <h3>Property Description</h3>
                    <p>{{$listing->description}}</p>
                </section>
                <hr>
                <section>
                    <h3>Property Images</h3>
                    @foreach($listing->images as $ind => $limg)
                        <div class="col-lg-3 col-sm-4 col-xs-12"><a title="{{$listing->title}} - {{$limg->name}}" href="#"><img class="thumbnail img-responsive" src="../images/listings/{{$listing->id}}-{{$listing->slug}}/{{$limg->name}}"></a></div>
                    @endforeach
                    <div class="clearfix"></div>
                </section>
                <hr>
                <section>
                    <h3>Property Video</h3>
                    <div class="col-lg-12">
                        @if($listing->video)
                        <figure class="col-lg-12">
                            <iframe width="560" height="315" src="{{$listing->video}}" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        @else
                        <div class="col-lg-12">No video available.</div><div class="clearfix"></div>
                        @endif
                    </div>&nbsp;
                </section>
            </div>
            <div class="col-md-4">
                <section class="property-list">
                    <h3 class="">Listing Agent</h3>
                    <div class="">
                        <div class="property-list">
                            <article class="property">
                                <h4 class="">{{$listing->agent->name}}</h4>
                                <figure class="col-sm-4">
                                    @foreach($listing->agent->images as $ind => $aimg)
                                        @if($ind == 0)<img src="../images/employees/{{$listing->agent->name}}/{{$aimg->name}}" class="img-responsive" alt="{{$listing->agent->name}}" />@endif
                                    @endforeach
                                </figure>
                                <div class="col-sm-8">
                                    <div class="property-details">
                                        <p><i class="fa fa-envelope fa-fw"></i> {{$listing->agent->email}}</p>
                                        <p><i class="fa fa-phone fa-fw"></i> {{$listing->agent->phone}}</p>
                                        <p><i class="fa fa-mobile fa-fw"></i> {{$listing->agent->cell ? : 'N/A'}}</p>
                                        <p><i class="fa fa-fax fa-fw"></i> {{$listing->agent->fax}}</p>
                                    </div></div><div class="clearfix"></div>
                            </article>
                        </div><div class="clearfix"></div>&nbsp;
                    </div><div class="clearfix"></div>
                </section>
            </div>
        </div>
    </div>
    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Heading</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
    $(document).ready(function() {
        $('.thumbnail').click(function(){
            $('.modal-body').empty();
            var title = $(this).parent('a').attr("title");
            $('.modal-title').html(title);
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show:true});
        });
    });

    $(function() {

        var $allVideos = $("iframe[src^='https://player.vimeo.com'], iframe[src^='https://www.youtube.com'], object, embed"),
                $fluidEl = $("figure");

        $allVideos.each(function() {

            $(this)
            // jQuery .data does not work on object/embed elements
                    .attr('data-aspectRatio', this.height / this.width)
                    .removeAttr('height')
                    .removeAttr('width');

        });

        $(window).resize(function() {

            var newWidth = $fluidEl.width();
            $allVideos.each(function() {

                var $el = $(this);
                $el
                        .width(newWidth)
                        .height(newWidth * $el.attr('data-aspectRatio'));

            });

        }).resize();

    });
    </script>
@endsection