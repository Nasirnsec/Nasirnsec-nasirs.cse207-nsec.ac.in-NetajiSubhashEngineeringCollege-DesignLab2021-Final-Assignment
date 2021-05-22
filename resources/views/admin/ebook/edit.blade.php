@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Update E-Book
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
                            Fill E-Book Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('upebook',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="Select">Category</label>
                                                <select class="form-control" name="cat" id="cat" type="text" placeholder="Enter Category">
                                                    
                                                    <option value="{{$data->ebookcategory_id}}">{{$data->ebookcat->ebookcategory_name}}</option>
                                                    @foreach($c as $x)
                                                        <option value="{{$x->id}}">{{$x->ebookcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Title</label>
                                                <input class="form-control" value="{{$data->title}}" name="title" id="Input" type="text" placeholder="Enter Title">
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Author</label>
                                                <input class="form-control" value="{{$data->author}}" name="author" id="Input" type="text" placeholder="Enter name of Author">
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Pages</label>
                                                <input class="form-control" value="{{$data->pages}}" name="pages" id="Input" type="text" placeholder="Enter no. of pages">
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Published On</label>
                                                <input class="form-control" value="{{$data->published_on}}" name="publish" id="Input" type="date" placeholder="Enter date">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Description</label>
                                                <textarea class="form-control" name="description" id="Input" type="text" placeholder="Enter  Description">{{$data->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Previous Picture</label>
                                                <img height="150" width="470" class="img-fluid rounded"src="{{URL::to('/')}}/upload/{{$data->picture}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Upload New Picture</label>
                                                <input class="form-control" name="picture" id="picture" type="file" placeholder="Enter Picture">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">PDF</label>
                                                <input class="form-control" name="pdf" id="picture" type="file" placeholder="Enter PDF">
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