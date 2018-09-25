@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">

            <div class="panel panel-default" style="background-color:;">
                <div class="panel-heading" style=""><center style="font-size: 22px;font-weight: bolder;">&#128522 TIME-SHEET &#128522</center>
                    </div>
                    <!-- <center>
                     <a href="{{ url('/user') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;"></a>
                 </center> -->

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

  <div class="form-group" >
<form class="form-horizontal" action="{{route('save_task')}}"  method="post" style="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

   @if(isset($task_detail) && !empty($task_detail))

    <a class="btn btn-sm btn-success" href="{{url('add_tracker')}}" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>

                     <div class="form-group">
                <label class="control-label col-sm-2"  name="test">DATE :</label>
                <div class="col-sm-2">
                <input type="date" value="{{$task_detail->date}}" name="date" class="" style="background-color:  #DCDCDC;" required>
                <input type="hidden" name="task_id" value="{{$task_detail->id}}">
                </div>
                
                
                
            <label class="control-label col-sm-2" >CLIENT :</label>
            <div class="col-sm-2" >
                   <select  style="background-color:  #DCDCDC;" name="client" id="client" onchange="getProjectbyClient()" required>
                      <option  value="">Select </option>
                    @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}" @if($task_detail->client==$cli->id) selected @endif >{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              

                
            <label class="control-label col-sm-2" >CASE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="project" id="project" onchange="getDeliverablebyProject()" required>
                      <option  value="">Select </option>
                    @if(!empty($casemaster))
                    @foreach($casemaster as $pro)
                    <option value="{{$pro->id}}" @if($task_detail->project== $pro->id)selected @endif>{{$pro->case_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
                <div class="form-group">
            <label class="control-label col-sm-2" >DELIVERABLE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="deliverable" id="deliverable"  required>
                      <option  value="">Select </option>
                    @if(!empty($deliverable))
                    @foreach($deliverable as $del)
                    <option value="{{$del->id}}" @if($task_detail->deliverable== $del->id)selected @endif>{{$del->deliverable_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
             
                
                   
                <label class="control-label col-sm-2" >TASK DESCRIPTION:</label>
                <div class="col-sm-2">
                <input  style="background-color:  #DCDCDC;" type="text" name="task" value="{{$task_detail->task}}" required>
                </div>
            
                <label class="control-label col-sm-2" for="hours">HOURS :</label>
                    <div class="col-sm-2">
                <select  style="background-color:  #DCDCDC;" name="hours" type="time" step='1' min="00:00:00" max="20:00:00" required>
                      <option  value="">Select </option>
                <option value="0.00">0.00</option>
                @for($i=0.25;$i<=16;$i=$i+0.25)
                <option value="{{number_format($i,2)}}" @if($task_detail->hours==number_format($i,2)) selected @endif >{{number_format($i,2)}}</option>
                @endfor
                   </select>              
                </div>
            <!--     <div class="col-sm-3">
                <select name="hours" type="decimal" required>
                      <option  value="">Select </option>
                <option value="0.25">0.25</option>
                @for($i=0.25;$i<=16;$i=$i+0.25)
                <option value="{{number_format($i,2)}}">{{number_format($i,2)}}</option>
                @endfor
                   </select>              
                </div> -->
                </div>                
                    
                 <input type="submit" class="btn btn-sm btn-success" name="submit" value="UPDATE TO TIMESHEET" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">
                
                 <br><br>
    @else

                     <div class="form-group">
                <label class="control-label col-sm-2" for="email">DATE :</label>
                <div class="col-sm-2">
                <input type="date" name="date" class="" style="background-color:  #DCDCDC;" required>
                </div>
                
                
                
            <label class="control-label col-sm-2" >CLIENT :</label>
            <div class="col-sm-2" >
                   <select  style="background-color:  #DCDCDC;" name="client" id="client" onchange="getProjectbyClient()" required>
                      <option  value="">Select </option>
                    @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              

                
            <label class="control-label col-sm-2" >CASE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="project" id="project" onchange="getDeliverablebyProject()" required>
                      <option  value="">Select </option>
                    @if(!empty($casemaster))
                    @foreach($casemaster as $pro)
                    <option value="{{$pro->id}}">{{$pro->case_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
                <div class="form-group">
            <label class="control-label col-sm-2" >DELIVERABLE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="deliverable" id="deliverable" required>
                      <option  value="">Select </option>
                    @if(!empty($deliverable))
                    @foreach($deliverable as $del)
                    <option value="{{$del->id}}">{{$del->deliverable_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
             
                
                   
                <label class="control-label col-sm-2" >TASK DESCRIPTION :</label>
                <div class="col-sm-2">
                <input  style="background-color:  #DCDCDC;" type="text" placeholder="Describe Your Task Here" name="task" id="task" required>
                </div>
            
                <label class="control-label col-sm-2" for="hours">HOURS :</label>
                    <div class="col-sm-2">
                <select  style="background-color:  #DCDCDC;" name="hours" type="time" step='1' min="00:00:00" max="20:00:00" required>
                      <option  value="">Select </option>
                <option value="0.00">0.00</option>
                @for($i=0.25;$i<=16;$i=$i+0.25)
                <option value="{{number_format($i,2)}}">{{number_format($i,2)}}</option>
                @endfor
                   </select>              
                </div>
            <!--     <div class="col-sm-3">
                <select name="hours" type="decimal" required>
                      <option  value="">Select </option>
                <option value="0.25">0.25</option>
                @for($i=0.25;$i<=16;$i=$i+0.25)
                <option value="{{number_format($i,2)}}">{{number_format($i,2)}}</option>
                @endfor
                   </select>              
                </div> -->
                </div>                
                    
                 <input type="submit" class="btn btn-sm btn-success" name="submit" value="ADD TO TIMESHEET" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; "><br><br>
    @endif
                
                

                 <div class="table-responsive">
         <table  class="table table-striped table-borderd">

            <thead>
  <tr style="color: #ffffff; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DATE </th>
<!--     <th>TASK OWNER </th> -->
    <th style="background-color: #DA2632;border-right: 5px solid white;text-align: center;"> CLIENT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white;text-align: center;">PROJECT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white;text-align: center;: ">DELIVERABLE</th>
    <th style="background-color: #DA2632;border-right: 5px solid white;text-align: center;">TASK</th>
    <th style="background-color: #DA2632;border-right: 5px solid white;text-align: center;">HOURS</th>
      <th style="background-color: #DA2632;text-align: center;">ACTION</th>
     
  </tr>
  </thead>
  <tbody>
@if(!empty($task))
@foreach($task as $tra)
  <tr style="color: black;">
    <td style="text-align: center;">{{$tra->date}}</td>
   <!--  <td>{{$tra->name}}</td> -->
    <td style="text-align: center;">{{$tra->client_name}}</td>
    <td style="text-align: center;">{{$tra->case_name}}</td>
    <td style="text-align: center;">{{$tra->deliverable_name}}</td>
    <td style="text-align: center;">{{$tra->task}}</td>
    <td style="text-align: center;">{{$tra->hours}}</td>
      <td style="text-align: center;"><a href="{{ url('/update_task') }}/{{$tra->id}}" style="color: blue;text-decoration: none;"> Edit </a>&nbsp|&nbsp
      <a href="{{url('delete_task')}}/{{$tra->id}}" style="color: red;text-decoration: none;" > Delete </a></td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
</div>
<center>{{$task->links()}}</center>
                 
            </form>
            
</div>
        </center>

                </div>
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
