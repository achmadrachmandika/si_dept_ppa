<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <style>
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content label {
          display: block;
          padding: 10px;
        }
        
        .dropdown-content label:hover {
          background-color: #ddd;
        }
        
        .dropdown-content input[type="checkbox"] {
          margin-right: 5px;
        }
        
        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>

</head>

@extends('layouts.app')


@section('content') 
<title>Dashboard</title>
<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div id="chartContainer" style="height: 600px; width: 100%;"></div>
      </div>
    </div>
  </div>

  <script>
      $(document).ready(function() {
          setInterval(function() {
              $.ajax({
                  url: "{{ route('dashboard') }}",
                  type: 'GET',
                  success: function(response) {
                      window.location.href ='{{ route('dynamic.dashboard') }}';
                      console.log('Controller executed successfully');
                      // You can handle the response here if needed
                  },
                  error: function(xhr, status, error) {
                      console.error('Error executing controller:', error);
                  }
              });
          }, 5000); // Mengirim permintaan setiap 5 detik (5000 milidetik)
      });
  </script>
</body>

@endsection

<script type="text/javascript">
  window.onload = function () {
    CanvasJS.addColorSet("bluePastel",
                [//colorSet Array
                "#ACE2E1",
                "#41C9E2",
                "#FF6868", //red pastel
                "#F7EEDD",
            
                ]);
                function updateDataSprText() {
                var selectedBagians = document.querySelectorAll('input[name="bagian[]"]:checked');
                var dataSprText = "Data SPR";
                
                if (selectedBagians.length > 0) {
                var selectedBagianNames = [];
                selectedBagians.forEach(function(bagian) {
                selectedBagianNames.push(bagian.getAttribute('data-name'));
                });
                dataSprText += " " + selectedBagianNames.join(', ');
                }
                
                document.getElementById("dataSprText").innerText = dataSprText;
                }
                
                var checkboxes = document.querySelectorAll('input[name="bagian[]"]');
                checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', updateDataSprText);
                });
        var chart = new CanvasJS.Chart("chartContainer", {
          colorSet: "bluePastel",
            animationEnabled: true,
            axisY: {
                title: "Jumlah SPR",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            toolTip: {
                shared: true
            },title: {
                text: "Data SPR {{$aset}} Tahun {{ $tahunSekarang }}",
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [ 
                {
                    type: "stackedColumn",
                    name: "SPR Proses",
                    legendText: "SPR Proses",
                    showInLegend: true,
                    dataPoints: [
                        { label: "Januari", y: {{$daftarSprOpen[1]}}, indexLabel: "{y}" },
                        { label: "Februari", y: {{$daftarSprOpen[2]}}, indexLabel: "{y}" },
                        { label: "Maret", y: {{$daftarSprOpen[3]}}, indexLabel: "{y}" },
                        { label: "April", y: {{$daftarSprOpen[4]}}, indexLabel: "{y}" },
                        { label: "Mei", y: {{$daftarSprOpen[5]}}, indexLabel: "{y}" },
                        { label: "Juni", y: {{$daftarSprOpen[6]}}, indexLabel: "{y}" },
                        { label: "Juli", y: {{$daftarSprOpen[7]}}, indexLabel: "{y}" },
                        { label: "Agustus", y: {{$daftarSprOpen[8]}}, indexLabel: "{y}" },
                        { label: "September", y: {{$daftarSprOpen[9]}}, indexLabel: "{y}" },
                        { label: "Oktober", y: {{$daftarSprOpen[10]}}, indexLabel: "{y}" },
                        { label: "November", y: {{$daftarSprOpen[11]}}, indexLabel: "{y}" },
                        { label: "Desember", y: {{$daftarSprOpen[12]}}, indexLabel: "{y}" }
                    ]
                },
                {
                type: "stackedColumn",
                name: "SPR Selesai",
                legendText: "SPR Selesai",
                showInLegend: true,
                dataPoints: [
                { label: "Januari", y: {{$daftarSprClose[1]}}, indexLabel: "{y}" },
                { label: "Februari", y: {{$daftarSprClose[2]}}, indexLabel: "{y}" },
                { label: "Maret", y: {{$daftarSprClose[3]}}, indexLabel: "{y}" },
                { label: "April", y: {{$daftarSprClose[4]}}, indexLabel: "{y}" },
                { label: "Mei", y: {{$daftarSprClose[5]}}, indexLabel: "{y}" },
                { label: "Juni", y: {{$daftarSprClose[6]}}, indexLabel: "{y}" },
                { label: "Juli", y: {{$daftarSprClose[7]}}, indexLabel: "{y}" },
                { label: "Agustus", y: {{$daftarSprClose[8]}}, indexLabel: "{y}" },
                { label: "September", y: {{$daftarSprClose[9]}}, indexLabel: "{y}" },
                { label: "Oktober", y: {{$daftarSprClose[10]}}, indexLabel: "{y}" },
                { label: "November", y: {{$daftarSprClose[11]}}, indexLabel: "{y}" },
                { label: "Desember", y: {{$daftarSprClose[12]}}, indexLabel: "{y}" }
                ]
                },
                {
                    type: "line",
                    name: "Jumlah SPR",
                    legendText: "Jumlah SPR",
                    showInLegend: true,
                    dataPoints: [
                        { label: "Januari", y: {{$daftarSpr[1]}}, indexLabel: "{y}"},
                        { label: "Februari", y: {{$daftarSpr[2]}}, indexLabel: "{y}", },
                        { label: "Maret", y: {{$daftarSpr[3]}}, indexLabel: "{y}" },
                        { label: "April", y: {{$daftarSpr[4]}}, indexLabel: "{y}" },
                        { label: "Mei", y: {{$daftarSpr[5]}}, indexLabel: "{y}" },
                        { label: "Juni", y: {{$daftarSpr[6]}}, indexLabel: "{y}" },
                        { label: "Juli", y: {{$daftarSpr[7]}}, indexLabel: "{y}" },
                        { label: "Agustus", y: {{$daftarSpr[8]}}, indexLabel: "{y}" },
                        { label: "September", y: {{$daftarSpr[9]}}, indexLabel: "{y}" },
                        { label: "Oktober", y: {{$daftarSpr[10]}}, indexLabel: "{y}" },
                        { label: "November", y: {{$daftarSpr[11]}}, indexLabel: "{y}" },
                        { label: "Desember", y: {{$daftarSpr[12]}}, indexLabel: "{y}" }
                    ]
                }
                
                
            ]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }

        
    }
</script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
      var checkAllBtnYear = document.getElementById('checkAllBtnYear');
      var uncheckAllBtnYear = document.getElementById('uncheckAllBtnYear');
      var checkAllBtnDept = document.getElementById('checkAllBtnDept');
      var uncheckAllBtnDept = document.getElementById('uncheckAllBtnDept');
      var checkAllBtnMonth = document.getElementById('checkAllBtnMonth');
      var uncheckAllBtnMonth = document.getElementById('uncheckAllBtnMonth');
      var checkAllBtnStatus = document.getElementById('checkAllBtnStatus');
      var uncheckAllBtnStatus = document.getElementById('uncheckAllBtnStatus');
    
      checkAllBtnYear.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-year input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnYear.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-year input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });

      checkAllBtnDept.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-dept input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnDept.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-dept input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });

      checkAllBtnMonth.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-month input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnMonth.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-month input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });

      checkAllBtnStatus.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-status input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = true;
        });
      });
    
      uncheckAllBtnStatus.addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('.dropdown-content-status input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      });
  });
</script>


</html>