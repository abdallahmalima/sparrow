<?php

namespace App\Http\Controllers;

use App\Exports\ServiceExport;
use App\Imports\ServiceImport;
use Illuminate\Http\Request;
use Excel;
class ExcelController extends Controller
{
    //
    public function import(Request $request){
      Excel::import(new ServiceImport,$request->file('file'));
      return back();
    }
    public function export(){
        return Excel::download(new ServiceExport,'text.xlsx');
    }
    public function exportCSV(){
        return Excel::download(new ServiceExport,'text.csv'); 
    }
    public function importForm(){

        return view('services.excels.create');
    }
}
