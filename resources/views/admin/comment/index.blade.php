 @extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Comments  Table
        </h1>
        @if(session()->get('update'))
        <div class="alert alert-success text-center">{{session()->get('update')}}</div>
        @endif
          @if(session()->get('delete'))
        <div class="alert alert-success text-center">{{session()->get('delete')}}</div>
        @endif
          @if(session()->get('status'))
        <div class="alert alert-success text-center">{{session()->get('status')}}</div>
        @endif
    </div>
</div> 

           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Post</th>
                                            <th>Type</th>
                                            <th>User Name</th>
                                            <th>User E-Mail</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $x)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            @if($x->type=='Blog')
                                            <td>{{$x->blog->title}}</td>
                                            @elseif($x->type=='Video')
                                            <td>{{$x->video->title}}</td>
                                            @elseif($x->type=='E-Book')
                                            <td>{{$x->ebook->title}}</td>
                                            @else
                                            <td></td>
                                            @endif
                                            <td>{{$x->type}}</td>
                                            <td>{{$x->name}}</td>
                                            <td>{{$x->email}}</td>
                                            <td>{{$x->subject}}</td>
                                            <td>{{$x->message}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
@endsection