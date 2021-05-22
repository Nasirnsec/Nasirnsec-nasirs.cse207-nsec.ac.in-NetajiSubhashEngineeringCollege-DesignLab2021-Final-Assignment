@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add Question Paper
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
                            Fill Question Paper Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style="margin-left: 200px;">
                                    <form role="form" method="post" action="{{route('addque')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label for="Select">Question Paper Category</label>
                                                <select class="form-control" name="quecat" id="quecat" type="text" placeholder="Enter Question Paper Category">
                                                    
                                                    <option selected disabled >Select Question Paper Category</option>
                                                    @foreach($c as $x)
                                                        <option value="{{$x->id}}">{{$x->quecategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Select">Semester</label>
                                                <select class="form-control" name="sem" id="Input">
                                                    <option selected disabled>Select Semester</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                </select>
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Subject</label>
                                                <input class="form-control" name="subject" id="Input" type="text" placeholder="Enter name of Subject">
                                            </div>
                                             <div class="form-group">
                                                <label for="Select">Year</label>
                                                <input list="year" placeholder="Select Year" class="form-control" name="year" >
                                                <datalist id="year">
                                                    <?php 
                                                      $right_now = getdate();
                                                      $this_year = $right_now['year'];
                                                      $start_year = 1900;
                                                      while ($start_year <= $this_year) {
                                                          echo "<option>{$start_year}</option>";
                                                          $start_year++;
                                                      }
                                                     ?>
                                                 </datalist>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="Select">Question Paper</label>
                                                <input class="form-control" name="question_paper" id="question_paper" type="file" placeholder="Enter Question Paper">
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