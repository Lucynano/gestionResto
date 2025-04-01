@extends('layouts.main') {{-- Hérite du layout principal --}}

@section('title', 'Histogramme des ventes') {{-- Titre personnalisé --}}

@section('content') {{-- Contenu spécifique --}}
<div class="container mt-4">
    <h1>Histogramme des recettes pendant les 6 derniers mois</h1>

    <!-- L'élément où placer le graphique -->
    <div id="mon-chart" style="height: 500px; width: 100%;"></div>
</div>

<!-- Importation de Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mois', 'Total des recettes'],
            @foreach ($datas as $data)
                [ "{{ $data->mois }}", {{ $data->total }} ], 
            @endforeach
        ]);

        var options = {
            title: 'Recettes mensuelles',
            hAxis: { title: 'Mois' },
            vAxis: { title: 'Total des recettes' },
            legend: { position: 'none' },
            colors: ['#3498db'],
            bar: { groupWidth: "50%" }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('mon-chart'));
        chart.draw(data, options);
    }
</script>
@endsection
