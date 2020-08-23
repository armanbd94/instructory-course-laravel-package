<?php

namespace App\Http\Controllers;

use App\Imports\MultipleSheetImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Excel;
class ExcelFileUploadController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            if($request->file('excel')){
                if($request->type == 1){
                    $result = Excel::import(new UsersImport,$request->file('excel'));
                }else{
                    $import = new MultipleSheetImport();
                    $import->onlySheets('role_sheet','user_sheet');
                    $result = Excel::import($import,$request->file('excel'));
                }
                if($result){
                    $output = ['status' => 'success', 'message' => 'Data inserted successfully'];
                } else {
                    $output = ['status' => 'error', 'message' => 'File Data cannot upload!'];
                }
                
            }else{
                $output = ['status' => 'error', 'message' => 'Please upload file!'];
            }
            return response()->json($output);
        }
    }
}
