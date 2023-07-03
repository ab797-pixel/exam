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
<div class="col-lg-4">
    <h1 style="text-align:center;" id="time">Time Table</h1>
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
            <th>session</th>
            <th>subcode</th>
            <th>subject</th> 
            <th>graduate</th>
            <th>action</th>
        </tr>
        </thead>
        @foreach($dates as $date=>$time_tables)
        <tr>
            
            <td class="align-middle"><b>{{$date}}<b> </td>
           <td class="align-middle">
            @foreach($time_tables as $time_table)
            <b>{{$time_tables[0]->session}}</b><br>
            @endforeach
        </td>
            <td class="align-middle">
                @foreach($time_tables as $time_table)
                <b>{{$time_table->subcode}}</b><br>
                @endforeach
            </td>
            <td class="align-middle" id="subject">
                @foreach($time_tables as $time_table)
                <b>{{$time_table->title_of_the_paper}}</b><br>
                @endforeach
            </td>
            <td class="align-middle">
                @foreach($time_tables as $time_table)
                <b>{{$time_table->graduate}}</b><br>
                @endforeach
                </td>
                @php
                $disable = false;
                @endphp
                @if($disable != true)
                <td class="align-middle"   style="text-align:center;">
                <a class="btn btn-info"   onclick='create_hall("{{$date}}")' id="{{$date}}" >Create Hall</a>
                </td>
                @endif
             
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
            alert("Click 'Create Hall'");
        },
    });
   });

   
   function create_hall(date){
    $("#"+date).removeAttr("onclick");
    $.ajax({
        url:'create_hall',
        type:"post",
        data:   { 
            "date":date
        },
        datatype:'json',
        success: function(res){
            var date = res.date;
            
           $("#"+date).html("Hall Created").css({'background-color':'green','font-size':'20px'}).removeAttr("onclick");
           alert("Hall was created!");
        },
        error: function(err){
            alert("Import GALY and TIME_TABLE");
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