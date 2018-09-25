<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">

            <div class="panel panel-default" style="background-color:;">
                <div class="panel-heading" style=""><center style="font-size: 22px;font-weight: bolder;">&#128522 TIME-SHEET &#128522</center>
                    </div>
                    <!-- <center>
                     <a href="<?php echo e(url('/user')); ?>"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;"></a>
                 </center> -->

                <div class="panel-body">
                    <center>
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
 <?php if(Session::has('error')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p> <br>
<?php endif; ?>
 <?php if(Session::has('success')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('success')); ?></p> <br>
<?php endif; ?>

  <div class="form-group" >
<form class="form-horizontal" action="<?php echo e(route('save_task')); ?>"  method="post" style="">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

   <?php if(isset($task_detail) && !empty($task_detail)): ?>

    <a class="btn btn-sm btn-success" href="<?php echo e(url('add_tracker')); ?>" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>

                     <div class="form-group">
                <label class="control-label col-sm-2"  name="test">DATE :</label>
                <div class="col-sm-2">
                <input type="date" value="<?php echo e($task_detail->date); ?>" name="date" class="" style="background-color:  #DCDCDC;" required>
                <input type="hidden" name="task_id" value="<?php echo e($task_detail->id); ?>">
                </div>
                
                
                
            <label class="control-label col-sm-2" >CLIENT :</label>
            <div class="col-sm-2" >
                   <select  style="background-color:  #DCDCDC;" name="client" id="client" onchange="getProjectbyClient()" required>
                      <option  value="">Select </option>
                    <?php if(!empty($client)): ?>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cli->id); ?>" <?php if($task_detail->client==$cli->id): ?> selected <?php endif; ?> ><?php echo e($cli->client_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              

                
            <label class="control-label col-sm-2" >CASE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="project" id="project" onchange="getDeliverablebyProject()" required>
                      <option  value="">Select </option>
                    <?php if(!empty($casemaster)): ?>
                    <?php $__currentLoopData = $casemaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pro->id); ?>" <?php if($task_detail->project== $pro->id): ?>selected <?php endif; ?>><?php echo e($pro->case_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
                <div class="form-group">
            <label class="control-label col-sm-2" >DELIVERABLE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="deliverable" id="deliverable"  required>
                      <option  value="">Select </option>
                    <?php if(!empty($deliverable)): ?>
                    <?php $__currentLoopData = $deliverable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($del->id); ?>" <?php if($task_detail->deliverable== $del->id): ?>selected <?php endif; ?>><?php echo e($del->deliverable_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
             
                
                   
                <label class="control-label col-sm-2" >TASK DESCRIPTION:</label>
                <div class="col-sm-2">
                <input  style="background-color:  #DCDCDC;" type="text" name="task" value="<?php echo e($task_detail->task); ?>" required>
                </div>
            
                <label class="control-label col-sm-2" for="hours">HOURS :</label>
                    <div class="col-sm-2">
                <select  style="background-color:  #DCDCDC;" name="hours" type="time" step='1' min="00:00:00" max="20:00:00" required>
                      <option  value="">Select </option>
                <option value="0.00">0.00</option>
                <?php for($i=0.25;$i<=16;$i=$i+0.25): ?>
                <option value="<?php echo e(number_format($i,2)); ?>" <?php if($task_detail->hours==number_format($i,2)): ?> selected <?php endif; ?> ><?php echo e(number_format($i,2)); ?></option>
                <?php endfor; ?>
                   </select>              
                </div>
            <!--     <div class="col-sm-3">
                <select name="hours" type="decimal" required>
                      <option  value="">Select </option>
                <option value="0.25">0.25</option>
                <?php for($i=0.25;$i<=16;$i=$i+0.25): ?>
                <option value="<?php echo e(number_format($i,2)); ?>"><?php echo e(number_format($i,2)); ?></option>
                <?php endfor; ?>
                   </select>              
                </div> -->
                </div>                
                    
                 <input type="submit" class="btn btn-sm btn-success" name="submit" value="UPDATE TO TIMESHEET" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">
                
                 <br><br>
    <?php else: ?>

                     <div class="form-group">
                <label class="control-label col-sm-2" for="email">DATE :</label>
                <div class="col-sm-2">
                <input type="date" name="date" class="" style="background-color:  #DCDCDC;" required>
                </div>
                
                
                
            <label class="control-label col-sm-2" >CLIENT :</label>
            <div class="col-sm-2" >
                   <select  style="background-color:  #DCDCDC;" name="client" id="client" onchange="getProjectbyClient()" required>
                      <option  value="">Select </option>
                    <?php if(!empty($client)): ?>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cli->id); ?>"><?php echo e($cli->client_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              

                
            <label class="control-label col-sm-2" >CASE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="project" id="project" onchange="getDeliverablebyProject()" required>
                      <option  value="">Select </option>
                    <?php if(!empty($casemaster)): ?>
                    <?php $__currentLoopData = $casemaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->case_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
                <div class="form-group">
            <label class="control-label col-sm-2" >DELIVERABLE :</label>
            <div class="col-sm-2">
                   <select  style="background-color:  #DCDCDC;" name="deliverable" id="deliverable" required>
                      <option  value="">Select </option>
                    <?php if(!empty($deliverable)): ?>
                    <?php $__currentLoopData = $deliverable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($del->id); ?>"><?php echo e($del->deliverable_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
                <?php for($i=0.25;$i<=16;$i=$i+0.25): ?>
                <option value="<?php echo e(number_format($i,2)); ?>"><?php echo e(number_format($i,2)); ?></option>
                <?php endfor; ?>
                   </select>              
                </div>
            <!--     <div class="col-sm-3">
                <select name="hours" type="decimal" required>
                      <option  value="">Select </option>
                <option value="0.25">0.25</option>
                <?php for($i=0.25;$i<=16;$i=$i+0.25): ?>
                <option value="<?php echo e(number_format($i,2)); ?>"><?php echo e(number_format($i,2)); ?></option>
                <?php endfor; ?>
                   </select>              
                </div> -->
                </div>                
                    
                 <input type="submit" class="btn btn-sm btn-success" name="submit" value="ADD TO TIMESHEET" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; "><br><br>
    <?php endif; ?>
                
                

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
<?php if(!empty($task)): ?>
<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr style="color: black;">
    <td style="text-align: center;"><?php echo e($tra->date); ?></td>
   <!--  <td><?php echo e($tra->name); ?></td> -->
    <td style="text-align: center;"><?php echo e($tra->client_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->case_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->deliverable_name); ?></td>
    <td style="text-align: center;"><?php echo e($tra->task); ?></td>
    <td style="text-align: center;"><?php echo e($tra->hours); ?></td>
      <td style="text-align: center;"><a href="<?php echo e(url('/update_task')); ?>/<?php echo e($tra->id); ?>" style="color: blue;text-decoration: none;"> Edit </a>&nbsp|&nbsp
      <a href="<?php echo e(url('delete_task')); ?>/<?php echo e($tra->id); ?>" style="color: red;text-decoration: none;" > Delete </a></td>
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 </tbody>
</table>
</div>
<center><?php echo e($task->links()); ?></center>
                 
            </form>
            
</div>
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