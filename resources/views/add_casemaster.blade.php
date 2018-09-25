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
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 CASE MASTER &#128522</center></div>
                 <center>
                     <a href="{{ url('/admin') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;background-color: #212121;"></a>
                 </center>
                <div class="panel-body">
                    <center>
                        @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p> <br>
@endif
 @if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p> <br>
@endif
            <form class="form-horizontal" action="{{route('create_casemaster')}}"  method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
               
@if(isset($casemaster_detail) && !empty($casemaster_detail))

 <a class="btn btn-sm btn-success" href="{{url('add_casemaster')}}" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >Client Name:</label>
            <div class="col-sm-3">
                   <select name="client_name" value=".<?php echo $casemaster_detail->client_name ?>." required> 
                     <option value="">Select </option>
                 @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}" <?php if($casemaster_detail->client_name==$cli->id) echo 'selected="selected"';?>>{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
                <input type="hidden" name="casemaster_id" value="{{$casemaster_detail->id}}" >
                </div>
                             <label class="control-label col-sm-2" for="email">Case Name:</label>
                <div class="col-sm-3">
                <input type="text" name="case_name" value="{{$casemaster_detail->case_name}}" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">Case Owner:</label>
                <div class="col-sm-3">
                 <select class="form-control" name="case_owner"  value=".<?php echo $casemaster_detail->case_owner ?>." required onchange="saved_tasks()"> 
                 <option  value="">Select </option>
                    @if(!empty($resource))
                    @foreach($resource as $use)
                    <option   value="{{$use->id}}"  <?php if($casemaster_detail->case_owner==$use->id) echo 'selected="selected"';?>>{{$use->resource_name}}</option>
                    @endforeach
                    @endif
                   
                </select>
                </div>
                
                 
                <label class="control-label col-sm-2" for="email">Start Date :</label>
                <div class="col-sm-3">
                <input type="date" name="start_date" value="{{$casemaster_detail->start_date}}" required>
                </div>
               </div>
             <!--    <label class="control-label col-sm-2" for="email">Client POC:</label>
                <div class="col-sm-3">
                <input type="text" name="client_poc" required>
                </div> -->
              
                  <div class="form-group">
            <label class="control-label col-sm-2" >Case Status:</label>
            <div class="col-sm-3">
               <select name="case_status" value="<?php echo $casemaster_detail['case_status'] ?>" readonly="readonly"required> 
                 <option  value="" >Select </option>
                            <option value="1" <?php if( $casemaster_detail['case_status']==1) echo 'selected="selected"';?>>New</option>
                            <option value="2" <?php if( $casemaster_detail['case_status']==2) echo 'selected="selected"';?>>Current</option>
                            <option value="3" <?php if( $casemaster_detail['case_status']==3) echo 'selected="selected"';?>>Delivered</option>
                              <option value="4" <?php if( $casemaster_detail['case_status']==4) echo 'selected="selected"';?>>Archived</option>
                               
                            </select> 
                </div>
              
                <label class="control-label col-sm-2" for="email">End Date :</label>
                <div class="col-sm-3">
                <input type="date" name="end_date" value="{{$casemaster_detail->end_date}}" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >Delivery Status:</label>
                <div class="col-sm-3">
                <input type="text" value="{{$casemaster_detail->delivery_status}}" name="delivery_status" required>
                </div>
                 <label class="control-label col-sm-2">Estimated Cost :</label>
                <div class="col-sm-3">
                <input type="text" value="{{$casemaster_detail->estimated_cost}}" name="estimated_cost" class="" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Case" style="margin-bottom: 10px;background-color: #212121;"><br>


 

                 <!-- <input type="submit" name="submit" value="VIEW"> -->
               
          
  @else
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >Client Name:</label>
            <div class="col-sm-3">
                   <select name="client_name" required> 
                     <option value="">Select </option>
                 @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
                </div>
                             <label class="control-label col-sm-2" for="email">Case Name:</label>
                <div class="col-sm-3">
                <input type="text" name="case_name" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">Case Owner:</label>
                <div class="col-sm-3">
                 <select class="form-control"   role="form" name="case_owner" onchange="saved_tasks()"> 
                 <option  value="">Select </option>
                    @if(!empty($resource))
                    @foreach($resource as $use)
                    <option   value="{{$use->id}}">{{$use->resource_name}}</option>
                    @endforeach
                    @endif
                   
                </select>
                </div>
                
                 
                <label class="control-label col-sm-2" for="email">Start Date :</label>
                <div class="col-sm-3">
                <input type="date" name="start_date" class="" required>
                </div>
               </div>
             <!--    <label class="control-label col-sm-2" for="email">Client POC:</label>
                <div class="col-sm-3">
                <input type="text" name="client_poc" required>
                </div> -->
              
                  <div class="form-group">
            <label class="control-label col-sm-2" >Case Status:</label>
            <div class="col-sm-3">
               <select name="case_status" required> 
                 <option  value="" >Select </option>
                            <option value="1">New</option>
                            <option value="2">Current</option>
                            <option value="3">Delivered</option>
                              <option value="4">Archived</option>
                               
                            </select> 
                </div>
              
                <label class="control-label col-sm-2" for="email">End Date :</label>
                <div class="col-sm-3">
                <input type="date" name="end_date" class="" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >Delivery Status:</label>
                <div class="col-sm-3">
                <input type="text" name="delivery_status" required>
                </div>
                 <label class="control-label col-sm-2">Estimated Cost :</label>
                <div class="col-sm-3">
                <input type="text" name="estimated_cost" class="" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Add Case" style="margin-bottom: 10px;background-color: #212121;"><br>


 

                 <!-- <input type="submit" name="submit" value="VIEW"> -->
               
          
     @endif
                
            </form>
         
        </center>
     
         <table class="table table-striped table-borderd" style="color: black;">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">S.NO</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT NAME</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE NAME</th>
  <!--   <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE DESCRIPTION</th> -->
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE OWNER</th>
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">START DATE</th>
    
<!--     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT POC</th> -->
     <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE STATUS</th>
      <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">END DATE</th>
       <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DELIVERY STATUS</th>
        <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ESTIMATED COST</th>
        <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
   
  </tr>
  </thead>
  <tbody>
    <?php $i=0; ?>
@if(!empty($project))
@foreach($project as $pro)
  <tr>

 <td style="text-align: center;">{{++$i}}</td>
   <td style="text-align: center;">{{$pro->client_name}}</td>
     <td style="text-align: center;">{{$pro->case_name}}</td>
   <td style="text-align: center;">{{$pro->resource_name}}</td>
    <td style="text-align: center;">{{$pro->start_date}}</td>
   <td style="text-align: center;">@if($pro->case_status==1) New @endif @if($pro->case_status==2) Current @endif @if($pro->case_status==3) Delivered @endif @if($pro->case_status==4) Archieved @endif </td>
   <td style="text-align: center;">{{$pro->end_date}}</td>
   <td style="text-align: center;">{{$pro->delivery_status}}</td>
     <td style="text-align: center;">{{$pro->estimated_cost}}</td>
  <td style="text-align: center;"><a href="{{url('update_casemaster')}}/{{$pro->id}}" class="btn btn-primary btn-xs"> Edit </a>
    <a href="{{url('delete_casemaster')}}/{{$pro->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
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

