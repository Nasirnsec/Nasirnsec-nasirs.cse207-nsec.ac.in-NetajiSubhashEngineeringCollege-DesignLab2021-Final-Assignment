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


             <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                	@if(isset($r))
                	@foreach($r as $x)
                    <div class="col-lg-4">
                        <div class="post-lists search-list">
                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <div class="date">
                                        <span>{{$x->created_at->format('d')}}</span><br>Dec
                                    </div>
                                    <img src="img/asset/l1.jpg" alt="">
                                </div>
                                <div class="detail">
                                    <a href="#"><h4 class="pb-20">Addiction When Gambling <br>
                                    Becomes A Problem</h4></a>
                                    <p>
                                        inappropriate behavior Lorem ipsum dolor sit amet, consecteturinapprop riate behavior Lorem ipsum dolor sit amet, consectetur.
                                    </p>
                                    <p class="footer pt-20">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <a href="#">06 Likes</a>     <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i> <a href="#">02 Comments</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>
     <!-- end Start post Area -->

@endsection