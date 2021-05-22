@extends('layout')
@section('content')
            <!-- Start top-section Area -->
            <section class="top-section-area section-gap">
                <div class="container">
                    <div class="row justify-content-between align-items-center d-flex">
                        <div class="col-lg-8 top-left">
                            <h1 class="text-white mb-20 text-uppercase">Question Papers</h1>
                        </div>
                    </div>
                </div>  
            </section>

 <!-- Start travel Area -->
            <section class="travel-area section-gap" id="fashion">
                <div class="container">                     
                    <div class="row">
                        <div class="col-lg-12 travel-left">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Category</th>
                                            <th>Semester</th>
                                            <th>Subject</th>
                                            <th>Year</th>
                                            <th>Preview</th>
                                            <th>Download</th>
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
                                            <td><a href="{{URL::to('/')}}/upload/{{$x->question_paper}}"> Preview</a></td>
                                            <td><a href="{{URL::to('/')}}/upload/{{$x->question_paper}}" download="{{URL::to('/')}}/upload/{{$x->question_paper}}"> Download</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                                                    
                        </div>      
                    </div>
                </div>                  
            </section>
            <!-- End travel Area -->
<hr>



 


@endsection