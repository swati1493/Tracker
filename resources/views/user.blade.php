@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#F9EBEA ">
    <div class="row" style="background-color:#F9EBEA ">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                
                <div class="panel-heading" align="center" style="font-size: 20px;background-color:#F9EBEA">&#128591 User Dashboard &#128591</div>

                <div class="panel-body" align="center" style="font-size: 20px;background-color:  #D0ECE7 "><strong style="font-size: 30px;font-size:2vw;">
                    &#128522 Welcome in Brands Of Desire &#128522</strong><br>
                    @if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p>
@endif
                  
                    <center><a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;font-weight: bolder;" href="{{ url('/add_tracker') }}">CASE ACCOUNTING SHEET</a> <br>
                        <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;font-weight: bolder;" href="{{ url('/resource_allocation') }}">RESOURCE ALLOCATION TABLE</a> <br>
                         <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;font-weight: bolder;" href="{{ url('/add_resourceavailability') }}">RESOURCE AVAILABILITY</a><br><br>
                    <!-- <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;font-weight: bolder;" href="{{ url('/userview_task') }}">View Timesheet</a> --></center> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
