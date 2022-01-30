@extends('dashboard.layouts.main')

@section('content') 
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4" style="margin: 40px 25px 25px 25px;">
            <div class="flex p-4 rounded-lg shadow-lg" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-12">
                    <div class="py-2 px-3 bg-gray-800 text-white" style="border-radius: 10px" style="border-radius: 10px">
                        <i class="bi bi-clipboard-data text-5xl"></i>
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Products</h5>
                <h1 class="text-4xl font-medium number-counter my-light-dark-text" data-value="{{ $productsCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-lg" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-12">
                    <div class="py-2 px-3 rounded text-white" style="border-radius: 10px; background-color: rgb(34 197 94);">
                        <i class="bi bi-grid text-5xl"></i>
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Categories</h5>
                <h1 class="text-4xl font-medium number-counter my-light-dark-text" data-value="{{ $categoriesCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-lg" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-12">
                    <div class="py-2 px-3 rounded bg-red-500 text-white" style="border-radius: 10px">
                        <i class="bi bi-people text-5xl"></i>
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Orders</h5>
                <h1 class="text-4xl font-medium number-counter my-light-dark-text" data-value="{{ $ordersCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-lg" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-12">
                    <div class="py-2 px-3 rounded bg-blue-500 text-white" style="border-radius: 10px">
                        <i class="bi bi-person text-5xl"></i>
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Users</h5>
                <h1 class="text-4xl font-medium number-counter my-light-dark-text" data-value="{{ $usersCount }}">0</h1>
            </div>
            </div>
    </div>

    <div id="order-chart">
        <canvas id="order-barchart"></canvas>
    </div>

    <div id="user-highchart"></div>
@endsection

@section('chart-js')
<script>
    // Order barchart
    $(function() {
        var ordersData = <?= json_encode($ordersData); ?>;
        var barCanvas = $('#order-barchart');
        var barChart = new Chart(barCanvas, {
            type: 'bar',
            data:{
                labels:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Des'],
                datasets:[
                    {
                        label: 'Customers Order Data Barchart',
                        data: ordersData,
                        backgroundColor: ['red','orange','green','yellow','blue','indigo','violet','purple','pink','silver','gold','brown'],
                    }
                ]
            },
            options: {
                scales: {
                    yAxes:[{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })


    // User highchart
    var usersData = <?= json_encode($usersData); ?>

    Highcharts.chart('user-highchart', {
        title:{
            text: 'Users Registered Data Highchart'
        },
        xAxis:{
            categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Des']
        },
        yAxis:{
            title:{
                text: 'Number of new User'
            }
        },
        legend:{
            layout:'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[{
            name: 'New User',
            data: usersData
        }],
        responsive:{
            rules:[
                {
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }
            ]
        }
    });
</script>

@endsection