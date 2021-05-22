@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Update Question Paper Category 
        </h1>
        @if(session()->get('insert'))
        <div class="alert alert-success text-center">{{session()->get('insert')}}</div>
        @endif
    </div>
</div> 

     <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill Question Paper Category Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('upquecategory',$data->id)}}">
                                    	@csrf
                                            <div class="form-group">
                                                <label for="Select">Question Paper Category</label>
                                                <input class="form-control" value="{{$data->quecategory_name}}" name="quecat" id="Input" type="text" placeholder="Enter Question Paper Category">
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="padding-left: 40px;padding-right: 40px;">Update</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
@endsection