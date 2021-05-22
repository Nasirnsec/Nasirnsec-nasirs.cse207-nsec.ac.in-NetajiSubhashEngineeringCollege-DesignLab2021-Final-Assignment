@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add Sub Category 
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
                            Fill Sub Category Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('addsubcategory')}}">
                                        @csrf
                                        <div class="form-group">
                                                <label for="Select">Category</label>
                                                <select class="form-control" name="cat" id="Input" type="text" placeholder="Enter Category">
                                                    
                                                    <option selected disabled >Select Category</option>
                                                    @foreach($data as $x)
                                                        <option value="{{$x->id}}">{{$x->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Sub Category</label>
                                                <input class="form-control" name="subcat" id="Input" type="text" placeholder="Enter Sub Category">
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="padding-left: 40px;padding-right: 40px;">Save</button>
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