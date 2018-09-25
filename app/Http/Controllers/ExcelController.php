<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;

use App\Excel;



class ExcelController extends Controller

{

  /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function importExportView(){

        return view('import_export');

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function importFile(Request $request){

        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();



            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['title' => $value->title, 'body' => $value->body];

                }

                if(!empty($arr)){

                    DB::table('excel')->insert($arr);

                    dd('Insert Recorded successfully.');

                }

            }

        }

        dd('Request data does not have any files to import.');      

    } 



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function exportFile($type){

        $excel = Excel::get()->toArray();



        return \Excel::create('hdtuto_demo', function($excel) use ($excel) {

            $excel->sheet('sheet name', function($sheet) use ($excel)

            {

                $sheet->fromArray($excel);

            });

        })->download($type);

    }      

}