<?php //echo "<pre>";print_r($deliverable);die; ?>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" style="opacity: 0.94">
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 Add Your New Deliverable &#128522</center></div>
                 <center>
                     <a href="{{ url('/admin') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-top: 10px;background-color: #212121;"></a>
                 </center>
                <div class="panel-body">
                    <center>
                        @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p> <br>
@endif
@if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p> <br>
@endif
            <form action="{{route('create_deliverable')}}" method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
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
    width:100%;
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

@if(isset($deliverable_detail) && !empty($deliverable_detail))
 <a class="btn btn-sm btn-success" href="{{url('add_deliverable')}}" style="font-weight: bolder;background-color:#212121; ">BACK</a><br><br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
            <label class="control-label col-sm-3" >Client:</label>
            <div class="col-sm-3">
               
                   <select onchange="getProjectbyClient(1)" name="client" id="client1"  value=".<?php echo $deliverable_detail->client?>."  required>
                      <option  value="">Select </option>
                    @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}" <?php if($deliverable_detail->client_id==$cli->id) echo 'selected="selected"';?>>{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                  </select>
                   <input type="hidden" name="deliverable_id" value="{{$deliverable_detail->id}}" >
                </div>
               
                       <label class="control-label col-sm-2" >Case Name:</label>
            <div class="col-sm-3">
                   <select name="project" id="project1" value=".<?php echo $deliverable_detail->project ?>."  required > 
                     <option  value="">Select </option>
               
                     @if(!empty($casemaster))
                    @foreach($casemaster as $pro)
                    <option value="{{$pro->id}}" <?php if($deliverable_detail->project_id==$pro->id) echo 'selected="selected"';?>>{{$pro->case_name}}</option>
                    @endforeach
                    @endif
                </select>
                </div>
              </div><br>
<br>
          <div class="form-group">
                <label class="control-label col-sm-3" for="email">Deliverable Name:</label>
              
                    <div class="col-sm-8" >
                <input type="text" name="deliverable_name" style="margin-bottom: 5px;"  value="{{$deliverable_detail->deliverable_name}}" required></div>
          
              
                </div><br>
                   
                    <center>
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Deliverable" style="margin-bottom: 2px;margin-top: 15px;background-color: #212121;"></center>


 @else
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
            <label class="control-label col-sm-3" >Client:</label>
            <div class="col-sm-3">
               
                   <select onchange="getProjectbyClient(1)" name="client" id="client1"  required>
                      <option  value="">Select </option>
                    @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
               
                       <label class="control-label col-sm-2" >Case Name:</label>
            <div class="col-sm-3">
                   <select name="project" id="project1" required> 
                     <option  value="">Select </option>
                 @if(!empty($casemaster))
                    @foreach($casemaster as $pro)
                    <option value="{{$pro->id}}">{{$pro->case_name}}</option>
                    @endforeach
                    @endif
                </select>
                </div>
              </div><br>
<br>
          <div class="form-group">
                <label class="control-label col-sm-3" for="email">Deliverable Name:</label>
                <div class="col-sm-8" id="addmore">
                    <div>
                <input type="text" name="deliverable_name[]" style="margin-bottom: 5px;" required></div>
                <div class="btn btn-danger btn-xs pull-left"> <a href="javascript:void()" style="color: #ffffff; text-decoration: none;" id="add">&#10133 Add More Deliverable</a></div>
                </div>
                </div><br>
                    <center>
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Add Deliverable" style="margin-bottom: 2px;margin-top: 15px;background-color: #212121;"></center>
 @endif

            </form>
        

        </center>
       
     <center><form  action="search_deliverable"  method="get" >
        <div class="form-group">
      <label class="col-sm-1">Client:</label>
      <div class="col-sm-3">
      <select onchange="getProjectbyClient(2)" name="client" id="client2" class="form-control" required>
                      <option  value="">Select </option>
                    @if(!empty($client))
                    @foreach($client as $cli)
                    <option value="{{$cli->id}}">{{$cli->client_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
    </div>
    <div class="form-group">
      <label for="pwd" class="col-sm-1">Case Name:</label>
        <div class="col-sm-3">
       <select class="form-control"  role="form" name="project" id="project2" onchange="getDeliverablebyProject()"> 
                <option  value="">Select </option>

                  @if(!empty($casemaster))
                    @foreach($casemaster as $use)
                    <option value="{{$use->id}}"  @if(isset($_GET['project']) && $_GET['project']==$use->id)selected @endif >{{$use->case_name}}</option>
                    @endforeach
                    @endif
                </select> 
              </div>
    </div>
     <div class="form-group">
      <label for="pwd" class="col-sm-1">Deliverable:</label>
      <div class="col-sm-3">
       <select class="form-control" name="deliverable" id="deliverable">
                <option  value="">Select</option>

                    @if(!empty($deliverable_drop))
                    @foreach($deliverable_drop as $del)
                    <option value="{{$del->id}}" @if(isset($_GET['deliverable']) && $_GET['deliverable']==$del->id)selected @endif>{{$del->deliverable_name}}</option>
                    @endforeach
                    @endif
                  </select></div>
    </div><br><br>
    <div class="form-group">
      <center><button type="submit" class="btn btn-success btn-sm" style="background-color: #212121;">Search</button></center>
    </div>
  </form></center>

  
</div>
        <div class="table-responsive">
         <table class="table table-striped table-borderd" style="color: black;">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CASE</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DELIVERABLE NAME</th>
      <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
      
  </tr>
    </thead>
     <tbody>
@if(!empty($deliverable))
@foreach($deliverable as $del)
  <tr>
    <td style="text-align: center;">{{$del->client_name}}</td>
    <td style="text-align: center;">{{$del->case_name}}</td>
     <td style="text-align: center;">{{$del->deliverable_name}}</td>
     <td style="text-align: center;"><a href="{{url('update_deliverable')}}/{{$del->id}}" class="btn btn-info btn-xs"> Edit </a>
     <a href="{{url('delete_deliverable')}}/{{$del->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
     
     </tr> 
 @endforeach
 @endif
 </tbody>
</table>
</div>

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
    function getProjectbyClient(flg)
    {
        var clientid = $('#client'+flg).val();
        if(clientid!='')
        {
            $.get('{{url("get_project_by_client")}}/'+clientid,function(data){
                 $('#project'+flg).html(data);
            });
        }
    }
     function getDeliverablebyProject()
    {
        var projectid = $('#project2').val();
        if(projectid!='')
        {
            $.get('{{url("get_deliverable_by_project")}}/'+projectid,function(data){
                 $('#deliverable').html(data);
            });
        }
    }
</script>


<html>  
      <head>   
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
 </html>  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add').click(function(){
           $('#addmore').append('<div class="remove" ><div class="col-sm-14"><input type="text" name="deliverable_name[]" style="margin-bottom:5px;margin-top:5px;" required></div><div class="col-sm-14"> <a href="javascript:void()" class="removeadd btn btn-danger btn-xs pull-left">   &#10134 Remove Deliverable</div></div>');
        });
         $(document).on('click','.removeadd',function(){
           $(this).closest('.remove').remove();
         });
        
    });
</script>

 