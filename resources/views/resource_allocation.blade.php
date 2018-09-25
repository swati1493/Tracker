@extends('layouts.app')

@section('content')
<div class="container-fluid" >
    <div class="row" >
        <div class="col-md-16 col-md-offset-0" >

            <div class="panel panel-default" style="" >
                <div class="panel-heading" style="background-color:#DA2632;"><center style="font-size: 20px;">&#128522 RESOURCE ALLOCATION TABLE &#128522</center>
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
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }
    input[type=date], select {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }
    input[type=number], select {
    width: 100%;
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

  <div class="form-group">
    
<form class="form-horizontal" action="{{route('save_resourceallocation')}}"  method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                
                     <div class="form-group">
                <label class="control-label col-sm-3" for="email">DATE :</label>
                <div class="col-sm-9">
                <input type="date" name="date" class="" required>
                </div>
                </div>
                
                      <div class="form-group" >
       <label class="control-label col-sm-3" >RESOURCE :</label>
        <div class="col-sm-9">
      <select class="form-control"   role="form" name="resource"> 
                 <option  value="">Select </option>
                    @if(!empty($resource))
                    @foreach($resource as $use)
                    <option   value="{{$use->resource_name}}">{{$use->resource_name}}</option>
                    @endforeach
                    @endif
                   
                </select>
    </div> </div> 

                   <div class="form-group">
                <label class="control-label col-sm-3" for="hours">TIME :</label>
                <div class="col-sm-9">
             <!--    <input type="dropdown" name="hour"  class=""  required=""> -->

                <select name="hours" type="text" required>
                      <option  value="">Select </option>
                <option value="9.30 - 10:30">9.30 - 10:30</option>
                  <option value="10.30 - 11:30">10.30 - 11:30</option>
                  <option value="11.30 - 12:30">11.30 - 12:30</option>
                  <option value="12.30 - 1:30">12.30 - 1:30</option>
                  <option value="2.30 - 3:30">2.30 - 3:30</option>
                  <option value="3.30 - 4:30">3.30 - 4:30</option>
                  <option value="4.30 - 5:30">4.30 - 5:30</option>
                  
                   </select>              
                </div>
                </div>  

                    
                 <input type="submit" class="btn btn-md btn-success" name="submit" value="Add" style="margin-bottom: 0px;margin-top: 0px;"><br><br>
                <!--  <a class="btn btn-md btn-success" style="margin-top: 0px;font-size: 14px;" href="{{ url('/add_resourceavailability') }}">RESOURCE AVAILABILITY</a><br><br> -->
</form>

                 <div class="table-responsive">
         <table  class="table table-striped table-borderd">

            <thead>
  <tr style="color: red;font-size: 17px;background-color: #F7DC6F ">
    <th>DATE </th>
    <th>RESOURCE</th>
    <th>TIME</th>
     <th>BOOKED BY</th>
  </tr>
  </thead>
  <tbody>
@if(!empty($task))
@foreach($task as $tra)
  <tr>
    <td>{{$tra->date}}</td>
    <td>{{$tra->resource_name}}</td>
    <td>{{$tra->hours}}</td>
    <td>{{$tra->booked_by}}</td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
</div>
</div>
<center>
{{$task->links()}}</center></div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   
    $(document).ready(function(){
        
    });
    function getProjectbyClient()
    {
        var clientid = $('#client').val();
        if(clientid!='')
        {
            $.get('{{url("get_project_by_client")}}/'+clientid,function(data){
                 $('#project').html(data);
            });
        }
    }
     function getDeliverablebyProject()
    {
        var projectid = $('#project').val();
        if(projectid!='')
        {
            $.get('{{url("get_deliverable_by_project")}}/'+projectid,function(data){
                 $('#deliverable').html(data);
            });
        }
    }
</script>
