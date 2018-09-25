<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('dashboard', function () {
    return view('dashboard');
});


Auth::routes();
Route::get('/pdf','adminController@pdf');
Route::get('/excel','adminController@excel');
Route::get('/home', 'HomeController@indexx')->name('user');
Route::get('/home', 'HomeController@indexxx')->name('admin');
Route::get('/user', 'HomeController@indexx')->name('user');
Route::get('/admin', 'HomeController@indexxx')->name('admin');
Route::get('/add_tracker', 'employeeController@addTracker');
Route::get('/add_project', 'adminController@addProject');
Route::get('/add_casemaster', 'adminController@addCasemaster');
Route::post('/create_project','adminController@CreateProject')->name('create_project');
Route::post('/create_casemaster','adminController@CreateCasemaster')->name('create_casemaster');
Route::get('/add_client', 'adminController@addClient');
Route::get('/deliverable_add', 'adminController@addDel');
Route::get('/add_resource', 'adminController@addResource');
Route::get('/resource_allocation', 'employeeController@resourceAllocation');
Route::get('/add_resourceavailability', 'adminController@addResourceavailability');
Route::post('/create_resourceavailability','adminController@CreateResourceavailability')->name('create_resourceavailability');
Route::post('/save_resourceallocation','employeeController@SaveResourceallocation')->name('save_resourceallocation');
Route::get('/expenses', 'adminController@expense');
Route::get('/reports', 'adminController@report');
Route::get('/search_expense', 'adminController@expense');
Route::post('/create_client','adminController@CreateClient')->name('create_client');
// Route::post('/create_deliverable','adminController@CreateDel')->name('create_deliverable');
Route::post('/create_resource','adminController@CreateResource')->name('create_resource');
Route::get('/add_deliverable', 'adminController@addDeliverable')->name('add_deliverable');
Route::post('/create_deliverable','adminController@CreateDeliverable')->name('create_deliverable');
Route::get('/userview_task', 'employeeController@saved_tasks');
Route::post('/userview_task', 'employeeController@saved_tasks');
Route::get('/view_task', 'adminController@viewTask');

Route::get('search_task','adminController@SearchTask');
Route::get('search_client','adminController@SearchClient');
Route::get('search_deliverable','adminController@SearchDeliverable');
Route::get('search_project','adminController@SearchProject');
Route::post('/view_task', 'employeeController@SaveTask');
Route::get('delete_project/{projectid?}','adminController@DeleteProject');
Route::get('delete_deliverable/{deliverableid?}','adminController@DeleteDeliverable');
Route::get('delete_client/{clientid?}','adminController@DeleteClient');
Route::get('delete_resource/{resourceid?}','adminController@DeleteResource');
Route::get('delete_casemaster/{casemasterid?}','adminController@DeleteCasemaster');
Route::get('update_client/{clientid?}','adminController@UpdateClient');
Route::get('update_resource/{resourceid?}','adminController@UpdateResource');
Route::get('update_project/{projectid?}','adminController@UpdateProject');
Route::get('update_deliverable/{deliverableid?}','adminController@UpdateDeliverable');
Route::get('delete_task/{taskid?}','employeeController@DeleteTask');
Route::get('update_task/{taskid?}','employeeController@UpdateTask');
Route::post('/save_task','employeeController@SaveTask')->name('save_task');
Route::get('update_casemaster/{casemasterid?}','adminController@UpdateCasemaster');
Route::post('/view_task','adminController@saved_tasks');
Route::get('get_project_by_client/{client?}','employeeController@getProjectByClient');
Route::get('get_deliverable_by_project/{project?}','employeeController@getDeliverablebyProject');
// Route::get('get_project_by_client/{client?}','adminController@getProjectByClient');
// Route::get('get_deliverable_by_project/{project?}','adminController@getDeliverablebyProject');
Route::get('import-export-view', 'ExcelController@importExportView')->name('import.export.view');

Route::post('import-file', 'ExcelController@importFile')->name('import.file');

Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');

