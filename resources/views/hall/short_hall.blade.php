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
       
    </thead>
    <tbody >

        @foreach($short_tables as $hall => $students)
        <tr>
            <th>Date</th><td>{{$students[0]->date}}</td><th>Hall</th><td colspan='2'><centre> <b>{{$hall}}</b><centre></td> 
        </tr>
        <tr>
        <th>Session</th><td>{{$students[0]->session}}</td><th style="width:20%">name of the Invigilator</th><td  colspan='2'></td> 
        </tr>
       
        <tr style="text-align=center">
            <th><b>S.NO.</b></th>
            <th><b>DEGREE/CODE</b></th>
            <th><b>REGISTER NUMBER</b></th>
            <th><b>PRESENT/ ABSENT</b></th>
            <th><b>STUDENT TOTAL</b></th>
        </tr>
        
   <?php $i=1 ?>
        @foreach($students as $student)



        <tr style="text-align=center">
          <td><b>{{$i}}</b></td>
           <td><b>{{$student->degree}}/{{$student->subject}}/{{$student->subcode}}</b></td> 
          <td><b>{{$student->reg_no}}</b></td>
          <td><b></b></td>
          <td><b></b></td>
        </tr>
         <?php $i++ ?>
        @endforeach
       
        <!-- <div class="row">
            <div class="col-4">No. of Present</div>
            <div class="col-4">No. of Absentees</div>
            <div class="col-4">Total No. of Candidates</div>
        </div>
        <div class="row">
            <div class="col-6">Signature of the Invigilator with date</div>
            <div class="col-6">Signature of the Chief Superintendent</div>
        </div> -->
        <tr>
            <td>No. of Present</td>
            <td></td>
            <td style="border-bottom:none;"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>No. of Absentees</td>
            <td></td>
            <td style="border-bottom:0px;"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total No. of Candidates</td>
            <td></td>
            <td>Signature of the Invigilator with date</td>
            <td></td>
            <td>Signature of the Chief Superintendent</td>
        </tr>
        </tbody>
        
       
       
        @endforeach
    
</table> 

    </body>
</html>


