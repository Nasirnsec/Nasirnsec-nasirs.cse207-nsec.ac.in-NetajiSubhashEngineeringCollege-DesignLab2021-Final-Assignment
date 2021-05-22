  
    <!DOCTYPE html>
    <html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('dist/img/fav.png')}}">
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Blogger</title>
    
   
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
            <!--
            CSS
            ============================================= -->
            <link rel="stylesheet" href="{{asset('dist/css/linearicons.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/owl.carousel.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
              <!-- TABLE STYLES-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        </head>
        <body>

            <!-- Start Header Area -->
            <header class="default-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                          <a class="navbar-brand" href="index.html">
                            <i class="fa fa-gear"></i> <strong>E-Content</strong>
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li><a href="{{route('homepage')}}">Home</a></li>
                                <li><a href="#latest">Latest</a></li>
                                <li><a href="#trending">Trending</a></li>
                                <li><a href="#thoughts">Thoughts</a></li>
                                <li><a href="#team">team</a></li>
                                <!-- Dropdown 1 -->
                                <li class="dropdown">
                                  <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Pages
                                  </a>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('searchpage')}}">Search</a>
                                    @foreach($c as $x)
                                     <a class="dropdown-item" href="{{route('contentpage',$x->id)}}">{{$x->category_name}}</a>
                                    @endforeach
                                    
                                  </div>
                                </li> 
                                <!-- Dropdown 2 -->
                                <li class="dropdown">
                                  <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    E-Book
                                  </a>
                                  <div class="dropdown-menu">
                                    @foreach($e as $x)
                                     <a class="dropdown-item" href="{{route('ebookpage',$x->id)}}">{{$x->ebookcategory_name}}</a>
                                    @endforeach
                                    
                                  </div>
                                </li> 
                                 <li><a href="{{route('question_papers')}}">Question Papers</a></li>
                                @guest
                            <li >
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                
                            @endif
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest                              
                            </ul>
                          </div>                        
                    </div>
                </nav>
            </header>
            <!-- End Header Area -->

  


@yield('content')

           <!-- start footer Area -->      
            <footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3  col-md-12">
                            <div class="single-footer-widget">
                                <h6>Categories</h6>
                                <ul class="footer-nav">
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Motivation</a></li>
                                    <li><a href="#">Study</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-12">
                            <div class="single-footer-widget newsletter">
                                <h6>The Bloggers</h6>
                                <p>You can trust us. we only provide the content which will be useful for.</p>
                                 
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-12">
                            <div class="single-footer-widget mail-chimp">
                                <h6 class="mb-20">Blog Pictures</h6>
                                <ul class="instafeed d-flex flex-wrap">
                                    <li><img src="{{asset('dist/img/i1.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i2.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i3.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i4.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i5.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i6.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i7.jpg')}}" alt=""></li>
                                    <li><img src="{{asset('dist/img/i8.jpg')}}" alt=""></li>
                                </ul>
                            </div>
                        </div>                      
                    </div>

                    <div class="row footer-bottom d-flex justify-content-between">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Bloggers</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="col-lg-4 col-sm-12 footer-social">
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->        
            <!-- DATA TABLE SCRIPTS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

     <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
            <script src="{{asset('dist/js/vendor/jquery-2.2.4.min.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="{{asset('dist/js/vendor/bootstrap.min.js')}}"></script>
            <script src="{{asset('dist/js/jquery.ajaxchimp.min.js')}}"></script>
            <script src="{{asset('dist/js/parallax.min.js')}}"></script>          
            <script src="{{asset('dist/js/owl.carousel.min.js')}}"></script>      
            <script src="{{asset('dist/js/jquery.magnific-popup.min.js')}}"></script>             
            <script src="{{asset('dist/js/jquery.sticky.js')}}"></script>
            <script src="{{asset('dist/js/main.js')}}"></script>  
             
        </body>
    </html>