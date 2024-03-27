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
<body >
    <div class="container">
        <div class="card">
            <div class="row">
              <div class="col">
                <form action="{{route('filter-home')}}" method="post">
                  @csrf
                  <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                        <span class="h6">Tahun</span>
                      </button>
                      <div class="dropdown-content-year" aria-labelledby="dropdownMenuButton">
                        <button type='button' class="btn btn-primary form-control"id="checkAllBtnYear"><span class="h6">Pilih Semua</span></button>
                        <button type='button' class="btn btn-outline-secondary form-control mt-1"id="uncheckAllBtnYear"><span class="h6">Batal</span></button>
                          @foreach($tahuns as $tahun)
                          <label class="h6"><input type="checkbox" name="tahun[]" value="{{$tahun}}" {{ in_array($tahun, $queryTahun) ? 'checked' : '' }}>{{$tahun}}</label>
                          @endforeach
                      </div>
                    </div>
                     <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                        <span class="h6">Bagian</span>
                      </button>
                      <div class="dropdown-content-dept" aria-labelledby="dropdownMenuButton">
                        <button type='button' class="btn btn-primary form-control"id="checkAllBtnDept"><span class="h6">Pilih Semua</span></button>
                        <button type='button' class="btn btn-outline-secondary form-control mt-1"id="uncheckAllBtnDept"><span class="h6">Batal</span></button>
                        @foreach($daftarAset as $aset)
                        <label class="h6"><input type="checkbox" name="aset[]" value="{{$aset}}" {{ in_array($aset, $queryBagian) ? 'checked' : '' }}>{{$aset}}</label>
                        @endforeach
                      </div>
                    </div>
                  <div class="dropdown">
                    <button type="submit" class="btn btn-success form-control"><span class="h6">Cari</span></button>
                  </div>
                    
                  </div>
                </form>
              </div>
            </div>
            <div id="chartContainer" style="height: 600px; width: 100%;"></div>
        </div>
    </div>

    
    
</body>


@endsection

<script type="text/javascript">
  window.onload = function () {
    CanvasJS.addColorSet("bluePastel",
                [//colorSet Array

                "#41C9E2",
                "#ACE2E1",
                "#FF6868", //red pastel
                "#F7EEDD",
             
                ]);
        var chart = new CanvasJS.Chart("chartContainer", {
          colorSet: "bluePastel",
            animationEnabled: true,
            title: {
                text: "Data SPR"
            },
            axisY: {
                title: "Jumlah SPR",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            toolTip: {
                shared: true
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