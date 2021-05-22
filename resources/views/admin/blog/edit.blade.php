@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Update Blog
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
                            Fill Blog Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('upblog',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="Select">Category</label>
                                                <select class="form-control" name="cat" id="cat" type="text" placeholder="Enter Category">
                                                    
                                                    <option value="{{$data->category_id}}">{{$data->cat->category_name}}</option>
                                                    @foreach($c as $x)
                                                        <option value="{{$x->id}}">{{$x->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Sub Category</label>
                                                <select class="form-control" name="subcat" id="subcat" type="text" placeholder="Enter Sub Category">
                                                    <option value="{{$data->subcategory_id}}">{{$data->subcat->subcategory_name}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Title</label>
                                                <input class="form-control" name="title" value="{{$data->title}}" id="Input" type="text" placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Content</label>
                                                <textarea class="form-control" name="content" id="Input" type="text" placeholder="Enter Content">{{$data->content}}</textarea>
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Tags</label>
                                                <textarea class="form-control" name="tags" id="Input" type="text" placeholder="Enter Tags">{{$data->tags}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="Select">Previous Picture</label>
                                                <img height="150" width="470" class="img-fluid rounded"src="{{URL::to('/')}}/upload/{{$data->picture}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Upload New Picture</label>
                                                <input class="form-control" name="picture" id="picture" type="file" placeholder="Enter Picture">
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

<script src="{{asset('src/assets/js/jquery-3.4.1.min.js')}}"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#cat').change(function(e){
            var op=" ";
            e.preventDefault();
          
            jQuery.ajax({

                url: "{{ route('getsubcat') }}",

                method: 'post',
                // dataType: 'Json',
                  data: {
                     '_token':"{{ csrf_token() }}",
                     'cat' :$("#cat").val()
                    },

                success: function(data)
                {   
                    op+='<option disabled selected>Select Sub Category</option>';
                    for(var i=0;i<data.length;i++)
                    {
                       op+= '<option value="'+data[i].id+'">'+data[i].subcategory_name+'</option>';
                    }
                    $('#subcat').html(" ");
                    $('#subcat').append(op);
                  },error: function(xhr, status, error)
                  {
                    alert("error:"+xhr.responseText);
                  }
            });
        });
 });
</script>
@endsection