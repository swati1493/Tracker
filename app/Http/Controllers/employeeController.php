<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ProjectModel;
use App\ClientModel;
use App\DeliverableModel;
use App\UsermenuModel;
use App\CasemasterModel;
use App\TaskModel;
use App\ViewtaskModel;
use App\UserviewtaskModel;
use App\ResourceModel;
use App\ResourceallocationModel;
use App\User;
use DB;
use Auth;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class employeeController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function addTracker()
    {

    	$casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $deliverable = DeliverableModel::where('status',1)->orderBy('deliverable_name','ASC')->get();
        $user = User::get();
                $task = DB::table('task_models as tm')->leftjoin('casemaster_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->where('created_by',Auth::id())->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name')->Paginate(15);
    	//$task = TaskModel::get();
    	return view('tracker',compact(['project','client','user','deliverable','task','casemaster']));
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
        $deliverable = DeliverableModel::where('project_id',$project)->get();
        // echo"<pre>";print_r( $deliverable->toArray());die;
        $html='<option  value="">Select Deliverable</option>';
        if(!empty($deliverable))
        {
            foreach ($deliverable as  $value) {
                $html.='<option value="'.$value->id.'">'.$value->deliverable_name.'</option>';
            }
        }
        return $html;
    }
     public function resourceAllocation()
    {
            $resource = ResourceModel::orderBy('resource_name','ASC')->get();
       $user = User::get();
  
               $task = DB::table('resourceallocation_models as ram')->leftjoin('resource_models as rm','ram.resource','=','rm.resource_name')->leftjoin('users as uss','ram.booked_by','=','uss.id')->orderBy('ram.id','DESC')->select('ram.booked_by as uss.id')->select('ram.*','rm.resource_name')->Paginate(15);
        //$task = TaskModel::get();
              
        return view('resource_allocation',compact(['task','resource','users']));
    }
     public function SaveResourceallocation(Request $req)
    {
       
             $data =new ResourceallocationModel();
            
           
             $data->resource = $req['resource'];
              $data->date = $req['date'];
             $data->hours = $req['hours'];
              $data->booked_by =Auth::user()->name;
           
           
             if($data->save())
             {
               return redirect()->back()->with('success',' Updated');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }
    }
    public function SaveTask(Request $req)
    {

         if(isset($req->task_id) && is_numeric($req->task_id))
            {
            $data =  TaskModel::find($req->task_id);
            $msg='Timesheet Updated';
            }else{

                $data = new TaskModel();
                $msg='Timesheet Added';
            }
            
             $data->date = $req['date'];
             $data->task_owner = $req['taskowner'];
             $data->client  = $req['client'];
             $data->project = $req['project'];
             $data->deliverable = $req['deliverable'];
             $data->task = $req['task'];
             $data->hours = $req['hours'];
             $data->created_by =Auth::id();
             if($data->save())
            {
                return redirect()->back()->with('success',$msg);
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }
    }
    public function  DeleteTask($pid)
    {
      TaskModel::where('id',$pid)->delete();
        return redirect()->back()->with('success','Task Deleted');
    }
    public function saved_tasks(Request $req)
    {
        
       
        $task = DB::table('task_models as tm')->leftjoin('casemaster_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->where('created_by',Auth::id())->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name')->Select('task')->distinct('task')->Paginate(15);
        //$task = TaskModel::get();
        return view('userview_task',compact(['project','client','user','deliverable','task']));
    }
    public function  UpdateTask($task_id)
    {
         $task_detail =   TaskModel::find($task_id);
         $casemaster = CasemasterModel::orderBy('case_name','ASC')->get();
        $client = ClientModel::orderBy('client_name','ASC')->get();
        $deliverable = DeliverableModel::where('status',1)->orderBy('deliverable_name','ASC')->get();
        $user = User::get();
                $task = DB::table('task_models as tm')->leftjoin('casemaster_models as pm','tm.project','=','pm.id')->leftjoin('client_models as cm','tm.client','=','cm.id')->leftjoin('deliverable_models as dm','tm.deliverable','=','dm.id')->leftjoin('users as us','tm.task_owner','=','us.id')->where('created_by',Auth::id())->orderBy('date','DESC')->select('tm.*','pm.case_name','cm.client_name','dm.deliverable_name','us.name')->Paginate(15);
        
        return view('tracker',compact(['task_detail','project','client','user','deliverable','task','casemaster'])); 
       

    }
}
