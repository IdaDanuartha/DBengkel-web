<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/WebLogo2.png" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- Tailwind css --}}
    <link rel="stylesheet" href="/css/app.css">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/assets/dashboard/css/dashboard.css">

    {{-- ionicons script --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- Chart.js --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <title>{{ $title }} | D'BENGKEL</title>
</head>
<body>


    @include('dashboard.partials.sidebar')
    
    {{-- Main Content Container --}}
    <div class="main-content body-color" id="main-content">

        @include('dashboard.partials.header')
        {{-- Main Content --}}
        @yield('content')

    </div>

{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


{{-- Sweet alert 2 --}}
<script src="/assets/js/sweetalert2/sweetalert2.all.min.js"></script>

{{-- My script --}}
<script src="/assets/dashboard/js/dashboard.js"></script>
<script src="/assets/js/main.js"></script>

@yield('chart-js')
@yield('script')
<script>
    @if (session('status'))
    let timerInterval
    Swal.fire({
        title: '{{ session("status") }}',
        timer: 2000,
        timerProgressBar: true,
        background: 'rgb(74 222 128)',
        color: '#fff',
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
        }
    })
    @endif
</script>



</body>
</html>