@extends('layout')
@section('content')

            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20 text-uppercase" style="font-size: 60px;">{{$data->title}}</h1>
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
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" src="{{asset('upload/'.$data->picture)}}" style="height: 500px;width: 700px;" alt="">
                            <div class="top-wrapper ">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                       {{$data->title}}
                                    </h2>
                                    <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                        <div class="desc">
                                           <h2>{{$data->uploaded_by}}</h2>
                                            <h3>{{$data->created_at}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tags">
                                <ul>
                                    @foreach($c as $x)
                                    <li><a href="{{route('contentpage',$x->id)}}">{{$x->category_name}}</a></li>
                                    @endforeach
                                    @foreach($e as $x)
                                    <li><a href="{{route('ebookpage',$x->id)}}">{{$x->ebookcategory_name}}</a></li>
                                    @endforeach   
                                </ul>
                            </div>
                            <div class="single-post-content">
                                <p>
                                    {{$data->description}}
                                </p>
                                <a href="{{URL::to('/')}}/upload/{{$data->ebook}}" class="btn btn-primary">Preview</a>
                                <a href="{{URL::to('/')}}/upload/{{$data->ebook}}" class="btn btn-primary" download="{{URL::to('/')}}/upload/{{$data->ebook}}">Download</a>
                            </div>
                            <div class="bottom-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        1
                                    </div>
                                    <div class="col-lg-4 single-b-wrap col-md-12"></div>
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <ul class="social-icons">
                                            <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <!-- Start commentform Area -->
                            <section class="commentform-area  pb-120 pt-80 mb-100">
                                <div class="container">
                                    @if(session()->get('insert'))
                                    <div class="alert alert-success">{{session()->get('insert')}}</div>
                                    @endif
                                    <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                    <div class="row flex-row d-flex">
                                        <div class="col-lg-6">

                                        <form method="post" action="{{route('comment',[$data->id,'E-Book'])}}">
                                            @csrf
                                            <input name="name" @if(Auth::check()) value="{{Auth::user()->name}}" @endif readonly="" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                                            <input name="email" @if(Auth::check()) value="{{Auth::user()->email}}" @endif readonly="" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" class="common-input mb-20 form-control" required="" type="email">
                                            <input name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Subject'" class="common-input mb-20 form-control" required="" type="text">

                                        </div>
                                        <div class="col-lg-6">
                                            <textarea class="form-control mb-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                            <input type="submit" class="primary-btn mt-20" value="Comment">
                                        </form>
                                        </div>
                                    </div>
                                </div>    
                            </section>
                            <!-- End commentform Area -->
                            
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-area ">
                        

                        <div class="single_widget about_widget">
                            <img src="img/asset/s-img.jpg" alt="">
                            <h2 class="text-uppercase">Adele Gonzalez</h2>
                            <p>
                                MCSE boot camps have its supporters and
                                its detractors. Some people do not understand why you should have to spend money
                            </p>
                        </div>
                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post categories</h4>
                            <ul>
                            	@foreach($c as $x)
                                <li>
                                    <a href="">{{$x->category_name}}</a>
                                </li>
                                @endforeach                      
                            </ul>
                        </div>

                        <div class="single_widget recent_widget">
                            <h4 class="text-uppercase pb-20">Recent Posts</h4>
                            <div class="active-recent-carusel">
                            	@foreach($main as $x)
                                <div class="item">
                                    <img src="{{asset('upload/'.$x->picture)}}" class="img-fluid" style="height:200px; width: 300px;"  alt="">
                                    <p class="mt-20 title text-uppercase"> {{$x->title}}</p>
                                    <p>{{$x->created_at->format('d-m-y')}} <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    {{$x->like}} </span></p>    
                                </div> 
                                @endforeach                                                                                      
                            </div>
                        </div>  


                      
                        <div class="single_widget tag_widget">
                            <h4 class="text-uppercase pb-20">Category Links</h4>
                            <ul>
                            	@foreach($c as $x)
                                    <li><a href="{{route('contentpage',$x->id)}}">{{$x->category_name}}</a></li>
                                    @endforeach
                                    @foreach($e as $x)
                                    <li><a href="{{route('ebookpage',$x->id)}}">{{$x->ebookcategory_name}}</a></li>
                                    @endforeach 
                            </ul>
                        </div>                                                 
                    </div>
                </div>
            </div>    
        </section>
        <!-- End post Area -->  
    </div>
    <!-- End post Area -->

@endsection