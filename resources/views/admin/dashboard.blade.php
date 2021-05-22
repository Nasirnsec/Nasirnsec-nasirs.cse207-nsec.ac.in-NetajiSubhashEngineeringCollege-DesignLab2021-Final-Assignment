<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('src/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('src/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('src/assets/js/morris/morris-0.4.3.min.css')}}')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('src/assets/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
     <!-- TABLE STYLES-->
    <link href="{{asset('src/assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
     
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin')}}"><i class="fa fa-gear"></i> <strong>E-Content</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                       {{session('admin_name')}} <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('adminlogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
		<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i>Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addcategory_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewcategory')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Sub-Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addsubcategory_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewsubcategory')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i>Blogs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addblog_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewblog')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-video-camera"></i>Videos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addvideo_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewvideo')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-folder-o"></i> E-Book Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addebookcategory_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewebookcategory')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book"></i>Ebooks<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addebook_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewebook')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i>Question Paper Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addquecategory_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewquecategory')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-question-circle"></i>Question Paper<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('addque_form')}}">Add</a>
                            </li>
                            <li>
                                <a href="{{route('viewque')}}">View</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('viewcomments')}}"><i class="fa fa-comment-o"></i> Comments</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


               @yield('content')
			
		
				
            </div>
            <!-- /. PAGE INNER  -->
            <footer><p>All right reserved. Template by: <a href="#">E-Content</a></p>
                
        
                </footer>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{asset('src/assets/js/jquery-1.10.2.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{asset('src/assets/js/bootstrap.min.js')}}"></script>
	 
    <!-- Metis Menu Js -->
    <script src="{{asset('src/assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('src/assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('src/assets/js/morris/morris.js')}}"></script>
	
	
	<script src="{{asset('src/assets/js/easypiechart.js')}}"></script>
	<script src="{{asset('src/assets/js/easypiechart-data.js')}}"></script>
	
	 <script src="{{asset('src/assets/js/Lightweight-Chart/jquery.chart.js')}}"></script>
	
 
    <!-- DATA TABLE SCRIPTS -->
    <script src="{{asset('src/assets/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('src/assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
     <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    
    <!-- Custom Js -->
    <script src="{{asset('src/assets/js/custom-scripts.js')}}"></script>
</body>

</html>