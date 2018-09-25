<?php $__env->startSection('content'); ?>
<div class="container-fluid" >
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><center style="font-size: 20px;font-weight: bolder;">&#128522 DELIVERABLE MASTER &#128522</center></div>
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

            <form class="form-inline" action="<?php echo e(route('create_deliverable')); ?>" method="post">
               

                <?php if(isset($deliverable_detail) && !empty($deliverable_detail)): ?>

                 <a class="btn btn-sm btn-success" href="<?php echo e(url('deliverable_add')); ?>" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                
                <div class="form-group">
                <input type="text" name="deliverable_name" placeholder="Update Your Deliverable" class="container" value="<?php echo e($deliverable_detail->deliverable_name); ?>" required>
                <input type="hidden" name="deliverable_id" value="<?php echo e($deliverable_detail->id); ?>">
                </div>
              
                     
              <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Deliverable" style="background-color: #212121;">  
               <?php else: ?>
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                
                <div class="form-group">
                <input type="text" name="deliverable_name" placeholder="Add Your New Deliverable" class="container" required>
                </div>
              
                     
              <input type="submit" class="btn btn-md btn-success" name="submit" value="Add" style="background-color: #212121;">
                
                <?php endif; ?>
            </form><br>

        </center>
        <div class="row">
   
  <center><form class="form-inline" action="search_deliverable"  method="get" >
      <div class="form-group">
      
      <select class="form-control" name="deliverable" id="deliverable" onchange="getProjectbyDeliverable()"> 
        <option  value=""> Search Deliverable</option>
                  <?php if(!empty($deliverable)): ?>
                    <?php $__currentLoopData = $deliverable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($use->id); ?>" <?php if(isset($_GET['deliverable']) && $_GET['deliverable']==$use->id): ?>selected <?php endif; ?>><?php echo e($use->deliverable_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select> 
    </div>
   
    <div class="form-group">
      <center><button type="submit" class="btn btn-success btn-md" style="background-color: #212121;">Search</button></center>
    </div>&nbsp
   
  </form></center>
</div><br>
        <table class="table table-striped table-borderd">
            <thead>
  <tr style="color: #ffffff;font-weight: bolder; font-size: 13px;">
 <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">S.NO</th>
    <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">DELIVERABLE NAME</th>
  <th style="background-color: #DA2632;border-right: 5px solid white; text-align: center;">ACTION</th>
  </tr>
  </thead>
  <tbody>
    <?php $i=0; ?>
<?php if(!empty($deliverable)): ?>
<?php $__currentLoopData = $deliverable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
     <td style="text-align: center;"><?php echo e(++$i); ?></td>
    <td style="text-align: center;"><?php echo e($del->deliverable_name); ?></td>
    <td style="text-align: center;"><a href="<?php echo e(url('update_deliverable')); ?>/<?php echo e($del->id); ?>" class="btn btn-primary btn-xs"> Edit </a>
    <a href="<?php echo e(url('delete_deliverable')); ?>/<?php echo e($del->id); ?>" class="btn btn-danger btn-xs" > Delete </a></td>
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 </tbody>
</table>
<!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>