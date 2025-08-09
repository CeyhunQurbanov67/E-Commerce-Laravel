@extends("Idareetme.layouts.master")
@section("title","Esas Sehife")
@section("content")

    <h1 class="page-header">Admin Sehifesi</h1>
    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Gozleyen Sifaris</div>
                <div class="panel-body">
                    <h4>{{$statistika["gozleyen_sifaris"]}}</h4>
                    <p>Eded</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Butun kategoriyalar</div>
                <div class="panel-body">
                    <h4>{{$statistika["toplam_kategoriyalar"]}}</h4>
                    <p>Kategoriya</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Mehsul sayi</div>
                <div class="panel-body">
                    <h4>{{$statistika["toplam_mehsul"]}}</h4>
                    <p>Eded</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Istifadeci sayi</div>
                <div class="panel-body">
                    <h4>{{$statistika["toplam_istifadeci"]}}</h4>
                    <p>Nefer</p>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
         <div class="col-sm-6">
             <canvas id="myChart" width="400" height="400"></canvas>
         </div>
    </section>
@endsection

@section("footer")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Yan', 'Fev', 'Mar'],
                datasets: [{
                    label: 'Satış',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // sütunların arxa fon rəngi
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)'
                    ],
                    borderWidth: 1 // çərçivə qalınlığı
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'blue', // rəqəmlərin rəngi
                            font: {
                                size: 14
                            }
                        }
                    },
                    x: {
                        ticks: {
                            color: 'green',
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'purple', // leqend yazılarının rəngi
                            font: {
                                size: 16
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
