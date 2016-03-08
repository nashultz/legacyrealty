@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="property-list col-md-6">
                    <h3 class="">{{$agent->name}}</h3>
                    <div class="">
                        <div class="property-list">
                            <article class="property">
                                <figure class="col-sm-8">
                                    @foreach($agent->images as $ind => $aimg)
                                        @if($ind == 0)<img src="../images/employees/{{$agent->name}}/{{$aimg->name}}" class="img-responsive" alt="{{$agent->name}}" />@endif
                                    @endforeach
                                </figure>
                            </article>
                        </div>
                    </div>
                </section>
                <section class="col-md-6">
                    <h3>Contact Info</h3>
                    <p><i class="fa fa-envelope fa-fw"></i> {{$agent->email}}</p>
                    <p><i class="fa fa-phone fa-fw"></i> {{$agent->phone}}</p>
                    <p><i class="fa fa-mobile fa-fw"></i> {{$agent->cell ? : 'N/A'}}</p>
                    <p><i class="fa fa-fax fa-fw"></i> {{$agent->fax}}</p>
                </section>
                <hr>
                <section class="col-md-12">
                    <h3>About Me</h3>
                    <p class="bio">{{$agent->bio}}</p>
                    <div class="clearfix"></div>
                </section>
            </div><div class="clearfix"></div>&nbsp;
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