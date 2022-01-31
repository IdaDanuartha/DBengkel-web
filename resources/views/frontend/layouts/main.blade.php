<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Tailwind css --}}
    <link rel="stylesheet" href="/css/app.css">
    
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/WebLogo2.png" />

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    {{-- Boostrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- Jquery Ui --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!-- owlcarousel2 -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="/assets/css/main.css">
    @yield('order-css')
    @yield('styles')

    <title>{{ $title }} | D' BENGKEL</title>
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <!-- Loader -->
    <div class="spinner">
        <img src="/assets/img/WebLogo2.png" alt="Logo">
    </div>

    @include('frontend.partials.navbar')

        @yield('main-content')

    @include('frontend.partials.footer')


    {{-- Sweetalert2 --}}
    <script src="/assets/js/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- owlcarousel2 -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>

    {{-- My Script --}}
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/cart.js"></script>

    @yield('scripts')

    <script>
        // Loader
        const loader = document.querySelector(".spinner");
        const navbar = document.querySelector('#mainNav');
        window.addEventListener("load", loaderAnimation);

        function loaderAnimation() {
            navbar.classList.remove('hidden');
            loader.classList.add("disppear");
        }

        @if(session('status'))
            Swal.fire('{{ session("status") }}')
        @endif

    </script>
</body>

</html>