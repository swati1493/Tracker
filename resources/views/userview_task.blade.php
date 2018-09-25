@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;font-size:2vw;">&#128522 Your Timesheets &#128522   
                     </center>
                 </div>
                  <center>
                     <a href="{{ url('/user') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;"></a>
                 </center>
                <div class="panel-body">

                    <center>
                                          @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p> <br>
@endif
           
<style>
    input[type=text], select {
    width: 80%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }
    input[type=date], select {
    width: 80%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }
    input[type=number], select {
    width: 80%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }


                </style>
                 <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>
 @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p> <br>
@endif
 @if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p> <br>
@endif


        </center>
<div class="table-responsive">
         <table  class="table table-striped table-borderd">

            <thead>
  <tr>
    <th>DATE </th>
<!--     <th>TASK OWNER </th> -->
    <th> CLIENT</th>
    <th>PROJECT</th>
    <th>DELIVERABLE</th>
    <th>TASK</th>
    <th>HOURS</th>
      <th>Action</th>
     
  </tr>
  </thead>
  <tbody>
@if(!empty($task))
@foreach($task as $tra)
  <tr>
    <td>{{$tra->date}}</td>
   <!--  <td>{{$tra->name}}</td> -->
    <td>{{$tra->client_name}}</td>
    <td>{{$tra->project_name}}</td>
    <td>{{$tra->deliverable_name}}</td>
    <td>{{$tra->task}}</td>
    <td>{{$tra->hours}}</td>
      <td><a href="{{ url('/add_tracker') }}" class="btn btn-primary btn-xs"> Update </a>
      <a href="{{url('delete_task')}}/{{$tra->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
</div>
<center>
{{$task->links()}}</center>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
