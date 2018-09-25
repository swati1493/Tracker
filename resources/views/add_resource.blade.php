@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;">&#128522 Add Your New Resource &#128522</center></div>
                   <center>
                     <a href="{{ url('/admin') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;"></a>
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

            <form action="{{route('create_resource')}}" method="post">
               

                @if(isset($resource_detail) && !empty($resource_detail))
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9">
                <input type="text" name="name" class="container" required>
                </div><br><br>
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9">
                <input type="email" name="email" class="container" required>
                </div><br><br>
                <label class="control-label col-sm-3" for="email">Password:</label>
                <div class="col-sm-9">
                <input type="Password" name="password" class="container" required>
                </div><br><br>
                 <label class="control-label col-sm-3" for="email">Type:</label>
                <div class="col-sm-9">
                <select name="user_type" required> 
                 <option  value="" >Select </option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                            </select> 
                </div><br><br>
                 <label class="control-label col-sm-3" for="rate">Rate:</label>
                <div class="col-sm-9">
                <input type="decimal" name="rate" class="container" required>
                </div><br><br>
              
                <center><input type="submit" class="btn btn-md btn-success" name="submit" value="Update Resource" style="margin-top: 10px;margin-bottom: 10px;"></center>
                
               @else
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9">
                <input type="text" name="name" class="container" required>
                </div><br><br>
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9">
                <input type="email" name="email" class="container" required>
                </div><br><br>
                <label class="control-label col-sm-3" for="email">Password:</label>
                <div class="col-sm-9">
                <input type="Password" name="password" class="container" required>
                </div><br><br>
                 <label class="control-label col-sm-3" for="email">Type:</label>
                <div class="col-sm-9">
                <select name="user_type" required> 
                 <option  value="" >Select </option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                            </select> 
                </div><br><br>
                 <label class="control-label col-sm-3" for="rate">Rate:</label>
                <div class="col-sm-9">
                <input type="decimal" name="rate" class="container" required>
                </div><br><br>
              
                     
                <center><input type="submit" class="btn btn-md btn-success" name="submit" value="Add Resource" style="margin-top: 10px;margin-bottom: 10px;"></center>
                 <div class="col-sm-9">
               
                </div>
                @endif
            </form>

        </center>
<table class="table table-striped table-borderd">
            <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Type</th>
    <th>Rate</th>
  <th>Action</th>
  
  </tr>
  </thead>
  <tbody>
@if(!empty($resource))
@foreach($resource as $res)
  <tr>
    <td>{{$res->name}}</td>
    <td>{{$res->email}}</td>
    <td>{{$res->password}}</td>
    <td>@if($res->user_type==1) User @endif @if($res->user_type==2) Admin @endif</td>
    <td>{{$res->rate}}</td>
   
   
    <td><a href="{{url('update_resource')}}/{{$res->id}}" class="btn btn-primary btn-xs"> Edit </a>
    <a href="{{url('delete_resource')}}/{{$res->id}}" class="btn btn-danger btn-xs" > Delete </a></td>
    
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

@endsection
        