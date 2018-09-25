<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use PDF;
use Excel;
use DB;
use Auth;
use Session;
use Redirect;
use App\ProjectModel;
use App\ResourceModel;
use App\ExpenseModel;
use App\ClientModel;
use App\DeliverableModel;
use App\TaskModel;
use App\ReportModel;
use App\ViewtaskModel;
use App\UserviewtaskModel;
use App\User;
use App\CasemasterModel;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;




class adminController extends Controller
{
    
    public function pdf()
    {
        
        $task = DB::table('task_models as tm')->leftjoin('project_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id')->orderBy('date','DESC')->select('tm.*','pm.project_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name')->get();
           view()->share(['task'=>$task]);
             $pdf = PDF::loadView('task_pdf');
            return $pdf->download('task_pdf.pdf');
//             \Excel::create('task_pdf', function($excel) {
//     // Excel code
// })->download('xls');

// or
// ->download('xls');
        // $pdf = \PDF::loadview('view_task');
        // return $pdf->download('view_task.pdf');
    }

     public function excel()
    {
        
        $task = DB::table('task_models as tm')->leftjoin('project_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id')->orderBy('date','DESC')->select('tm.*','pm.project_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name')->get();
           view()->share(['task'=>$task]);
 
       \Excel::create('task_pdf', function($excel) {
        $excel = Excel::loadView('task_pdf');
            return $excel->export('xls');
        });
}
     public function __construct()
     {
        $this->middleware('auth');
    }
    public function addProject()
    {
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $project = DB::table('project_models as pm')->leftjoin('client_models as cm','pm.client_id','=','cm.id')->orderBy('client_name','ASC')->select('pm.*','cm.client_name')->paginate(15);

        // $project = DB::table('task_models as tm')->leftjoin('project_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id')->orderBy('date','DESC')->select('tm.*','pm.project_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name','pm.project_type','pm.estimate','tm.hours as hours','uss.rate as rate')->paginate(15);

        

    	return view('add_project',compact(['client','project']));
    }
     public function addCasemaster()
    {
    
        $resource = ResourceModel::orderBy('resource_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();

        $project = DB::table('casemaster_models as cam')->leftjoin('client_models as cm','cam.client_name','=','cm.id')->leftjoin('resource_models as rm','cam.case_owner','=','rm.id')->orderBy('cam.client_name','DESC')->select('cam.*','rm.resource_name','cm.client_name')->paginate(15);
        
        return view('add_casemaster',compact(['client','project','resource','id']));
    }
     public function CreateCasemaster(Request $req)
    {
            if(isset($req->casemaster_id) && is_numeric($req->casemaster_id))
{
            $data =  CasemasterModel::find($req->casemaster_id);
            $msg='Case Updated';
            }else{

              $data = new CasemasterModel();
                $msg='Case Added';
            }
                 $data->client_name   =$req['client_name'];
                 $data->case_name   =$req['case_name'];
            $data->case_owner =$req['case_owner'];
                $data->start_date =$req['start_date'];
                  $data->case_status =$req['case_status'];
                  $data->end_date =$req['end_date'];
                   $data->delivery_status =$req['delivery_status'];
                   $data->estimated_cost =$req['estimated_cost'];
              
            if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

    }
    public function CreateProject(Request $req)
    {
          
            if(isset($req->project_id) && is_numeric($req->project_id))
            {

            $data =  ProjectModel::find($req->project_id);
            $msg='Project Updated';
            }else{
                $data = new ProjectModel();
                 $data->client_name    =$req['client_name'];
                 $data->project_name = $req['project_name'];
            $data->project_type =$req['project_type'];
           
             $data->estimate = $req['estimated_cost'];
                $msg='Project Added';
            }
                $data->project_name  = $req['project_name'];
            if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

    }

     public function  UpdateProject($project_id)
    {
   
  
  $client = ClientModel::orderBy('client_name','ASC')->get();
         $project_detail =   ProjectModel::find($project_id); 
                 $client = ClientModel::orderBy('client_name','ASC')->paginate(15);
        $project = ProjectModel::orderBy('project_name','ASC')->paginate(15);
        return view('add_project',compact(['client','project','project_detail']));

    }
    public function  DeleteProject($pid)
    {
        ProjectModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Project Deleted');
    }
    public function addResource()
    {
          $resource = User::orderBy('name','ASC')->paginate(15);
        return view('add_resource',compact(['resource','project']));
    }
    public function addResourceavailability(Request $req)
    {
          $resource = ResourceModel::orderBy('resource_name','ASC')->paginate(15);
          $domain = ResourceModel::orderBy('domain','ASC')->distinct('domain')->select('domain')->get();
          
        return view('add_resourceavailability',compact(['resource','domain']));
    }
   public function CreateResourceavailability(Request $req)
    {      
           $resource = ResourceModel::orderBy('resource_name','ASC');
         $domain = ResourceModel::orderBy('domain','ASC')->distinct('domain')->select('domain')->get();
        $query = DB::table('resource_models as rm');
        
        if($req->resource!='')
        {
            $query->where('rm.domain','=',$req->resource);
        }
       
       
       $resource = $query->paginate(15);

        return view('add_resourceavailability',compact(['resource','domain']));

    }
    public function CreateResource(Request $req)
 {  
           if(isset($req->resource_id) && is_numeric($req->resource_id))
            {
            $data =  ResourceModel::find($req->resource_id);
            $msg='Resource Updated';
            }
            else{
             $data = new ResourceModel();
              $msg='Resource Added';
          }
              $data->emp_no = $req['emp_no'];
                 $data->resource_name = $req['resource_name'];
            $data->designation =$req['designation'];
             $data->resource_category =$req['resource_category'];
             $data->hour_available =$req['hour_available'];
             $data->work_location = $req['work_location'];
             $data->contact_no = $req['contact_no'];
             $data->email_id = $req['email_id'];
              $data->domain = $req['domain'];
               $data->rate = $req['rate'];  
             if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }
            else{
                return redirect()->back()->with('error','Something went wrong');
            }

    }
       public function  UpdateResource($resource_id)
    {
         $resource_detail =   ResourceModel::find($resource_id); 
        $resource = ResourceModel::orderBy('resource_name','ASC')->paginate(15);
        return view('add_resourceavailability',compact(['resource','project','resource_detail']));

    }
      public function  UpdateCasemaster($casemaster_id)
    {
       $casemaster_detail =   CasemasterModel::find($casemaster_id);
       $resource = ResourceModel::orderBy('resource_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $project = DB::table('casemaster_models as cam')->leftjoin('client_models as cm','cam.client_name','=','cm.id')->leftjoin('resource_models as rm','cam.case_owner','=','rm.id')->orderBy('cam.id','DESC')->select('cam.*','rm.resource_name','cm.client_name')->paginate(15);
        
        return view('add_casemaster',compact(['client','project','resource','id','casemaster_detail']));

    }
     public function  DeleteResource($pid)
    {
       ResourceModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Resource Deleted');
    }
     public function  DeleteCasemaster($pid)
    {
       CasemasterModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Case Deleted');
    }

    public function addClient()
    {
          $client = ClientModel::orderBy('client_name','ASC')->get();
    	return view('add_client',compact(['client','project']));
    }

// public function addDel()
//     {
//           $deliverable = DeliverableModel::orderBy('deliverable_name','ASC')->get();
//       return view('deliverable_add',compact(['deliverable','deliverable_name']));
//     }

      public function  UpdateClient($client_id)
    {
         $client_detail =   ClientModel::find($client_id); 
        $client = ClientModel::orderBy('client_name','ASC')->paginate(15);
        return view('add_client',compact(['client','project','client_detail']));

    }
    // public function  UpdateDeliverable($deliverable_id)
    // {
    //      $deliverable_detail =  DeliverableModel::find($deliverable_id); 
    //     $deliverable = DeliverableModel::orderBy('deliverable_name','ASC')->paginate(15);
    //     return view('add_deliverable',compact(['deliverable','deliverable_detail']));

    // }
    public function CreateClient(Request $req)
    {         if(isset($req->client_id) && is_numeric($req->client_id))
            {
            $data =  ClientModel::find($req->client_id);
            $msg='Client Updated';
            }else{
                $data = new ClientModel();
                $msg='Client Added';
            }
                $data->client_name	= $req['client_name'];
            if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }else{
            	return redirect()->back()->with('error','Something went wrong');
            }

    }
 public function CreateDel(Request $req)
    {         if(isset($req->deliverable_id) && is_numeric($req->deliverable_id))
            {
            $data =  DeliverableModel::find($req->deliverable_id);
            $msg='Deliverable Updated';
            }else{
                $data = new DeliverableModel();
                $msg='Deliverable Added';
            }

                $data->deliverable_name  = $req['deliverable_name'];
            if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }else{
return redirect()->back()->with('error','Something went wrong');
                            }

    }
   
   
    public function  DeleteClient($pid)
    {
       ClientModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Client Deleted');
    }


    public function addDeliverable()
    {
       $casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
          $deliverable_drop = DeliverableModel::orderBy('deliverable_name','ASC')->get();
        $deliverable = DB::table('deliverable_models as dm')->leftjoin('client_models as cm','dm.client_id','=','cm.id')->leftjoin('casemaster_models as pm','dm.project_id','=','pm.id')->orderBy('cm.client_name','ASC')->select('dm.*','cm.client_name','pm.case_name')->paginate(15);
  
         return view('add_deliverable',compact('client','deliverable','casemaster','deliverable_drop'));
    }
    public function CreateDeliverable(Request $req)
    {
      if(isset($req->deliverable_id) && !empty($req->deliverable_id))
      {
         $data =  DeliverableModel::find($req->deliverable_id);
            $data->client_id = $req['client'];
            $data->deliverable_name  = $req->deliverable_name;
            $data->project_id = $req['project'];
            $data->save();
            return redirect()->route('add_deliverable')->with('success','Deliverable Updated.');
      }else{
         $i=0;
          foreach ($req['deliverable_name'] as $deliverable) {
            $data = new DeliverableModel();
            $data->client_id = $req['client'];
            $data->deliverable_name  = $deliverable;
            $data->project_id = $req['project'];
            $data->save();
             $i++;
         }
              if(count($req['deliverable_name'])==$i)
            {
                return redirect()->back()->with('success','Deliverable Added');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }
          }
    }
    public function  UpdateDeliverable($deliverable_id)
    {
         $deliverable_detail =   DeliverableModel::find($deliverable_id); 
           $casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
     
         $deliverable = DB::table('deliverable_models as dm')->leftjoin('client_models as cm','dm.client_id','=','cm.id')->leftjoin('casemaster_models as pm','dm.project_id','=','pm.id')->orderBy('cm.client_name','ASC')->select('dm.*','cm.client_name','pm.case_name')->paginate(15);
        return view('add_deliverable',compact(['client','project','deliverable_detail','deliverable','casemaster']));

    }
     public function  DeleteDeliverable($pid)
    {
        DeliverableModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Deliverable Deleted');
    }
    public function addTask()
    {
        $client = ClientModel::paginate(15);
        $project = DB::table('project_models as pm')->leftjoin('client_models as cm','pm.client_id','=','cm.id')->select('pm.*','cm.client_name')->paginate(15);
        return view('add_project',compact(['client','project']));
    }



     public function viewTask()
    {$casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $deliverable = DeliverableModel::orderBy('deliverable_name','ASC')->get();
        $user = User::orderBy('name','ASC')->get();
        
        
        $task = DB::table('task_models as tm')->leftjoin('casemaster_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id')->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name')->paginate(15);

        return view('view_task',compact(['task','project','client','deliverable','user']));
    }
     public function expense(Request $req)

    {$project = ProjectModel::orderBy('project_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
         $deliverable = DeliverableModel::orderBy('deliverable_name','ASC')->get();
        $user = User::orderBy('name','ASC')->get();
         $query = DB::table('task_models as tm')->leftjoin('project_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id');
          if($req->start_date!='')
        {
            $query->whereBetween('tm.date', [$req->start_date, $req->end_date]);  
                  }
         if($req->name!='')
        {
            // echo $req->name;exit;
            $query->where('tm.created_by','=',$req->name);
        }
        if($req->client!='')
        {
            $query->where('tm.client','=',$req->client);
        }  
        if($req->project!='')
        {
             $query->where('tm.project','=',$req->project);
        }
         if($req->deliverable!='')
        {
             $query->where('tm.deliverable','=',$req->deliverable);
        }
         $task = $query->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name','tm.hours as hours','uss.rate as rate')-> paginate(15);
        
        return view('expenses',compact(['task','project','client','deliverable','user']));
    }
    public function report()
    {
return view('reports');
    }
    
    public function SearchTask(Request $req)
    {
        
        $casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $deliverable = DeliverableModel::orderBy('deliverable_name','ASC')->get();
        $user = User::orderBy('name','ASC')->get();
        
        
        $query = DB::table('task_models as tm')->leftjoin('casemaster_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->leftjoin('users as uss','tm.created_by','=','uss.id');
       if($req->start_date!='')
        {
            $query->whereBetween('tm.date', [$req->start_date, $req->end_date]);  
                  }
        if($req->name!='')
        {
            // echo $req->name;exit;
            $query->where('tm.created_by','=',$req->name);
        }
        if($req->client!='')
        {
            $query->where('tm.client','=',$req->client);
        }
        if($req->project!='')
        {
             $query->where('tm.project','=',$req->project);
        }
        if($req->deliverable!='')
        {
             $query->where('tm.deliverable','=',$req->deliverable);
        }
        $task = $query->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name','uss.name as createdby_name')->paginate(15);
        // echo "<pre>";print_r($task);

        return view('view_task',compact(['task','project','client','deliverable','user','casemaster']));
    }
    public function SearchProject(Request $req)
    {
        
        // $project = ProjectModel::orderBy('project_name','ASC')->where('status',1)->get();
     
       
       $client = ClientModel::orderBy('client_name','ASC')->get();
        $query = DB::table('project_models as pm')->leftjoin('client_models as cm','pm.client_id','=','cm.id')->orderBy('client_name','ASC')->select('pm.*','cm.client_name');
        
        
      
      
        if($req->client!='')
        {
            $query->where('cm.id','=',$req->client);
        }
        if($req->project!='')
        {
             $query->where('pm.id','=',$req->project);
        }
       
       $project = $query->paginate(15);

        return view('add_project',compact(['project','client']));
    }

 public function SearchDeliverable(Request $req)
    { 
      
       $casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
       $deliverable_drop = DeliverableModel::orderBy('deliverable_name','ASC')->get();
        $query = DB::table('deliverable_models as dm')->leftjoin('client_models as cm','dm.client_id','=','cm.id')->leftjoin('casemaster_models as pm','dm.project_id','=','pm.id');

        if($req->client!='')
        {

            $query->where('dm.client_id','=',$req->client);
        }
        if($req->project!='')
        {
             $query->where('dm.project_id','=',$req->project);
        }
        if($req->deliverable!='')
        {
             $query->where('dm.id','=',$req->deliverable);
        }
        $deliverable = $query->orderBy('cm.client_name','ASC')->select('dm.*','cm.client_name','pm.case_name')->get();
        // echo "<pre>";print_r($task);die;

        return view('add_deliverable',compact(['casemaster','client','deliverable','deliverable_drop']));
    }

 public function SearchClient(Request $req)
    {
        $query = DB::table('client_models as cm');
        if($req->client!='')
        {
            $query->where('cm.id','=',$req->client);
        }
       
       
       $client = $query->paginate(15);

        return view('add_client',compact(['client']));
    }

    public function saved_tasks(Request $req)
    {
        
       
        $task = DB::table('task_models as tm')->leftjoin('project_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->where('created_by',Auth::id())->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name')->Paginate(15);
        //$task = TaskModel::get();
        return view('userview_task',compact(['project','client','user','deliverable','task']));
    }
    public function getProjectByClient($client)
      { 
        $project =\App\CasemasterModel::where('client_name',$client)->get();
        // echo"<pre>";print_r( $project->toArray());die;
        $html='<option  value="">Select Project</option>';
        if(!empty($project))
        {
            foreach ($project as  $value) {
                $html.='<option value="'.$value->id.'">'.$value->case_name.'</option>';
            }
        }
        return $html;
    }
    
     public function getDeliverablebyProject($project)
    {
        $deliverable = DeliverableModel::where('project_id',$project)->where('status',1)->get();
        $html='<option  value="">Select Deliverable</option>';
        if(!empty($deliverable))
        {
            foreach ($deliverable as  $value) {
                $html.='<option value="'.$value->id.'">'.$value->deliverable_name.'</option>';
            }
        }
        return $html;
    }
}




    

    