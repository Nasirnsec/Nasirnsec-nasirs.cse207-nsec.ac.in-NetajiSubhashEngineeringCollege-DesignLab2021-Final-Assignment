@extends('admin.dashboard')
@section('content')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your App</small>
                        </h1>
                    </div>
                </div>
                
                
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-left pull-left green">
                                <i class="fa fa-thumbs-up fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
                                <h3>{{$like}}</h3>
                               <strong>  Likes</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                              <div class="panel-left pull-left blue">
                                <i class="fa fa-thumbs-down fa-5x"></i>

                                </div>
                                
                            <div class="panel-right">
                            <h3>{{$dislike}} </h3>
                               <strong> Dislikes</strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa fa-comments fa-5x"></i>
                               
                            </div>
                            <div class="panel-right">
                             <h3> {{$comment}} </h3>
                               <strong> Comments </strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-left pull-left brown">
                                <i class="fa fa-users fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
                            <h3>{{$user}} </h3>
                             <strong>No.of Users</strong>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Question Paper</h4>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="{{$ques}}" ><span class="percent">{{$ques}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Blogs</h4>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="{{$blog}}" ><span class="percent">{{$blog}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Videos</h4>
                        <div class="easypiechart" id="easypiechart-teal" data-percent="{{$video}}" ><span class="percent">{{$video}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>E-Books</h4>
                        <div class="easypiechart" id="easypiechart-red" data-percent="{{$ebook}}" ><span class="percent">{{$ebook}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
@endsection