@extends('layout')
@section('content')

    <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-center align-items-center d-flex">
                        <div class="col-lg-8">
                            <div id="imaginary_container"> 
                                    <form method="post" action="{{route('search')}}">
                                        @csrf
                                <div class="input-group stylish-input-group">
                                    <input type="text" placeholder="Enter text to get the blogs" name="search" class="form-control"   required="">
                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>  
                                    </span>
                                </div>
                                </form>
                            </div> 
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
                        @foreach($data as $x)
                        <div class="col-lg-3 col-md-6 single-fashion">
                            <img class="img-fluid" style="height: 250px;width: 450px;" src="{{asset('upload/'.$x->picture)}}" alt="">
                            <p class="date">{{$x->created_at}}</p>
                            <h4><a href="{{route('single',$x->id)}}">{{$x->title}}</a></h4>
                            <p>
                                {{$x->content}}
                            </p>
                            <div class="meta-bottom d-flex justify-content-between">
                                <a href="#"><p><span class="lnr lnr-heart"></span> {{$x->like}} Likes</p></a>
                                 <a href="#"><p><span class="fa fa-thumbs-o-down"></span> {{$x->dislike}} Dislikes</p></a>
                            </div>                                  
                        </div> 
                        @endforeach        
                    </div>
                </div>  
            </section>
            <!-- End fashion Area -->           
</div>

@endsection