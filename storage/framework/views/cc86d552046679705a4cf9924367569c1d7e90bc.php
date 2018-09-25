<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 TIME-SHEET &#128522</center></div>
                <center>
                    <a href="<?php echo e(url('/excel')); ?>"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Download EXCEL" style="margin-bottom: -10px;margin-top: 10px;background-color: #212121;"></a>
                     <a href="<?php echo e(url('/admin')); ?>"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -10px;margin-top: 10px;background-color: #212121;"></a>
                     <a href="<?php echo e(url('/pdf')); ?>"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Download PDF" style="margin-bottom: -10px;margin-top: 10px;background-color: #212121;"></a>
                 </center>
                <div class="panel-body">
                    <!-- <center> -->
                                          <?php if(Session::has('error')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p> <br>
<?php endif; ?>
           
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
 <?php if(Session::has('error')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p> <br>
<?php endif; ?>
 <?php if(Session::has('success')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('success')); ?></p> <br>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
  <script>
      $( "#name" ).change(saved_tasks() 
  {
    //
    });
  });
    </script>

<div class="row" style="color: black;font-weight: bold;">

    <strong><center>FILTERS</center></strong>
 
      <div class="form-group">
    <form class="form-horizontal" action="search_task"  method="get" >
   
    
      <label  role="form" name="date" action="" for="pwd" class="control-label col-sm-1">From:</label>
       <div class="col-sm-3">
      <input type="date" name="start_date" id="start_date" class="form-control">
    </div>
    
      <label for="pwd" role="form" name="date" action="" class="control-label col-sm-1">To:</label>
      <div class="col-sm-3">
      <input type="date" name="end_date" id="end_date" class="form-control">
    </div>
    
       <label  for="Name" class="control-label col-sm-1">Resource:</label>
       <div class="col-sm-3">
      <select class="form-control"   role="form" name="name" onchange="saved_tasks()"> 
                 <option  value="">Select </option>
                    <?php if(!empty($user)): ?>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option   value="<?php echo e($use->id); ?>" <?php if(isset($_GET['name'])&&$_GET['name']==$use->id): ?>selected <?php endif; ?>><?php echo e($use->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                   
                </select>
              </div>
    <br><br>
      
      <label for="pwd" class="control-label col-sm-1">Client:</label>
      <div class="col-sm-3">
      <select class="form-control" name="client" id="client" onchange="getProjectbyClient()"> 
        <option  value="">Select </option>
                  <?php if(!empty($client)): ?>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($use->id); ?>" <?php if(isset($_GET['client']) && $_GET['client']==$use->id): ?>selected <?php endif; ?>><?php echo e($use->client_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select> 
    </div>
    
      <label for="pwd" class="control-label col-sm-1">Project:</label>
      <div class="col-sm-3">
       <select class="form-control"  role="form" name="project" id="project" onchange="getDeliverablebyProject()"> 
                <option  value="">Select </option>                    
                 <?php if(!empty($casemaster)): ?>
                    <?php $__currentLoopData = $casemaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pro->id); ?>"<?php if(isset($_GET['casemaster']) &&  $_GET['casemaster']==$pro->id): ?>selected <?php endif; ?>><?php echo e($pro->case_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>  
    </div>
     
      <label for="pwd" class="control-label col-sm-1">Deliverable:</label>
      <div class="col-sm-3">
       <select class="form-control" name="deliverable" id="deliverable">
                <option  value="">Select</option>

                    <?php if(!empty($deliverable)): ?>
                    <?php $__currentLoopData = $deliverable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($del->id); ?>" <?php if(isset($_GET['deliverable']) && $_GET['deliverable']==$del->id): ?>selected <?php endif; ?>><?php echo e($del->deliverable_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
    </div></div><br><br>
    <div class="form-group">
      <center><button type="submit" class="btn btn-success btn-sm" style="background-color: #212121;">Search</button></center>
    </div>
   
  </form>
</div>
<div class="table-responsive">
         <table class="table table-striped table-borderd" style="color: black;">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DATE </th>
   <!--  <th>TASK OWNER </th> -->
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">RESOURCE</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">CLIENT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">PROJECT</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DELIVERABLE</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">TASK</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">HOURS</th>
   
  </tr>
</thead>
<tbody>
<?php if(!empty($task)): ?>
<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td style="text-align: center;"><?php echo e($tra->date); ?></td>
     <td style="text-align: center;"><?php echo e($tra->createdby_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->client_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->case_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->deliverable_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->task); ?></td>
   
    <td style="text-align: center;"><?php echo e($tra->hours); ?></td>
   
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 </tbody>
</table>
</div>
<center>
<?php echo e($task->links()); ?>

</center>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   
    $(document).ready(function(){
        
    });
    function getProjectbyClient()
    {
        var clientid = $('#client').val();
        if(clientid!='')
        {
            $.get('<?php echo e(url("get_project_by_client")); ?>/'+clientid,function(data){
                 $('#project').html(data);
            });
        }
    }
     function getDeliverablebyProject()
    {
        var projectid = $('#project').val();
        if(projectid!='')
        {
            $.get('<?php echo e(url("get_deliverable_by_project")); ?>/'+projectid,function(data){
                 $('#deliverable').html(data);
            });
        }
    }
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>