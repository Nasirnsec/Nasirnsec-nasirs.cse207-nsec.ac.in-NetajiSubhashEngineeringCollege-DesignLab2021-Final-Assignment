@extends('layout')
@section('content')

            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20 text-uppercase">{{$n->category_name}}</h1>
                        </div>
                    </div>
                </div>  
            </section>
            <!-- End top-section Area -->
            <div class="container">
                <div class="row d-flex justify-content-center">
                        <div class="menu-content pt-70 pb-0 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">BLOG SECTION</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Generic Start -->
        <div class="main-wrapper">
            
            <!-- Start fashion Area -->
            <section class="fashion-area section-gap" id="fashion">
                <div class="container">                 
                    <div class="row">
                        @foreach($blogs as $x)
                        <div class="col-lg-3 col-md-6 single-fashion">
                            <img class="img-fluid" style="height: 250px;width: 450px;" src="{{asset('upload/'.$x->picture)}}" alt="">
                            <p class="date">{{$x->created_at}}</p>
                            <h4><a href="{{route('single',$x->id)}}">{{$x->title}}</a></h4>
                            
                            <div class="meta-bottom d-flex justify-content-between">
                                <a href="{{route('likeb',$x->id)}}"><p><span class="lnr lnr-heart"></span> {{$x->like}} Likes</p></a>
                                 <a href="{{route('dislikeb',$x->id)}}"><p><span class="fa fa-thumbs-o-down"></span> {{$x->dislike}} Dislikes</p></a>
                            </div>                                  
                        </div> 
                        @endforeach        
                    </div>
                </div>  
            </section>
            <!-- End fashion Area -->           
</div>









<div class="container">
                <div class="row d-flex justify-content-center">
                        <div class="menu-content pt-70 pb-0 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">VIDEO SECTION</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Generic Start -->
        <div class="main-wrapper">
            
            <!-- Start fashion Area -->
            <section class="fashion-area section-gap" id="fashion">
                <div class="container">                 
                    <div class="row">
                        @foreach($video as $x)
                        <div class="col-lg-3 col-md-6 single-fashion" style="margin-left: 80px;">
                            @if($x->type==' ')
                                                <iframe  src="http://www.youtube.com/embed/{{$x->video}}" frameborder="0" allowfullscreen></iframe>
                                                @else
                                            <video id="vid1"  controls> 
                                                 <source src="{{URL::to('/')}}/upload/{{$x->video}}" id="vid-src" type="video/{{$x->type}}">
                                                      Your browser does not support HTML5 videos
                                            </video>  
                                            @endif
                            <p class="date">{{$x->created_at}}</p>
                            <h4><a href="{{route('singlevideo',$x->id)}}">{{$x->title}}</a></h4>
                            <p>
                                {{$x->content}}
                            </p>
                            <div class="meta-bottom d-flex justify-content-between">
                               <a href="{{route('likev',$x->id)}}"> <p><span class="lnr lnr-heart"></span> {{$x->like}} Likes</p></a>
                               <a href="{{route('dislikev',$x->id)}}"> <p><span class="fa fa-thumbs-o-down"></span> {{$x->dislike}} Dislikes</p></a>
                            </div>                                  
                        </div> 
                        @endforeach        
                    </div>
                </div>  
            </section>
            <!-- End fashion Area -->           
</div>

@endsection