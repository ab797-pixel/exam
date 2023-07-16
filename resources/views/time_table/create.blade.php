@extends('../index')
@section('title','Time Table')
@section('container')

<div class="row">
    <div class="col-lg-4">
    <form class="d-flex" style="padding:5px;">
        <input class="form-control me-2" type="search" placeholder="Search" style="border:2px solid black;" aria-label="Search">
        <button class="btn btn-outline-success" style="backgrond-color:aqua;" type="submit">Search</button>
      </form>
    </div>
<div class="col-lg-2">
    <h1 style="text-align:center;" id="time">Time Table</h1>
</div>
<div class="col-lg-2">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<div class="col-lg-4" style="display:inline-block;">
<form action="{{ route('import_time_table') }}" method="POST" name="importform"
	  enctype="multipart/form-data">
		@csrf
			<label for="file">select Time Table</label>
			<input id="file" type="file" name="file"   class="form-control">
		<div style="margin-top:10px;">
    <button class="btn btn-success" id="import_time_table" style="margin-right:30px;">Import File</button>
    <a class="btn btn-info" id="export_time_table" href="{{ route('export_time_table') }}"style="margin-left:30px">Export File</a>  
        </div>	
	</form>
</div>    
</div>
<hr>
<table class="table table-resposive table-bordered" style="border:1px solid black;">
    <thead class="sticky-top" class="dark">
        <tr style="font-size:20px;text-align:center;border:2px solid black;background-color: #EEA47F;color:white;">
            
            <th>Date</th>
            <th>session/subcode</th>
           
            <th>action</th>
        </tr>
        
        </thead>
     @foreach($time_tables as $date=>$sessions)
          
        <tr>
            
            <td class="align-middle"><b>{{$date}}<b> </td>
            
             
             
             
                <?php 
               $sessions = $sessions->groupby('session');
               $dr = [];
             ?>  
             <td class="align-middle">
        @foreach($sessions as $session=>$subcodes)
         
         <table class="table">
            <tr width="100%">
                <th>SESSIONS</th>
                <th>SUBCODES</th>
            </tr>
            <tr>
                <td>{{$session}}</td>
                <td>
                @foreach($subcodes as $subcode)
                {{$subcode->subcode}}<br>
                @endforeach
                </td>
            </tr>
        </table>
        <?php 
           $dr []=$session;
          
            ?>
         
        @endforeach
            </td>
            
             <td class="align-middle"   style="text-align:center;">
             <!-- <?php
             echo implode(",",$dr);
             ?> -->
             <a class="btn btn-info"   onclick='create_hall("{{$date}}","{{implode(",",$dr)}}")' id="{{$date}}" >Create Hall</a>
             <div class="{{$date}}" >
              <span class="visually-hidden">Loading...</span>
             </div>
            </td>
            
             
        </tr>
       
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
        url:'create_hall/dateGet',
        type:"get",
        datatype:'json',
        success: function(date){
           len = date.length;
           
          for(var i = 0;i < len ; i++){
            $("#"+date[i]).html("Hall Created").css({'background-color':'green','font-size':'20px'}).removeAttr("onclick");
          }
        },
        error: function(err){
           
        },
    });
   });

   
   function create_hall(date,session){
    
    $("#"+date).removeAttr("onclick").html("Hall creating...").css({'background-color':'aqua'});
    $("."+date).addClass("spinner-border text-primary").addClass("status");
    var session= session.split(',');
    $.ajax({
        url:'create_hall',
        type:"post",
        data:   { 
            "date":date,
            "sessions" :session
        },
        datatype:'json',
        success: function(res){
            console.log(res);
            var date = res.date;
            
           $("#"+date).html("Hall Created")
                      .css({'background-color':'green','font-size':'20px'})
                      .removeAttr("onclick")
           $("."+date).removeClass("spinner-border text-primary")
                      .removeClass("status");
          
        },
        error: function(err){
            alert('IMPORT GALY PROPERLY');
            console.log(err);
        },
    });
   }
   

   
      //  alert(date);
    //     let date1 = date;
    //     $.ajax({
    //     method : "post",
    //     url: "route({{'create_hall/date'}})",
    //     data :{
    //         'date1' = date1;
    //     },
    //     success:function(res){
    //         alert(res);
    //     },
    //     error:function(err){
    //        alert(err);
    //     },
    // });


    

                
       
    
</script>
@endsection