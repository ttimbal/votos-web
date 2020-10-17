@extends('layouts.app')

@section('page-title', 'Home')


@section('content')
    @csrf
    <div class="row center">
        <div class="col col center s16 m12 l10 offset-l3">

            <div class="col center s8">
                <h1>Total de votos: {{$total_votos}}</h1>
                <div class="row">
                    <h3>Presidente</h3>
                    <canvas id="presidente" width="600" height="400"></canvas>

                </div>
                <div class="row">
                    <h3>Diputado</h3>
                    <canvas id="diputado" width="300" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('presidente').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nombres_pre)?>,
                datasets: [{
                    label: 'votos',
                    data: <?php echo json_encode($votos_pre)?>,

                    backgroundColor: [
                        'rgb(255,0,7)',
                        'rgb(255,101,0)',
                        'rgba(154,12,154,1)',
                        'rgb(43,96,16)',
                        'rgb(78,250,12)',
                        'rgb(46,126,47)',
                        'rgb(0,40,221)',
                        'rgb(255,0,7)',
                        'rgb(0,0,0)',
                        'rgb(236,233,233)'

                    ],
                    borderColor: [
                        'rgb(0,0,0)',
                        'rgb(0,102,11)',
                        'rgba(232,22,139,1)',
                        'rgb(0,0,0)',
                        'rgb(78,250,12)',
                        'rgb(46,126,47)',
                        'rgb(0,40,221)',
                        'rgb(255,255,255)',
                        'rgb(0,0,0)',
                        'rgb(236,233,233)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        var c = document.getElementById('diputado').getContext('2d');
        new Chart(c, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nombres_dip)?>,
                datasets: [{
                    label: 'votos',
                    data: <?php echo json_encode($votos_dip)?>,

                    backgroundColor: [
                        'rgb(255,0,7)',
                        'rgb(255,101,0)',
                        'rgba(154,12,154,1)',
                        'rgb(43,96,16)',
                        'rgb(78,250,12)',
                        'rgb(46,126,47)',
                        'rgb(0,40,221)',
                        'rgb(255,0,7)',
                        'rgb(0,0,0)',
                        'rgb(236,233,233)'

                    ],
                    borderColor: [
                        'rgb(0,0,0)',
                        'rgb(0,102,11)',
                        'rgba(232,22,139,1)',
                        'rgb(0,0,0)',
                        'rgb(78,250,12)',
                        'rgb(46,126,47)',
                        'rgb(0,40,221)',
                        'rgb(255,255,255)',
                        'rgb(0,0,0)',
                        'rgb(236,233,233)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
