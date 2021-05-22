@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add Video Content
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
                            Fill Video Content Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('addvideo')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="Select">Category</label>
                                                <select class="form-control" name="cat" id="cat" type="text" placeholder="Enter Category">
                                                    
                                                    <option selected disabled >Select Category</option>
                                                    @foreach($c as $x)
                                                        <option value="{{$x->id}}">{{$x->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Sub Category</label>
                                                <select class="form-control" name="subcat" id="subcat" type="text" placeholder="Enter Sub Category">
                                                    
                                                    <option selected disabled >Select Sub Category</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Title</label>
                                                <input class="form-control" name="title" id="Input" type="text" placeholder="Enter Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Content</label>
                                                <textarea class="form-control" name="content" id="Input" type="text" placeholder="Enter Content"></textarea>
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Tags</label>
                                                <textarea class="form-control" name="tags" id="Input" type="text" placeholder="Enter Tags"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Select from where you want to upload the video</label>
                                                <select class="form-control" onchange=" show(this.value)" name="media" id="media">
                                                    <option disabled selected>Select Type</option>
                                                    <option value="1">My Computer</option>
                                                    <option value="2">YouTube</option>
                                                </select>
                                            </div>
                                            <div id="mediacontent"></div>
                                            
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

<script src="{{asset('src/assets/js/jquery-3.4.1.min.js')}}"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#cat').change(function(e){
            var op=" ";
            e.preventDefault();
          
            jQuery.ajax({

                url: "{{ route('getsubcatvideo') }}",

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
<script type="text/javascript">
    function show(val)
    {
        if(val==1){
           
            var a ="<div class='form-group'><label>Video</label><input type='file' name='video' class='form-control'></div><div class='form-group'><label>Type</label><input type='text' name='type' class='form-control' placeholder='Enter Type (extension of the video)'></div>";
            document.getElementById('mediacontent').innerHTML=a;
        }
        else{
         var a ="<div class='form-group'><label>Video</label><input type='text' name='video' class='form-control' placeholder='Enter URL'></div>";
            document.getElementById('mediacontent').innerHTML=a;    
        }
    }
</script>
@endsection