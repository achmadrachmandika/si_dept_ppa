<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"> </script>

</head>

@extends('layouts.app')


@section('content') 
<body >
    <div class="container">
        <div class="card">
            <h1 class="section-title" style="text-align: center; color: rgb(255, 28, 28); background-color: rgb(49, 49, 49); font-family: 'Times New Roman', Times, serif;">
            Sistem Informasi Departemen PPA
        </h1>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
    
</body>


@endsection

<script type="text/javascript">
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: false, // change to true		
            title:{
                text: "Basic Column Chart"
            },
            data: [  //array of dataSeries     
      { //dataSeries - first quarter
   /*** Change type "column" to "bar", "area", "line" or "pie"***/        
       type: "column",
       name: "First Quarter",
       dataPoints: [
       { label: "Total SPR", y: {{$countSpr}} },
    { label: "SPR selesai", y: {{$countProcessedSpr}} },
       { label: "Total LP3M", y: {{$countLp3m}} },
    //    { label: "apple", y: 80 },                                    
    //    { label: "mango", y: 74 },
    //    { label: "grape", y: 64 }
       ]
     },
    //  { //dataSeries - second quarter

    //   type: "column",
    //   name: "Second Quarter",                
    //   dataPoints: [
    //   { label: "banana", y: 63 },
    //   { label: "orange", y: 73 },
    //   { label: "apple", y: 88 },                                    
    //   { label: "mango", y: 77 },
    //   { label: "grape", y: 60 }
    //   ]
    // }
    ]
        });
    chart.render();

    }
</script>
</html>



















{{-- <div class="content-wrapper"
style="background-image: url('{{ asset('assets/dist/img/mro2.jpg') }}'); background-size: contain; background-position: center;"    @yield('content')
    <div class="section" style="background-color: rgba(255, 255, 255, 0.8); padding: 20px;">
       
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus
            ante dapibus diam. Sed nisi.</p>
    </div>
</div> --}}