@extends('layouts.app')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="flex flex-wrap mx-16">
    <canvas class="mb-16 mx-12" id="myChart"></canvas>
    <canvas class="my-16 mx-32" id="myChart2"></canvas>
    <canvas class="my-16 mx-32" id="myChart3"></canvas>
</div>
<script>
let dataC = <?php echo json_encode($cats); ?>;
let dataA = <?php echo json_encode($items); ?>;
let books_years = <?php echo json_encode($books_years); ?>;
let loans = <?php echo json_encode($loans); ?>;
let returns = <?php echo json_encode($returns); ?>;
let data = JSON.parse(dataC);
let labels = [];
for(let i = 0; i < data.length; i++) {
    labels.push(data[i].label);
}

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: '# of Votes',
            data: dataA,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: { 
        plugins: {
            title: {
                display: true,
                text: 'Livres par catégorie',
                font: {
                    size: 32
                }
            }
        },
        aspectRatio: 2,
        scales: {
            y: {
                beginAtZero: true,
                display: false
            }
        }
    }
});

const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Nombre de livres',
            data: books_years,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Nombre de livres',
                font: {
                    size: 32
                }
            }
        },
        aspectRatio: 4,
        scales: {
            y: {
                beginAtZero: true,
                min: 0,
                max: 10,
                display: true
            }
        }
    }
});

const ctx3 = document.getElementById('myChart3').getContext('2d');
const myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        datasets: [{
            type: 'bar',
            label: 'Emprunts',
            data: loans,
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)'
            ],
        },
        {
            type: 'bar',
            label: 'Retours',
            data: returns,
            backgroundColor: [
                'rgba(16, 0, 225, 0.8)'
            ],
        },
        ]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Emprunts/Retours',
                font: {
                    size: 32
                }
            }
        },
        aspectRatio: 2,
        scales: {
            y: {
                beginAtZero: true,
                max: 10
            }
        }
    }
});
</script>
@endsection