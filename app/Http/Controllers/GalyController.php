<?php

namespace App\Http\Controllers;
use Excel;
use DB;
use App\Exports\GaliesExport;
use App\Imports\GaliesImport;
use App\Models\Galy;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;


class GalyController extends Controller
{
    
    
    public function exportGaly(){

        return Excel::download(new GaliesExport,'galy.xlsx');

    }

    public function importGaly(Request $request){
        $validated = $request->validate([
            'file' => 'required',
        ]);
        
     
        $file= request()->file('file');
        
        Excel::import(new GaliesImport, $file);
       // Excel::import(new GaliesImport,'.dummy.xlsx','s3',\Maatwebsite\Excel\Excel::XLSX);
       $message = "SUCCESSFULLY IMPORTED!";
      // return view('galy.create',compact('message'));
      return back();

    }
    public function index(){
      
    
       /* $galies = DB::select('select * from galies');
        return view('galy.create',['galies'=>$galies]);*/
       
       
        
        $galies = Galy::latest()->orderby('id','desc')->paginate(10);
        
        return view('galy.create',compact('galies'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
                    
    }
    public function create(){
        return "this is  galy create";

    }
    public function store(){
        return "this is  galy store";
    }
    public function show(){
        return "this is  galy show";
    }
    public function edit(){
        return "this is  galy edit";
    }
    public function update(){
        return "this is  galy update";
    }
    public function destroy(){
        return "this is  galy destroy";
    }
}
