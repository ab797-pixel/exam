@extends('index')
@section('title','Hall')
@section('container')
<div class="row">
<div class="col-lg-12">
    <h1 style="text-align:center;">Hall</h1>
</div>
</div>
<table class="table table-resposive table-bordered" style="border:1px solid black;">
    <thead class="sticky-top" class="dark">
        <tr style="font-size:20px;text-align:center;border:2px solid black;background-color: #EEA47F;color:white;">
            
            <th>Date</th>
            <th>Session</th>
            <th>B SC</th>
            <th>B.COM</th>
            <th>BBA</th> 
            <th>BA</th>
            <th>Total</th>
            <th>Total Hall</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        $halls = [];
         ?>
        @foreach($halls as $hall=>$sessions)
          @foreach($sessions as $session)
        <tr style="text-align:center;">
            
            <td class="align-middle">{{$hall}}</td>
            <td class="align-middle">{{$session['session']}}</td>
            <td class="align-middle">{{$session['bcs']}}</td>
            <td class="align-middle">{{$session['bcom']}}</td>
            <td class="align-middle">{{$session['bba']}}</td>
            <td class="align-middle">{{$session['ba']}}</td>
            <td class="align-middle"> {{$session['total']}} </td>
            <td class="align-middle"> {{round($session['total_hall'])}} </td>
            <td class="align-middle">
            <div class="dropdown">
                   <button type="button" class="btn btn-info dropdown-toggle" id="hall" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                     Action
                   </button>
                   <div class="dropdown-menu" aria-labelledby="hall">
                     <a class="dropdown-item" href="short_hall/{{$hall}}/{{$session['session']}}">Class Hall</a>
                     <a class="dropdown-item" href="entrance_hall/{{$hall}}/{{$session['session']}}">Entrance</a>
                     <a class="dropdown-item" href="attandance/{{$hall}}/{{$session['session']}}">attendance hall</a>
                     <a class="dropdown-item" href="present/{{$hall}}/{{$session['session']}}">present/absent</a>
                   </div>
           </div>

            </td>
         </tr>
          @endforeach
         @endforeach
       
        
        <tbody>

       
        
</tbody>
    
    
</table>
<script type="text/javascript">
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
   });
   $(document).ready(function(){
    $.ajax({
        url:'hall/index',
        type:"get",
        datatype:'json',
        success: function(date){
           
        },
        error: function(err){
            alert("Click 'Create Hall'");
        },
    });
   });
  </script>

@endsection
