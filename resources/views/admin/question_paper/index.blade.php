 @extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Question Paper  Table
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
                                            <th>Category</th>
                                            <th>Semester</th>
                                            <th>Subject</th>
                                            <th>Year</th>
                                            <th>Question Paper</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $x)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$x->quecat->quecategory_name}}</td>
                                            <td>{{$x->sem}}</td>
                                            <td>{{$x->subject}}</td>
                                            <td>{{$x->year}}</td>
                                            <td><a class="btn btn-warning" href="{{URL::to('/')}}/upload/{{$x->question_paper}}"> Preview</a></td>
                                            <td><a href="{{route('editque',$x->id)}}" class="btn btn-info">Update</a></td>
                                            <td>
                                                <form method="post" action="{{route('delque',$x->id)}}">
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>
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