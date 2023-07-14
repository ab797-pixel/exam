<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>short hall</title>
    <script type="text/javascript">
       
    </script>
    <style>
        
    </style>
<link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   
     <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
     <script src="/js/jquery/jquery.min.js"></script>

     <script src="/js/bootstrap.bundle.js"></script>
</head>
    <body>
     @foreach($presents as $hall=>$depts)
     <table class="table table-bordered" style="width:100%">
    <thead>
    <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align:center">BHARATHIDASAN UNIVERSITY EXAMINATIONS - NOV. 2017</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align:center">THIRU.VI.KA.GOVT.ARTS COLLEGE, TIRUVARUR (023)</h1>
            </div>
        </div>
    </thead>
    <tr style="text-align:center">
            <th>Date</th>
            <th>{{$date}}</th>
            <th>hall number</th>
            <th>{{$hall}}</th>

    </tr>
    <tr style="text-align:center">
            <th>session</th>
            <th>{{$session}}</th>
            <th>Name of the Invigilator</th>
            <th></th>

    </tr>  
</table> 
<table class="table table-bordered" style="height:75vh;">
<thead>
    <tr style="text-align:center;">
        <th>DEGREE</th>
        <th>CODE</th>
        <th>REGISTER NUMBER OF ALLOTED CANDIDATES</th>
        <th>TOTAL ALLOTED</th>
        <th>REGISTER NUMBER OF ABSENTEES</th>
        <th>TOTAL NO.OF ABSENTEES</th>
        <th>TOTAL NO.OF PRESENT</th>
    </tr>
    </thead>
    <tbody>
    @foreach($depts as $dept)
    <tr style="text-align:center;" >
        <td><b>{{$dept['first']->degree}}/{{$dept['first']->subject}}</b></td>
        <td><b>{{$dept['first']->subcode}}</b></td>
        <td><b>{{$dept['first']->reg_no}} to {{$dept['last']->reg_no}}</b></td>
        <td><b>{{$dept['count']}}</b></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
    <tr style="text-align:center;">
        <td colspan="3"> <b>TOTAL</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
    <tfoot>
    <tr style="height:10vh">
        <td colspan="7" >&nbsp</td>    
    </tr>
    <tr  style="text-align:center;">
        <td></td>
        <td colspan="3" ><b>Signature of the  Invigilator with date</b></td>
        
        <td colspan="3"><b>Signature of the  Chief Superintendent</b></td>
    </tr>
    </tfoot>
   
</table>

     @endforeach
 
    </body>
</html>


