@extends('layout.default')

@section('javascript_head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        var chartPoints = JSON.parse( '<?php echo str_replace('\\', '\\\\', json_encode($chartPoints))  ?>' );
        var chartData = [];
        for (var i in chartPoints) {
            var newRow = [];
            var row = chartPoints[i];
            for (var j in row) {
                newRow.push( row[j] );
            }
            chartData.push(newRow);
        }

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(chartData);

            var options = {
                title: 'Metrics Tracking System',
                curveType: 'none',
                pointSize: 3,
                lineDashStyle: [5,5],
                legend: { position: 'bottom', alignment:'start' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
@endsection
@section('content')
    <h1>Data Points Chart</h1>

    <div id="curve_chart" style="width: 1100px; height: 500px"></div>

@endsection

@section('javascript')
@endsection
