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


<?php $__env->startSection('content'); ?>
<div class="container-fluid" >
    <div class="row" style="color: black;">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-default pull-top" >
                <div class="panel-heading" style=""><center style="font-size: 20px;font-weight: bolder;">&#128522 CAPABILITY MANAGEMENT MASTER &#128522</center></div>
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
<form class="form-horizontal" action="<?php echo e(route('create_resource')); ?>"  method="post" style="border:1px solid #DA2632;padding-top: 5px;padding-bottom: 5px;background-color: #F5F5F5; ">
               
  <?php if(isset($resource_detail) && !empty($resource_detail)): ?>


    <a class="btn btn-sm btn-success" href="<?php echo e(url('add_resourceavailability')); ?>" style="margin-bottom: 0px;font-weight: bolder;background-color:#212121; ">BACK</a><br><br>

 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 
                <div class="form-group">
            <label class="control-label col-sm-2" >RESOURCE ID:</label>
             <div class="col-sm-3">
                <input type="text" name="emp_no" value="<?php echo e($resource_detail->emp_no); ?>" required>
                <input type="hidden" name="resource_id" value="<?php echo e($resource_detail->id); ?>" >
                </div>
                
                             <label class="control-label col-sm-2" for="email">RESOURCE NAME:</label>
                <div class="col-sm-3">
                <input type="text" name="resource_name" value="<?php echo e($resource_detail->resource_name); ?>" required>
                </div>
                </div>
                <div class="form-group">
               
                
                <label class="control-label col-sm-2" for="email">DESIGNATION:</label>
                <div class="col-sm-3">
                <input type="text" name="designation" value="<?php echo e($resource_detail->designation); ?>" required>
                
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
              <input type="text" name="hour_available" value="<?php echo e($resource_detail->hour_available); ?>" required>
                </div>
              
                <label class="control-label col-sm-2" for="email">WORK LOCATION:</label>
                <div class="col-sm-3">
                <input type="text" name="work_location" value="<?php echo e($resource_detail->work_location); ?>" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" >CONTACT NO:</label>
                <div class="col-sm-3">
                <input type="text" name="contact_no" value="<?php echo e($resource_detail->contact_no); ?>" required>
                </div>
                 <label class="control-label col-sm-2">EMAIL-ID :</label>
                <div class="col-sm-3">
                <input type="text" name="email_id" value="<?php echo e($resource_detail->email_id); ?>" required>
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
                <input type="text" name="rate"  value="<?php echo e($resource_detail->rate); ?>" required>
                </div>
                </div>
                
                <input type="submit" class="btn btn-md btn-success" name="submit" value="Update Resource" style="margin-bottom: 10px;background-color: #212121;"><br>
           

   <?php else: ?>
 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 
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
           

   <?php endif; ?>
              
            </form><br>
            <form class="form-inline" action="<?php echo e(route('create_resourceavailability')); ?>" method="post">
               

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
               
            <div class="form-group">
                   <select class="form-control" name="resource" > 
                     <option value="">Search Domain </option>
                 <?php if(!empty($domain)): ?>
                    <?php $__currentLoopData = $domain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rec->domain); ?>"><?php echo e($rec->domain); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
<?php if(!empty($resource)): ?>
<?php $__currentLoopData = $resource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
     <td style="text-align: center;"><?php echo e(++$i); ?></td>
    <td style="text-align: center;"><?php echo e($rec->emp_no); ?></td>
    <td style="text-align: center;"><?php echo e($rec->resource_name); ?></td>
    <td style="text-align: center;"><?php echo e($rec->designation); ?></td>
     <td style="text-align: center;"> <?php if($rec->resource_category==1): ?> External-Full Time
      <?php endif; ?> <?php if($rec->resource_category==2): ?> Internal-Full Time 
        <?php endif; ?> <?php if($rec->resource_category==3): ?> Independent-Part Time 
          <?php endif; ?> <?php if($rec->resource_category==4): ?> Consulting Partner
    <?php endif; ?> </td>
    <td style="text-align: center;"><?php echo e($rec->hour_available); ?></td>
    <td style="text-align: center;"><?php echo e($rec->work_location); ?></td>
    <td style="text-align: center;"><?php echo e($rec->contact_no); ?></td>
    <td style="text-align: center;"><?php echo e($rec->email_id); ?></td>
    <td style="text-align: center;"> <?php if($rec->domain==1): ?> PR
      <?php endif; ?> <?php if($rec->domain==2): ?> Content
      <?php endif; ?> <?php if($rec->domain==3): ?> UI/UX
      <?php endif; ?> <?php if($rec->domain==4): ?> Design
      <?php endif; ?> <?php if($rec->domain==5): ?> Consulting 
      <?php endif; ?> <?php if($rec->domain==6): ?> HR 
      <?php endif; ?> <?php if($rec->domain==7): ?> Digital 
    <?php endif; ?> </td>
       <td style="text-align: center;"><?php echo e($rec->rate); ?></td>

   <td style="text-align: center;"><a href="<?php echo e(url('update_resource')); ?>/<?php echo e($rec->id); ?>" class="btn btn-primary btn-xs"> Edit </a>
    <a href="<?php echo e(url('delete_resource')); ?>/<?php echo e($rec->id); ?>" class="btn btn-danger btn-xs" > Delete </a></td>
   
<!--     <td><a href="<?php echo e(url('update_resourceavailability')); ?>/<?php echo e($rec->id); ?>" class="btn btn-primary btn-xs"> Edit </a>
    <a href="<?php echo e(url('delete_resourceavailability')); ?>/<?php echo e($rec->id); ?>" class="btn btn-danger btn-xs" > Delete </a></td> -->
    
  </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
 </tbody>
</table></div>

                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
        
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>