@extends('layout')
@section('content')
          <!-- start banner Area -->
            <section class="banner-area relative" id="home" data-parallax="scroll" data-image-src="{{asset('dist/img/header-bg.jpg')}}">
                <div class="overlay-bg overlay"></div>
                <div class="container">
                    <div class="row fullscreen">
                        <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                            <h1>
                                A Discount Toner Cartridge <br>
                                Is Better Than Ever.                                
                            </h1>
                        </div>                                               
                    </div>
                </div>
            </section>
            <!-- End banner Area -->    
            <!-- Start category Area -->
            <section class="category-area section-gap" id="latest">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">Latest Posts from All Categories</h1>
                                <p>Take a look on the latest topics related to all categories.</p>
                            </div>
                        </div>
                    </div>                      
                    <div class="active-cat-carusel">
                        @foreach($main as $x)
                        <div class="item single-cat">
                            <img src="{{asset('upload/'.$x->picture)}}" alt="" height="250" width="450">
                            <p class="date">{{$x->created_at}}</p>
                            <h4><a href="{{route('single',$x->id)}}">{{$x->title}}</a></h4>
                        </div>
                        @endforeach                         
                    </div>                                              
                </div>  
            </section>
            <!-- End category Area -->
            
            <!-- Start travel Area -->
            <section class="travel-area section-gap" id="trending">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">Trending News from All over the world</h1>
                                <p>Best and New Trendy News are here.</p>
                            </div>
                        </div>
                    </div>                      
                    <div class="row">
                            @foreach($t as $x)
                        <div class="col-lg-6 travel-left">
                            <div class="single-travel media pb-70">
                              <img class="img-fluid d-flex  mr-3"  style="height:200px;width: 200px;" src="{{asset('upload/'.$x->picture)}}" alt="">
                              <div class="dates">
                                <span>{{$x->created_at->format('d')}}</span>
                                <p>{{$x->created_at->format('M')}}</p>
                              </div>
                              <div class="media-body align-self-center">
                                <h4 class="mt-0"><a href="{{route('single',$x->id)}}">{{$x->title}}</a></h4>
                                <p>{{$x->content}}</p>
                                <div class="meta-bottom d-flex justify-content-between">
                                    <p><span class="lnr lnr-heart"></span>{{$x->like}} Likes</p>
                                    <p><span class="lnr lnr-thumbs-down"></span> {{$x->dislike}} Dislikes</p>
                                </div>                           
                              </div>
                            </div>                                                     
                        </div>
                     @endforeach      
                    </div>
                </div>                  
            </section>
            <!-- End travel Area -->
            
            <!-- Start fashion Area -->
            <section class="fashion-area section-gap" id="thoughts">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">Motivational Thoughts for you</h1>
                                <p>Learn and motivate yourself by visiting this section.</p>
                            </div>
                        </div>
                    </div>                  
                    <div class="row">
                         @foreach($m as $x)
                        <div class="col-lg-3 col-md-6 single-fashion">
                            <img class="img-fluid" style="height: 250px;width: 450px;" src="{{asset('upload/'.$x->picture)}}" alt="">
                            <p class="date">{{$x->created_at->format('d M Y')}}</p>
                            <h4><a href="{{route('single',$x->id)}}">{{$x->title}}</a></h4>
                            <p>
                               {{$x->content}}
                            </p>
                            <div class="meta-bottom d-flex justify-content-between">
                                <p><span class="lnr lnr-heart"></span> {{$x->like}} Likes</p>
                                <p><span class="lnr lnr-thumbs-down"></span> {{$x->dislike}} Comments</p>
                            </div>                                  
                        </div>
                        @endforeach                       
                    </div>
                </div>  
            </section>
            <!-- End fashion Area -->
            
            <!-- Start team Area -->
            <section class="team-area section-gap" id="team">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">About Blogger Team</h1>
                                <p>Who are in extremely love with eco friendly system.</p>
                            </div>
                        </div>
                    </div>                      
                    <div class="row justify-content-center d-flex align-items-center">
                        <div class="col-lg-6 team-left">
                            <p>
                                At Apptopia, we want to solve the biggest problem in mobile: everyone is guessing.


                                Publishers need to know what apps to build, how to monetize them, and where to price them. Advertisers and brands need to identify their target users, and determine where to allocate resources in order to reach them most effectively. Investors need to know which apps and genres are growing the quickest, and where users are really spending their time (and money).


                            </p>
                            <p>
                                 

                            In business, we need data to make informed decisions. Apptopia provides the most actionable mobile app insights in the industry. We aim to make this data available to as many people as possible.
                            </p>
                        </div>
                        <div class="col-lg-6 team-right d-flex justify-content-center">
                            <div class="row active-team-carusel">
                                <div class="single-team">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{asset('dist/img/team1.jpg')}}" alt="">
                                        <div class="align-items-center justify-content-center d-flex">
                                        </div>
                                    </div>
                                    <div class="meta-text mt-30 text-center">
                                        <h4>Dora Walker</h4>
                                        <p>Senior Core Developer</p>                                            
                                    </div>
                                </div>
                                <div class="single-team">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{asset('dist/img/team2.jpg')}}" alt="">
                                        <div class="align-items-center justify-content-center d-flex">
                                        </div>
                                    </div>
                                    <div class="meta-text mt-30 text-center">
                                        <h4>Lena Keller</h4>
                                        <p>Creative Content Developer</p>                   
                                    </div>
                                </div>                                                  
                            </div>
                        </div>
                    </div>
                </div>  
            </section>
            <!-- End team Area -->
            
 @endsection