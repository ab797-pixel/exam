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
            <th>B SC</th>
            <th>B.COM</th>
            <th>BBA</th> 
            <th>BA</th>
            <th>Total</th>
            <th>Total Hall</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach($halls as $hall)
        <tr style="text-align:center;">
            
            <td class="align-middle">{{$hall['date']}}</td>
            <td class="align-middle">{{$hall['bcs']}}</td>
            <td class="align-middle">{{$hall['bcom']}}</td>
            <td class="align-middle">{{$hall['bba']}}</td>
            <td class="align-middle">{{$hall['ba']}}</td>
            <td class="align-middle"> {{$hall['total']}} </td>
            <td class="align-middle"> {{round($hall['total_hall'])}} </td>
            <td class="align-middle">
            <div class="dropdown">
                   <button type="button" class="btn btn-info dropdown-toggle" id="hall" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                     Action
                   </button>
                   <div class="dropdown-menu" aria-labelledby="hall">
                     <a class="dropdown-item" href="{{route('short_hall',$hall['date'])}}">invigiltor</a>
                     <a class="dropdown-item" href="{{route('entrance_hall',$hall['date'])}}">Entrance Hall</a>
                     <a class="dropdown-item" href="{{route('attandance',$hall['date'])}}">attendance hall</a>
                   </div>
           </div>

            </td>
         </tr>
         @endforeach
       
        
        <tbody>

       
        
</tbody>
    
    
</table>

@endsection
