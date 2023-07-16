<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalyTimeTable;

use Illuminate\Http\Response;

class GalyTimeTableController extends Controller
{
    
    public function index(){
       
       
     $dates = GalyTimeTable::pluck('date')->unique();
     $i=0;
     $halls = [];
     foreach($dates as $date){
        $sessions = GalyTimeTable::where('date','=',$date)->get()->groupby('session');
        foreach($sessions as $session=>$students){
            $hall = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->count()/30;
            $fraction = $hall - floor($hall);
       
            if($fraction < 0.5){
               $hall = $hall + 1;
            }
            $halls[$date][$session]= array(
                "date"      => $date, 
                "session"   => $session,
                "bcs"       => $bcs = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->where('degree','=','B.Sc.')->count(),
                "ba"        => $ba = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->where('degree','=','B.A.')->count(),
                "bcom"      => $bcom = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->where('degree','=','B.Com.')->count(),
                "bba"       => $bba = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->where('degree','=','BBA')->count(),
                "total"     =>$bcs+$ba+$bcom+$bba,
                "total_hall"=> $hall,
         );
        }  
    $i++;
    
     }
     return view('hall.create',compact('halls'));
  return $halls;
        

    }
    public function shortHall($date,$session){
        $short_tables= GalyTimeTable::where('date','=',$date)->where('session','=',$session)->get()->groupby('hall_number');
         return view('hall.short_hall',compact('short_tables'));
        
    }
    public function entranceHall($date,$session){
        $subjects = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->get()->groupby('subject');
       
        foreach($subjects as $subject=>$halls){
            $halls = $halls->groupby('hall_number');
            foreach($halls as $hall=>$students){
                $entrance_tables[$subject][$hall]=array(
                   "first" => $first_reg=$students->first(),
                   "last" => $last_reg=$students->last(),
                );
               
            } 
        
    }

   return view('hall.entrance_hall',compact('entrance_tables','date','session'));
   //return $entrance_tables;
   
}
    public function attandanceHall($date,$session){
        $short_tables= GalyTimeTable::where('date','=',$date)->where('session','=',$session)->get()->groupby('hall_number');
         return view('hall.attandance',compact('short_tables'));
    }
    public function studentPresent($date,$session){
        $halls = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->get()->groupby('hall_number');
        foreach($halls as $hall=>$depts){
           
            $depts=$depts->groupby('subject');
            foreach($depts as $dept=>$students){
                $presents[$hall][$dept]= array(
                    "first" => $students->first(),
                    "last"  => $students->last(),
                    "count"  =>$students->count(),
                );
            }
        }
        return view('hall.present',compact('presents','date','session'));
       //return $presents;
 
        
    }
}
