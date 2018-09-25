<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default" style="background-color: ">
                
                <div class="panel-heading "  align="center" style="font-weight: bolder;font-size: 22px;font-weight: bolder;">&#128591 ADMIN DASHBOARD &#128591</div>
<center><div><a href=""><img style="padding-top: 20px;" src="http://bodservers.com/assets/img/BOD_Logo.png" width="10%"></a></div></center>
<!--  <a ><img style="padding-top: 15px;" width="50%" src="../../laravel-project/bod-logo-white-2.png"></a> -->
                <div class="panel-body" align="center" style="font-size: 25px;"><!-- <strong>
                    &#128522 Welcome in Brands Of Desire &#128522</strong> -->
                    <?php if(Session::has('success')): ?>
<p class="alert alert-danger"><?php echo e(Session::get('success')); ?></p><br>
<?php endif; ?>
                  
                   <center><a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_resourceavailability')); ?>">CAPABILITY MANAGEMENT MASTER</a><br>
                   <!--  <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;font-weight: bolder;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_resource')); ?>">RESOURCE</a><br> -->
                   
                    <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_client')); ?>">CLIENT MASTER</a><br>
                     <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 10px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_casemaster')); ?>">CASE MASTER</a><br>
                    <!-- <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;font-weight: bolder;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_project')); ?>">CASE</a><br> -->
                     <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_deliverable')); ?>">DELIVERABLE MASTER</a><br>
                   <!--  <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;font-weight: bolder;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/add_deliverable')); ?>">DELIVERABLE</a><br> -->
                    <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/view_task')); ?>">TIME-SHEET</a><br>
                    <!-- <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;font-weight: bolder;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/expenses')); ?>">EXPENSES</a><br> -->
                 <!--    <a class="btn btn-success col-md-4 col-md-offset-4" style="margin-top: 15px;background-color: #212121;font-size: 16px;" href="<?php echo e(url('/reports')); ?>">REPORTS</a><br> -->
                </center>
                    <br><br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>