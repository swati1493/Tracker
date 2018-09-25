@extends('layouts.app')

@section('content')
<div class="container-fluid" >
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" style="opacity: 0.94">
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 CLIENT MASTER &#128522</center></div>
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

            <form class="form-inline" action="{{route('create_client')}}" method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
               

                @if(isset($client_detail) && !empty($client_detail))
                 <a class="btn btn-sm btn-success" href="{{url('add_client')}}" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                
                <input type="text" name="client_name" placeholder="Add Your New Client" class="container" value="{{$client_detail->client_name}}" required>
              <input type="hidden" name="client_id" value="{{$client_detail->id}}">
                </div>     
               <input type="submit" style="background-color: #212121;" class="btn btn-md btn-success" name="submit" value="Update Client">
                
               @else
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                
                <input type="text" name="client_name" placeholder="Add Your New Client" class="container" required>
              
           
            </div>
                     
               <input type="submit" style="background-color: #212121;" class="btn btn-md btn-success" name="submit" value="Add Client">
                
                @endif
            </form><br>

        </center>
        <div class="row">
   
  <center><form class="form-inline" action="search_client"  method="get" >
      <div class="form-group">
     
      <select class="form-control" name="client" id="client" onchange="getProjectbyClient()"> 
        <option  value=""> Search Client </option>
                  @if(!empty($client))
                    @foreach($client as $use)
                    <option value="{{$use->id}}" @if(isset($_GET['client']) && $_GET['client']==$use->id)selected @endif>{{$use->client_name}}</option>
                    @endforeach
                    @endif
                </select> 
    </div>
   
    <div class="form-group">
      <center><button type="submit" style="background-color: #212121;" class="btn btn-success btn-md">Search</button></center>
    </div>&nbsp
   
  </form></center>
</div><br>
        <table class="table table-striped table-borderd">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
 <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">S.NO</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT NAME</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
  </tr>
  </thead>
  <tbody>
    <?php $i=0; ?>
@if(!empty($client))
@foreach($client as $cli)
  <tr>
     <td style="text-align: center;">{{++$i}}</td>
    <td style="text-align: center;">{{$cli->client_name}}</td>
    <td style="text-align: center;"><a href="{{url('update_client')}}/{{$cli->id}}" class="btn btn-primary btn-xs"> Edit </a>
    <a href="{{url('delete_client')}}/{{$cli->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
<!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
