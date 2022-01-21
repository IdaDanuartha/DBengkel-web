<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/WebLogo.png" />

    {{-- Tailwind css --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="/css/app.css">
    
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/assets/dashboard/css/dashboard.css">
    
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



{{-- ionicons script --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

{{-- Sweet alert 2 --}}
<script src="/assets/js/sweetalert2/sweetalert2.all.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.all.min.js" integrity="sha512-aE/WWAoHkQZnPvRxpkvO3+nYiosvBZTv9AJB/quwn6ETQjQOSpNpaiIhmzbMl4RxVQ1QAGQgbZg2dLLVwf4Dug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

{{-- jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}

{{-- My script --}}
<script src="/assets/dashboard/js/dashboard.js"></script>
<script src="/assets/js/main.js"></script>

<script>
    @yield('script')

    @if(session('login-success'))
        Swal.fire('{{ session("login-success") }}')
    @endif
</script>



</body>
</html>