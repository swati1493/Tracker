<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;font-size:2vw;"> <h1>Timesheet </h1></center></div>
                
                <div class="panel-body">
                    <!-- <center> -->
                                          
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

<div class="table-responsive">
         <table class="table table-striped table-borderd">
            <thead>
  <tr>
    <th>DATE </th>
   <!--  <th>TASK OWNER </th> -->
    <th>NAME</th>
    <th>CLIENT</th>
    <th>PROJECT</th>
    <th>DELIVERABLE</th>
    <th>TASK</th>
    <th>HOURS</th>
   
  </tr>
</thead>
<tbody>
@if(!empty($task))
@foreach($task as $tra)
  <tr>
    <td>{{$tra->date}}</td>
     <td>{{$tra->createdby_name}}</td>
    <td>{{$tra->client_name}}</td>
    <td>{{$tra->project_name}}</td>
    <td>{{$tra->deliverable_name}}</td>
    <td>{{$tra->task}}</td>
    <td>{{$tra->hours}}</td>
  </tr>
 @endforeach
 @endif
 </tbody>
</table>
</div>
<center>
</center>
                </div>
            </div>
        </div>
    </div>
</div>

