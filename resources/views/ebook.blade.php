@extends('layout')
@section('content')
            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20 text-uppercase">{{$n->ebookcategory_name}} E-Books</h1>
                        </div>
                    </div>
                </div>  
            </section>

 <!-- Start travel Area -->
            <section class="travel-area section-gap" id="fashion">
                <div class="container">                     
                    <div class="row">
                      @foreach($content as $x)
                      @if($x->status!='Blocked')
                        <div class="col-lg-6 travel-left">
                            <div class="single-travel media pb-70">
                              <img class="img-fluid d-flex  mr-3"  style="height:220px;width: 200px;" src="{{asset('upload/'.$x->picture)}}" alt="">
                              <div class="dates">
                                <span>{{$x->created_at->format('d')}}</span>
                                <p>{{$x->created_at->format('M')}}</p>
                              </div>
                              <div class="media-body align-self-center">
                                <h4 class="mt-0"><a href="{{route('singlebook',$x->id)}}">{{$x->title}}</a></h4>
                                 <p>Author<span class="h5"> {{$x->author}}</span></p>
                                 <p>Pages<span class="h5"> {{$x->pages}}</span></p>
                                 <p>Published<span class="h5"> {{$x->published_on}}</span></p>
                                <p>Uploaded By<span class="h5"> {{$x->uploaded_by}}</span></p>
                                <div class="meta-bottom mt-3 d-flex justify-content-between">
                                   <a href="{{route('like',$x->id)}}"> <p><span class="fa fa-thumbs-o-up "></span> {{$x->like}} Likes</p></a>
                                    <a href="{{route('dislike',$x->id)}}"><p><span class="fa fa-thumbs-o-down "></span> {{$x->dislike}} Dislikes</p></a>
                                </div>                           
                              </div>
                            </div>                                                     
                        </div> 
                         @endif
                        @endforeach     
                    </div>
                </div>                  
            </section>
            <!-- End travel Area -->
<hr>



          






@endsection