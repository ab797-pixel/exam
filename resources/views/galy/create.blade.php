@extends('../index')
@section('title','galy')
@section('container')
<div class="row">
<div class="col-lg-4">
    <form class="d-flex" style="padding:5px;">
        <input class="form-control me-2" type="search" placeholder="Subcode" style="border:2px solid black;" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
<div class="col-lg-2">
    <h1 style="text-align:center;">Gally</h1>
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
<form action="{{ route('import-galy') }}" id="galyimport" method="POST" name="importform"
	  enctype="multipart/form-data">
      <!-- <form  id="galyimport" name="importform"
	  enctype="multipart/form-data"> -->
      
		@csrf
			<label for="file">select galy</label>
			<input id="file" type="file" name="file"   class="form-control">
		<div style="margin-top:10px;">
    <button class="btn btn-success" style="margin-right:30px;" >Import File</button>
    <a class="btn btn-info" href="{{ route('export-galy') }}"style="margin-left:30px">Export File</a>  
    </div>	
	</form>
</div>    
</div>
<hr>


       {!! $galies->withQueryString()->links('pagination::bootstrap-5') !!}
    
<table class="table table-resposive">
    <thead>
        <tr>
           
            <th>Degree</th>
            <th>term</th>
            <th>Batch</th>
            <th>subject</th>
            <th>subcode</th>
            <th>regno</th>
           
        </tr>
        </thead>
        <tbody>
        <!--{"id":256,
            "term":"17W",
            "degree":"B.A.",
            "batch":2015,
            "centre":23,
            "subject":"HI",
            "subcode":"RELCE3",
            "reg_no":"CB15A 165085",
            "graduate":"UG",
            "created_at":"2023-06-06T04:59:19.000000Z",
            "updated_at":"2023-06-06T04:59:19.000000Z"}-->
      @foreach($galies as $galy)
        <tr>
           
            <td>{{$galy->degree}}</td>
            <td>{{$galy->term}}</td>
            <td>{{$galy->batch}}</td>
            <td>{{$galy->subject}}</td>
            <td>{{$galy->subcode}}</td>
            <td>{{$galy->reg_no}}</td>
           
        </tr>
        @endforeach
        </tbody>   
</table>

@endsection