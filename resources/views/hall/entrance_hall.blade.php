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
            <th></th>
            <th></th>
            <th>Session</th>

    </tr>
    <tr style="text-align:center">
            <th>{{$date}}</th>
            <th></th>
            <th></th>
            <th>{{$session[0]}}</th>
        </tr>
        <tr style="text-align:center">
            <td><b>DEGREE \ CODE</b></td>
            <td colspan="2"><b>REGISTER NUMBER OF ALLOTED CANDIDATES</b></td>
            
            <td><b>HALL   NUMBER</b></td>
        </tr>
        
        @foreach($entrance_tables as $subject=>$halls)
        @foreach($halls as $hall)
        <tr style="text-align:center;">
            <td><b>{{$hall['first']->subject}}\{{$hall['first']->subcode}}\{{$hall['first']->degree}}</b></td>
            <td colspan="2"><b>{{$hall['first']->reg_no}} TO {{$hall['last']->reg_no}}</b></td>
            
            <td><b>{{$hall['first']->hall_number}}</b></td>
        </tr>
        
        @endforeach
        @endforeach
      
        
 
        

    

       
</table> 

    </body>
</html>


