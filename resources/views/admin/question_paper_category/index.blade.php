 @extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Question Paper Category  Table
        </h1>
        @if(session()->get('update'))
        <div class="alert alert-success text-center">{{session()->get('update')}}</div>
        @endif
        @if(session()->get('success'))
        <div class="alert alert-success text-center">{{session()->get('success')}}</div>
        @endif
          @if(session()->get('error'))
        <div class="alert alert-danger text-center">{{session()->get('error')}}</div>
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
                                            <th>Question Paper Category</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $x)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$x->quecategory_name}}</td>
                                            <td><a href="{{route('editquecategory',$x->id)}}" class="btn btn-info">Update</a></td>
                                            <td>
                                                <form method="post" action="{{route('delquecategory',$x->id)}}">
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