<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- <title>{{ config('app.name', 'Laravel') }}</title>-->
   <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   
     <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    
	</head>
     <script src="/js/jquery/jquery.min.js"></script>

     <script src="/js/bootstrap.bundle.js"></script>

    <!-- Scripts -->
    <!-- <script type="text/javascript">
       document.getElementsByClassName('nav-link').style.backgroundColor = "aqua";
    </script> -->
   <!-- -->
   <style >
    .nav-link:hover{
      background-color: blue;
    }
    .nav-link:active{
      background-color: aqua;
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24);
      transform: translateY(4px);
    }

   </style>

  
</head>
<body>

<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">hall allocate</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="galy">galy</a></li>
      <li><a href="time_table">time table</a></li>
      <li><a href="hall">hall</a></li>
      <li><a href="ehall">entrance hall</a></li>
    </ul>
  </div>
</nav>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:#FF00FF">Hall Allocate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="galy" onclick="click()">Galy</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="time_table" onclick="click()">Time Table</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="hall" onclick="click()"> Hall </a>
        </li>
       
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

 
@yield('container')
@section('contact')
    <div class="row">
        <div class="col-lg-6">
      this is index file
        </div>
        <div class="col-lg-6">
        
        </div>
    </div>
@endsection

<footer>
    created by @Abdulla
</footer>
   

    
</body>
</html>