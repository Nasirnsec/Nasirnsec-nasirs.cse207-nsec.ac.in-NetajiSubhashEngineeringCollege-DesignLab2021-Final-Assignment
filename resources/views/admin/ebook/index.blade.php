 @extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            E-Book  Table
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
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Pages</th>
                                            <th>Published On</th>
                                            <th>Likes</th>
                                            <th>Dislikes</th>
                                            <th>Description</th>
                                            <th>Uploaded By</th>
                                            <th>Picture</th>
                                            <th>E-Book</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            <th>Block?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $x)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$x->ebookcat->ebookcategory_name}}</td>
                                            <td>{{$x->title}}</td>
                                            <td>{{$x->author}}</td>
                                            <td>{{$x->pages}}</td>
                                            <td>{{$x->published_on}}</td>
                                            <td>{{$x->like}}</td>
                                            <td>{{$x->dislike}}</td>
                                            <td>{{$x->description}}</td>
                                            <td>{{$x->uploaded_by}}</td>
                                            <td><img height="100" width="200"src="{{URL::to('/')}}/upload/{{$x->picture}}"></td>
                                            <td><a class="btn btn-warning" href="{{URL::to('/')}}/upload/{{$x->ebook}}">Preview</a></td>
                                            <td><a href="{{route('editebook',$x->id)}}" class="btn btn-info">Update</a></td>
                                            <td>
                                                <form method="post" action="{{route('delebook',$x->id)}}">
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
                                            </td>
                                            <td>
                                                @if($x->status=='Blocked')
                                                Data is already blocked.
                                                @else
                                                <form method="post" action="{{route('blockebook',$x->id)}}">
                                                    @csrf
                                                    <input type="submit" value="Block" class="btn btn-danger">
                                                </form>
                                                @endif
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