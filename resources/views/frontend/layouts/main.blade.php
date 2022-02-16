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

{{-- @if(!Request::is('checkout'))
@auth
@if(auth()->user()->role_as == 0)
    {{-- Message box --}}
    {{-- <div id="message-box" data-bs-toggle="modal" data-bs-target="#message-modal">
        <img src="/assets/img/message.png" alt="">
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="message-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content my-light-dark-card">
        <div class="modal-header">
          <h5 class="modal-title font-medium text-lg" id="staticBackdropLabel">Message Box</h5>
          <button type="reset" class="bi bi-x-lg text-gray-600 cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body p-0">
            <form action="/send-message" onsubmit="submitForm('Sending')" method="POST">
                @csrf
                <textarea class="w-full h-full py-2 px-3 my-light-dark-card message-textarea" rows="6" id="message" name="message" type="text" required placeholder="Hi {{ auth()->user()->first_name }}, write your problem here..."></textarea>
            </div>
            <div class="modal-footer mt-0">
                <button type="submit" class="text-md btn-submit btn-effect btn-details font-medium py-2 px-4 rounded">
                    <i class="bi bi-send mr-2"></i>Send
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endif
@endauth
@endif --}}

    @include('frontend.partials.navbar')

        @yield('main-content')

    @include('frontend.partials.footer')


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/620ca246a34c245641268254/1fs0ljpug';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    
    {{-- Sweetalert2 --}}
    <script src="/assets/js/sweetalert2/sweetalert2.all.min.js"></script>

    {{-- Jquery --}}
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <!-- owlcarousel2 -->
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