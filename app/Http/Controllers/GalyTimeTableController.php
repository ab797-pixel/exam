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
     $halls;
     foreach($dates as $date){
        $hall = GalyTimeTable::where('date','=',$date)->count()/30;
         $fraction = $hall - floor($hall);
       
        if($fraction < 0.5){
           $hall = $hall + 1;
        }
           
        $halls[$i] = array(
               "date"      => $date, 
               "bcs"       => $bcs = GalyTimeTable::where('date','=',$date)->where('degree','=','B.Sc.')->count(),
               "ba"        => $ba = GalyTimeTable::where('date','=',$date)->where('degree','=','B.A.')->count(),
               "bcom"      => $bcom = GalyTimeTable::where('date','=',$date)->where('degree','=','B.Com.')->count(),
               "bba"       => $bba = GalyTimeTable::where('date','=',$date)->where('degree','=','BBA')->count(),
               "total"     =>$bcs+$ba+$bcom+$bba,
               "total_hall"=> $hall,
        );
    $i++;
    
     }
     return view('hall.create',compact('halls'));
  // return $halls;
        

    }
    public function shortHall($date){
        $short_tables= GalyTimeTable::where('date','=',$date)->get()->groupby('hall_number');
         return view('hall.short_hall',compact('short_tables'));
        
    }
    public function entranceHall($date){
        $subjects = GalyTimeTable::where('date','=',$date)->get()->groupby('subject');
        $session = GalyTimeTable::where('date','=',$date)->pluck('session');
        
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
    public function attandanceHall($date){
        $short_tables= GalyTimeTable::where('date','=',$date)->get()->groupby('hall_number');
         return view('hall.attandance',compact('short_tables'));
    }
}
