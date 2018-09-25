@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                 <center>
                     <a href="{{ url('/admin') }}"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;background-color: #212121;"></a>
                 </center>
                

                <div class="panel-body" align="center" style="font-size: 20px;"><strong style="font-size: 30px;font-size:2vw;">
                    </strong>
                    @if(Session::has('success'))
<p class="alert alert-danger">{{ Session::get('success') }}</p>
@endif
                  
                   <center>
                    <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;background-color: #212121;font-size: 16px;" href="{{ url('/add_project') }}">CASE REPORT</a><br>
                    
                   
                    <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;background-color: #212121;font-size: 16px;" href="{{ url('/expenses') }}">EXPENSE REPORT</a><br>
                    </center>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
