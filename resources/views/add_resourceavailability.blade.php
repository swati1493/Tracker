<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Brands Of Desire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="fonts/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
@extends('layouts.app')

@section('content')
<div class="container-fluid" >
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default pull-top" >
                <div class="panel-heading" style=""><center style="font-size: 20px;font-weight: bolder;">&#128522 CAPABILITY MANAGEMENT MASTER &#128522</center></div>
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
 <style>
    input[type=text], select {
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
<form class="form-horizontal" action="{{route('create_resource')}}"  method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
               
  @if(isset($resource_detail) && !empty($resource_detail))


    <a class="btn btn-sm btn-success" href="{{url('add_resourceavailability')}}" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >RESOURCE ID:</label>
             <div class="col-sm-3">
                <input type="text" name="emp_no" value="{{$resource_detail->emp_no}}" required>
                <input type="hidden" name="resource_id" value="{{$resource_detail->id}}" >
                </div>
                
                             <label class="control-label col-sm-2" for="email">RESOURCE NAME:</label>
                <div class="col-sm-3">
                <input type="text" name="resource_name" value="{{$resource_detail->resource_name}}" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">DESIGNATION:</label>
                <div class="col-sm-3">
                <input type="text" name="designation" value="{{$resource_detail->designation}}" required>
                
                </div>
                
                 
                <label class="control-label col-sm-2" for="email">RESOURCE CATEGORY:</label>
                <div class="col-sm-3">

                <select name="resource_category" value="<?php echo $resource_detail['resource_category'] ?>" readonly="readonly" required> 
                 <option >Select </option>
                            <option value="1" <?php if( $resource_detail['resource_category']==1) echo 'selected="selected"';?> >External-Full Time</option>
                            <option value="2" <?php if( $resource_detail['resource_category']==2) echo 'selected="selected"';?> >Internal-Full Time</option> 
                            <option value="3" <?php if( $resource_detail['resource_category']==3) echo 'selected="selected"';?> >Independent-Part Time</option> 
                            <option value="4" <?php if( $resource_detail['resource_category']==4) echo 'selected="selected"';?> >>Consulting Partner</option>   
                            </select> 
                </div>
               </div>
           
                  <div class="form-group">
            <label class="control-label col-sm-2" >HOUR AVAILABLE PER WEEK:</label>
            <div class="col-sm-3">
              <input type="text" name="hour_available" value="{{$resource_detail->hour_available}}" required>
                </div>
              
                <label class="control-label col-sm-2" for="email">WORK LOCATION:</label>
                <div class="col-sm-3">
                <input type="text" name="work_location" value="{{$resource_detail->work_location}}" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >CONTACT NO:</label>
                <div class="col-sm-3">
                <input type="text" name="contact_no" value="{{$resource_detail->contact_no}}" required>
                </div>
                 <label class="control-label col-sm-2">EMAIL-ID :</label>
                <div class="col-sm-3">
                <input type="text" name="email_id" value="{{$resource_detail->email_id}}" required>
                </div>
                </div>
                 <div class="form-group">
                <label class="control-label col-sm-2" >DOMAIN:</label>
                <div class="col-sm-3">
              <select name="domain" value="<?php echo $resource_detail['domain'] ?>" readonly="readonly" required> 
                 <option >Select </option>
                            <option value="1" <?php if( $resource_detail['domain']==1) echo 'selected="selected"';?> >PR</option>
                            <option value="2" <?php if( $resource_detail['domain']==2) echo 'selected="selected"';?>>Content</option>
                            <option value="3" <?php if( $resource_detail['domain']==3) echo 'selected="selected"';?>>UI/UX</option>
                              <option value="4" <?php if( $resource_detail['domain']==4) echo 'selected="selected"';?>>Design</option>
                               <option value="5" <?php if( $resource_detail['domain']==5) echo 'selected="selected"';?>>Consulting</option>
                               <option value="6" <?php if( $resource_detail['domain']==6) echo 'selected="selected"';?>>HR</option>
                               <option value="7" <?php if( $resource_detail['domain']==7) echo 'selected="selected"';?>>Digital</option>
                            </select> 
                </div>
                 <label class="control-label col-sm-2">RATE PER HOUR:</label>
                <div class="col-sm-3">
                <input type="text" name="rate"  value="{{$resource_detail->rate}}" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Resource" style="margin-bottom: 10px;background-color: #212121;"><br>
           

   @else
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >RESOURCE ID:</label>
             <div class="col-sm-3">
                <input type="text" name="emp_no" required>
                </div>
                
                             <label class="control-label col-sm-2" for="email">RESOURCE NAME:</label>
                <div class="col-sm-3">
                <input type="text" name="resource_name" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">DESIGNATION:</label>
                <div class="col-sm-3">
                <input type="text" name="designation" required>
                
                </div>
                
                 
                <label class="control-label col-sm-2" for="email">RESOURCE CATEGORY:</label>
                <div class="col-sm-3">
                <select name="resource_category" required> 
                 <option  value="" >Select </option>
                           <option value="1">External-Full Time</option>
                            <option value="2">Internal-Full Time</option>
                            <option value="3">Independent-Part Time</option> 
                            <option value="4">Consulting Partner</option>   
                            </select> 
                </div>
               </div>
             <!--    <label class="control-label col-sm-2" for="email">Client POC:</label>
                <div class="col-sm-3">
                <input type="text" name="client_poc" required>
                </div> -->
              
                  <div class="form-group">
            <label class="control-label col-sm-2" >HOUR AVAILABLE PER WEEK:</label>
            <div class="col-sm-3">
              <input type="text" name="hour_available" class="" required>
                </div>
              
                <label class="control-label col-sm-2" for="email">WORK LOCATION:</label>
                <div class="col-sm-3">
                <input type="text" name="work_location" class="" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >CONTACT NO:</label>
                <div class="col-sm-3">
                <input type="text" name="contact_no" required>
                </div>
                 <label class="control-label col-sm-2">EMAIL-ID :</label>
                <div class="col-sm-3">
                <input type="text" name="email_id" class="" required>
                </div>
                </div>
                 <div class="form-group">
                <label class="control-label col-sm-2" >DOMAIN:</label>
                <div class="col-sm-3">
              <select name="domain" required> 
                 <option  value="" >Select </option>
                             <option value="1">PR</option>
                            <option value="2">Content</option>
                            <option value="3">UI/UX</option>
                              <option value="4">Design</option>
                               <option value="5">Consulting</option>
                                <option value="6">HR</option>
                               <option value="7">Digital</option>
                            </select> 
                </div>
                 <label class="control-label col-sm-2">RATE PER HOUR:</label>
                <div class="col-sm-3">
                <input type="text" name="rate" class="" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Add Resource" style="margin-bottom: 10px;background-color: #212121;"><br>
           

   @endif
              
            </form><br>
            <form class="form-inline" action="{{route('create_resourceavailability')}}" method="post">
               

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
            <div class="form-group">
                   <select class="form-control" name="resource" > 
                     <option value="">Search Domain </option>
                 @if(!empty($domain))
                    @foreach($domain as $rec)
                    <option value="{{$rec->domain}}">{{$rec->domain}}</option>
                    @endforeach
                    @endif
                </select> 
               </div>
                 <div class="form-group">
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Search" style="background-color: #212121;">
               </div>
            </form><br>

        </center>
           <div class="table-responsive">
<table class="table table-striped table-borderd">
            <thead>
  <tr style="color: #ffffff; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">S.NO</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">EMP NO.
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">RESOURCE NAME
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DESIGNATION
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">RESOURCE CATEGORY
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">HOUR AVAILABLE PER WEEK
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">WORK LOCATION
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CONTACT NO.
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">EMAIL-ID
</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DOMAIN
</th>
 <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">RATE PER HOUR
</th>
<th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
<!-- <th>Action</th> -->
  
  </tr>
  </thead>
  <tbody>
     <?php $i=0; ?>
@if(!empty($resource))
@foreach($resource as $rec)
  <tr>
     <td style="text-align: center;">{{++$i}}</td>
    <td style="text-align: center;">{{$rec->emp_no}}</td>
    <td style="text-align: center;">{{$rec->resource_name}}</td>
    <td style="text-align: center;">{{$rec->designation}}</td>
     <td style="text-align: center;"> @if($rec->resource_category==1) External-Full Time
      @endif @if($rec->resource_category==2) Internal-Full Time 
        @endif @if($rec->resource_category==3) Independent-Part Time 
          @endif @if($rec->resource_category==4) Consulting Partner
    @endif </td>
    <td style="text-align: center;">{{$rec->hour_available}}</td>
    <td style="text-align: center;">{{$rec->work_location}}</td>
    <td style="text-align: center;">{{$rec->contact_no}}</td>
    <td style="text-align: center;">{{$rec->email_id}}</td>
    <td style="text-align: center;"> @if($rec->domain==1) PR
      @endif @if($rec->domain==2) Content
      @endif @if($rec->domain==3) UI/UX
      @endif @if($rec->domain==4) Design
      @endif @if($rec->domain==5) Consulting 
      @endif @if($rec->domain==6) HR 
      @endif @if($rec->domain==7) Digital 
    @endif </td>
       <td style="text-align: center;">{{$rec->rate}}</td>

   <td style="text-align: center;"><a href="{{url('update_resource')}}/{{$rec->id}}" class="btn btn-primary btn-xs"> Edit </a>
    <a href="{{url('delete_resource')}}/{{$rec->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
   
<!--     <td><a href="{{url('update_resourceavailability')}}/{{$rec->id}}" class="btn btn-primary btn-xs"> Edit </a>
    <a href="{{url('delete_resourceavailability')}}/{{$rec->id}}" class="btn btn-danger btn-xs" > Delete </a></td> -->
    
  </tr>
 @endforeach
 @endif
 </tbody>
</table></div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
        