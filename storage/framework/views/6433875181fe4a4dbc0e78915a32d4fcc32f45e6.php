<?php $__env->startSection('content'); ?>
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
                     <a href="<?php echo e(url('/admin')); ?>"> <input type="submit" class="btn btn-primary btn-xs" name="submit" value="Back To Home" style="margin-bottom: -5px;margin-top: 10px;background-color: #212121;"></a>
                 </center>
                <div class="panel-body">
                    <center>
                        <?php if(Session::has('error')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p> <br>
<?php endif; ?>
 <?php if(Session::has('success')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('success')); ?></p> <br>
<?php endif; ?>
            <form class="form-horizontal" action="<?php echo e(route('create_casemaster')); ?>"  method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
               
<?php if(isset($casemaster_detail) && !empty($casemaster_detail)): ?>

 <a class="btn btn-sm btn-success" href="<?php echo e(url('add_casemaster')); ?>" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>
 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >Client Name:</label>
            <div class="col-sm-3">
                   <select name="client_name" value=".<?php echo $casemaster_detail->client_name ?>." required> 
                     <option value="">Select </option>
                 <?php if(!empty($client)): ?>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cli->id); ?>" <?php if($casemaster_detail->client_name==$cli->id) echo 'selected="selected"';?>><?php echo e($cli->client_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select> 
                <input type="hidden" name="casemaster_id" value="<?php echo e($casemaster_detail->id); ?>" >
                </div>
                             <label class="control-label col-sm-2" for="email">Case Name:</label>
                <div class="col-sm-3">
                <input type="text" name="case_name" value="<?php echo e($casemaster_detail->case_name); ?>" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">Case Owner:</label>
                <div class="col-sm-3">
                 <select class="form-control" name="case_owner"  value=".<?php echo $casemaster_detail->case_owner ?>." required onchange="saved_tasks()"> 
                 <option  value="">Select </option>
                    <?php if(!empty($resource)): ?>
                    <?php $__currentLoopData = $resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option   value="<?php echo e($use->id); ?>"  <?php if($casemaster_detail->case_owner==$use->id) echo 'selected="selected"';?>><?php echo e($use->resource_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                   
                </select>
                </div>
                
                 
                <label class="control-label col-sm-2" for="email">Start Date :</label>
                <div class="col-sm-3">
                <input type="date" name="start_date" value="<?php echo e($casemaster_detail->start_date); ?>" required>
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
                <input type="date" name="end_date" value="<?php echo e($casemaster_detail->end_date); ?>" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >Delivery Status:</label>
                <div class="col-sm-3">
                <input type="text" value="<?php echo e($casemaster_detail->delivery_status); ?>" name="delivery_status" required>
                </div>
                 <label class="control-label col-sm-2">Estimated Cost :</label>
                <div class="col-sm-3">
                <input type="text" value="<?php echo e($casemaster_detail->estimated_cost); ?>" name="estimated_cost" class="" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Case" style="margin-bottom: 10px;background-color: #212121;"><br>


 

                 <!-- <input type="submit" name="submit" value="VIEW"> -->
               
          
  <?php else: ?>
 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >Client Name:</label>
            <div class="col-sm-3">
                   <select name="client_name" required> 
                     <option value="">Select </option>
                 <?php if(!empty($client)): ?>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cli->id); ?>"><?php echo e($cli->client_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
                    <?php if(!empty($resource)): ?>
                    <?php $__currentLoopData = $resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option   value="<?php echo e($use->id); ?>"><?php echo e($use->resource_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                   
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
               
          
     <?php endif; ?>
                
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
<?php if(!empty($project)): ?>
<?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>

 <td style="text-align: center;"><?php echo e(++$i); ?></td>
   <td style="text-align: center;"><?php echo e($pro->client_name); ?></td>
     <td style="text-align: center;"><?php echo e($pro->case_name); ?></td>
   <td style="text-align: center;"><?php echo e($pro->resource_name); ?></td>
    <td style="text-align: center;"><?php echo e($pro->start_date); ?></td>
   <td style="text-align: center;"><?php if($pro->case_status==1): ?> New <?php endif; ?> <?php if($pro->case_status==2): ?> Current <?php endif; ?> <?php if($pro->case_status==3): ?> Delivered <?php endif; ?> <?php if($pro->case_status==4): ?> Archieved <?php endif; ?> </td>
   <td style="text-align: center;"><?php echo e($pro->end_date); ?></td>
   <td style="text-align: center;"><?php echo e($pro->delivery_status); ?></td>
     <td style="text-align: center;"><?php echo e($pro->estimated_cost); ?></td>
  <td style="text-align: center;"><a href="<?php echo e(url('update_casemaster')); ?>/<?php echo e($pro->id); ?>" class="btn btn-primary btn-xs"> Edit </a>
    <a href="<?php echo e(url('delete_casemaster')); ?>/<?php echo e($pro->id); ?>" class="btn btn-danger btn-xs" > Delete </a></td>
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 </tbody>
</table>
<center>
<?php echo e($project->links()); ?></center>
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