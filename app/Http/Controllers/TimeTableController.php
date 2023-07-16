<?php

namespace App\Http\Controllers;

use Excel;
use DB;
use App\Exports\TimeTablesExport;
use App\Imports\TimeTablesImport;
use App\Models\TimeTable;
use App\Models\Galy;
use App\Models\GalyTimeTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TimeTableController extends Controller
{
   
    public function exportTimeTable(){
        return Excel::download(new TimeTablesExport,'time_table.xlsx');
    }
    public function importTimeTable(Request $request){
      $validated = $request->validate([
        'file' => 'required',
    ]);
        $file= request()->file('file');
        
        Excel::import(new TimeTablesImport, $file);
       // Excel::import(new GaliesImport,'.dummy.xlsx','s3',\Maatwebsite\Excel\Excel::XLSX);

       return back();
    }
    public function index(){

        $dates = TimeTable::all();
        $time_tables = $dates -> groupby('date');
        
        return view('time_table.create',compact('time_tables'));
       //return $time_tables;
       // return  response()->json($dates);
                  
                 
    }
    public function createHall_old(Request $request){
       $date = $request->date;
       
        /*
        *each  hall have a 30(records) candidate => (15+15) of them  each dept (or)
                                                 => (7+8+7+8)  of them each dept
                            
        hall_number;
        date
        session
        reg_no
        degree
        subcode*/

        
        $i = 1;
        $a = 1;
        $halls = 0;
        $first = [];
        $time_tables = TimeTable::where('date','=',$date)->get();
        
        
        $subcodes = $time_tables->pluck('subcode');
        foreach($subcodes as $subcode){
            $galies = Galy::where('subcode','=',$subcode)  ->get();
               $halls += $galies->count()/30;
        }
        
        $fraction = $halls - floor($halls);
       
      //   if($fraction < 0.5){
      //      $halls = $halls + 1;
      //   }
        
        foreach($subcodes as $subcode){
            
           $galies = Galy::where('subcode','=',$subcode) 
                 
                  ->get();
          $degrees= $galies ->groupby('degree');
           
             foreach($degrees as $degree => $depts ){
                
                $dept = $depts->groupby('subject');
                foreach($dept as $subject => $group_students){
                     $students = $group_students->sortBy('reg_no');
                   
                   foreach($students as $student){
                     array_push($first,$student); 
                     $galy_time_table = new GalyTimeTable();
                     if($i > round($halls)){
                        $i = 1;    
                      }
                     $galy_time_table->hall_number = $i;
                     $a++;
                     if($a > 15){
                       $i++;
                       
                       $a = 1;
                     }
                     
                  
                     $galy_time_table->date =$date;
                     $galy_time_table->session= $session;
                     $galy_time_table->subcode = $subcode;
                     $galy_time_table->degree = $degree;
                     $galy_time_table->subject = $subject;
                     $galy_time_table->reg_no = $student->reg_no;
                     $galy_time_table->save();
                 }
                }
            
            }
        

    }
  //  $short_tables= GalyTimeTable::where('date','=',$date)->get()->groupby('hall_number');
  //  return view('hall.create',compact('short_tables'));
   return $galy_time_table;        
    }
    public function createHall(Request $request){
         /*
        *each  hall have a 30(records) candidate => (15+15) of them  each dept (or)
                                                 => (7+8+7+8)  of them each dept
                            
        hall_number;
        date
        session
        reg_no
        degree
        subcode*/
        $date = $request->date;
        $sessions = $request->sessions;
        
        foreach($sessions as $session){
          $first = [];
          $halls = 0;
          $i = 1;
          $a = 1;
          $total_students = 0;
           $time_tables = TimeTable::where('date','=',$date)->where('session','=',$session)->get();
           $subcodes = $time_tables->pluck('subcode');
           foreach($subcodes as $subcode){
            $galies = Galy::where('subcode','=',$subcode)->get();
            $total_students += $galies->count();
            $halls += $galies->count()/30;
           }
          $fraction = $halls - floor($halls);
         //  if($fraction < 0.5){
         //    $halls = $halls + 1;
         //    }
           foreach($subcodes as $subcode){
              $galies = Galy::where('subcode','=',$subcode)->get();
              $depts = $galies->groupby('subject');
              foreach($depts as $dept=>$students){
                $students = $students->sortBy('reg_no');
                foreach($students as $student){
                     array_push($first,$student);
                 
                    
                 $galy_time_table = new GalyTimeTable();
                     if($i > round($halls) ){
                      if($total_students/1.1 > count($first) ){
                        $i = 1;    
                         }
                      }
                     $galy_time_table->hall_number = $i;
                     $a++;
                     if($a > 15){
                       $i++;
                       $a = 1;
                     }
                     $galy_time_table->date =$date;
                     $galy_time_table->session= $session;
                     $galy_time_table->subcode = $subcode;
                     $galy_time_table->degree = $student->degree;
                     $galy_time_table->subject = $dept;
                     $galy_time_table->reg_no = $student->reg_no;
                     $galy_time_table->save();
                 
                }

              }
           }
        }
        return $galy_time_table;
       
    }
   
    public function showDate(){
       $dates = GalyTimeTable::pluck('date')->unique();
      
       foreach($dates as $id=>$date){
         $date1[] = $date;
       }
       return $date1;
    }

    public function show(){
        return "hi this is show function";
        // $short_tables= GalyTimeTable::where('date','=',$date)->get()->groupby('hall_number');
        //  return view('hall.create',compact('short_tables'));
    }

    public function edit(){
        return "this is edit";
    }
    public function update(){
        return "this is update";
    }
    public function destroy(){
        return "this is destroy";
    }

}
