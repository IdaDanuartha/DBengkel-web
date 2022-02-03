@extends('dashboard.layouts.main')

@section('content') 
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" style="margin: 40px 25px 25px 25px;">
            <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-5">
                    <div class="py-2 px-3 rounded" style="border-radius: 10px;">
                        <img src="/assets/img/order.png" width="55px" alt="">
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Orders</h5>
                <h1 class="text-3xl font-medium number-counter my-light-dark-text" data-value="{{ $ordersCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-5">
                    <div class="py-2 px-3" style="border-radius: 10px;">
                        <img src="/assets/img/message.png" width="55px" alt="">
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Message</h5>
                <h1 class="text-3xl font-medium number-counter my-light-dark-text" data-value="{{ $messageCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-5">
                    <div class="py-2 px-3 rounded" style="border-radius: 10px;">
                        <img src="/assets/img/admin.png" width="55px" alt="">
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Admin</h5>
                <h1 class="text-3xl font-medium number-counter my-light-dark-text" data-value="{{ $adminCount }}">0</h1>
            </div>
            </div>

            <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
                <div class="mr-5">
                    <div class="py-2 px-3 rounded" style="border-radius: 10px;">
                        <img src="/assets/img/customer.png" width="55px" alt="">
                    </div>
                </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Customers</h5>
                <h1 class="text-3xl font-medium number-counter my-light-dark-text" data-value="{{ $customersCount }}">0</h1>
            </div>
            </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4" style="margin: 40px 25px 25px 25px;">
        <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
            <div class="mr-5">
                <div class="py-2 px-3 rounded" style="border-radius: 10px;">
                    <img src="/assets/img/product-sold.png" width="55px" alt="">
                </div>
            </div>
            <div class="flex flex-col">
                <h5 class="text-gray-500 text-sm mb-2">Product Sold</h5>
                    <h1 class="text-3xl font-medium my-light-dark-text number-counter" data-value="{{ $ordersItemCount }}">0</h1>
            </div>
        </div>

        <div class="flex p-4 rounded-lg shadow-md my-light-dark-card" style="border: 1px solid rgba(0,0,0,0.2);">
            <div class="mr-5">
                <div class="py-2 px-3 rounded" style="border-radius: 10px;">
                    <img src="/assets/img/income.png" width="55px" alt="">
                </div>
            </div>
            <div class="flex flex-col">
                @php
                    $current = 0;
                @endphp
                @foreach($incomeCount as $item)
                @php
                    $current += $item->total_price;
                @endphp
                @endforeach
                <h5 class="text-gray-500 text-sm mb-2">Income</h5>
                    <h1 class="text-3xl font-medium my-light-dark-text">Rp {{ number_format($current, 0, ',','.') }}</h1>
            </div>
        </div>

    </div>


    <div id="order-chart">
        <canvas id="order-barchart"></canvas>
    </div>

    <div id="customers-highchart"></div>
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
                        label: 'Orders Data Barchart',
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


    // Customers highchart
    var usersData = <?= json_encode($usersData); ?>

    Highcharts.chart('customers-highchart', {
        title:{
            text: 'Customers Data Highchart'
        },
        xAxis:{
            categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Des']
        },
        yAxis:{
            title:{
                text: 'Number of new Customers'
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