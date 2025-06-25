<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Chart / Importação - Arquivo Remoto -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Google Chart / Importação - Arquivo Local -->
    {{-- <script type="text/javascript" src="{{asset('js/google-chart-loader.js')}}"></script> --}}

    <title>Document</title>
</head>
<body>

    <div id="myChart" style="max-width:700px; height:400px">    </div>
    <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            const data = google.visualization.arrayToDataTable([
            ['Contry', '00000'],
            ['BRAZIL', 55],
            ['France', 49],
            ['Spain', 44],
            ['USA', 24],
            ['Argentina', 15]
            ]);

            const options = {
            title: 'TADS24 SUPER RESENHA!'
            };

            const chart = new google.visualization.BarChart(document.getElementById('myChart'));
            chart.draw(data, options);

        }

    </script>
</body>
</html>
