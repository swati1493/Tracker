@extends('layouts.app')

@section('content')
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
    input[type=float], select {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    resize: vertical;
    float: right;
    }
*input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 8px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
<div class="container-fluid">
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" >
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 CASE REPORT &#128522</center></div>
                 <center>
                     <a href="{{ url('/reports') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back" style="margin-bottom: -5px;margin-top: 10px;background-color: #212121;"></a>
                 </center>
                <div class="panel-body">
                    <center>
                        @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p> <br>
@endif
 @if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p> <br>
@endif
           <!--  <form class="form-horizontal" action="{{route('create_project')}}"  method="post" >
               

           @if(isset($project_detail) && !empty($project_detail))
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
            <label class="control-label col-sm-3" >Client:</label>
            <div class="col-sm-9">
                   <select name="client" required> 
                     <option value="">Select </option>
                 @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-3" for="email">Case Name:</label>
                <div class="col-sm-9">
                <input type="text" name="project_name" required>
                </div>
                </div>
                  <div class="form-group">
            <label class="control-label col-sm-3" >Case Type:</label>
            <div class="col-sm-9">
               <select name="project_type" required> 
                 <option  value="" >Select </option>
                            <option value="1">Internal</option>
                            <option value="2">Retainer</option>
                            <option value="3">Project</option>
                              <option value="4">Learning</option>
                                <option value="5">Leave</option>
                                  <option value="6">Program</option>
                            </select> 
                </div>
                </div> 
                <div class="form-group">
                <label class="control-label col-sm-3" for="email">Estimated Cost:</label>
                <div class="col-sm-9">
                <input type="text" name="estimated_cost" required>
                </div>
                </div>    
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Case" style="margin-bottom: 10px;"><br>





 @else
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
            <label class="control-label col-sm-3" >Client:</label>
            <div class="col-sm-9">
                   <select name="client" required> 
                     <option value="">Select </option>
                 @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-3" for="email">Case Name:</label>
                <div class="col-sm-9">
                <input type="text" name="project_name" required>
                </div>
                </div>
                  <div class="form-group">
            <label class="control-label col-sm-3" >Case Type:</label>
            <div class="col-sm-9">
               <select name="project_type" required> 
                 <option  value="" >Select </option>
                            <option value="1">Internal</option>
                            <option value="2">Retainer</option>
                            <option value="3">Project</option>
                              <option value="4">Learning</option>
                                <option value="5">Leave</option>
                                  <option value="6">Program</option>
                            </select> 
                </div>
                </div> 
                <div class="form-group">
                <label class="control-label col-sm-3" for="email">Estimated Cost:</label>
                <div class="col-sm-9">
                <input type="text" name="estimated_cost" required>
                </div>
                </div>          
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Add Case" style="margin-bottom: 10px;"><br>


  @endif

                
               
                
            </form>
         
        </center>
        <div class="row" style="color: black;font-weight: bold;">
  <center><form class="form-inline" action="search_project"  method="get" >
        <div class="form-group">
      <label for="pwd">Client:</label>
      <select class="form-control" name="client" id="client" onchange="getProjectbyClient()" required> 
        <option  value="">Select </option>
                  @if(!empty($client))
                    @foreach($client as $use)
                    <option value="{{$use->id}}" @if(isset($_GET['client']) && $_GET['client']==$use->id)selected @endif>{{$use->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
    </div>&nbsp
    <div class="form-group">
      <label for="pwd">Case:</label>
       <select class="form-control"  role="form" name="project" id="project" onchange="getDeliverablebyProject()"> 
                <option  value="">Select </option>

                  @if(!empty($project))
                    @foreach($project as $use)
                    <option value="{{$use->id}}" @if(isset($_GET['project']) &&  $_GET['project']==$use->id)selected @endif>{{$use->project_name}}</option>
                    @endforeach
                    @endif
                </select> 
    </div>
    <div class="form-group">
      <center><button type="submit" class="btn btn-success btn-sm">&#128269</button></center>
    </div>&nbsp<br><br>
   
  </form></center> -->
</div>
        <div class="table-responsive" style="color: black;">
        <table class="table table-striped table-borderd" style="color: black;">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE TYPE</th>
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ESTIMATED COST</th>
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">TOTAL COST</th>
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">PROFIT/LOSS</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
   
  </tr>
  </thead>
  <tbody>
@if(!empty($project))
@foreach($project as $pro)
  <tr>
    <td style="text-align: center;">{{$pro->client_name}}</td>
    <td style="text-align: center;" >{{$pro->project_name}}</td>

    <td style="text-align: center;">@if($pro->project_type==1) Internal @endif @if($pro->project_type==2) Retainer @endif @if($pro->project_type==3) Project @endif @if($pro->project_type==4) Learning @endif @if($pro->project_type==5) Leave @endif @if($pro->project_type==6) Program  @endif</td>
<td style="text-align: center;">{{$pro->estimate}}</td>
<td style="text-align: center;">{{getRate($pro->id)}}</td>
<td style="text-align: center;">

  <?php
if ($pro->estimate > getRate($pro->id)) {
  
  echo "<p style='color:#28B463;font-weight:bolder;'>".($pro->estimate-getRate($pro->id))." "."Profit"."</p>";

}
else if ($pro->estimate < getRate($pro->id)){
    echo "<p style='color:red;font-weight:bolder;'>".(getRate($pro->id)-$pro->estimate)." "."Loss"."</p>";
}
else{
  echo "-";
}
?></td>
     <td style="text-align: center;"><a href="{{url('update_project')}}/{{$pro->id}}" class="btn btn-primary btn-xs"> Edit </a>
     <a href="{{url('delete_project')}}/{{$pro->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
    
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
</div>
<center>
{{$project->links()}}</center>
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

