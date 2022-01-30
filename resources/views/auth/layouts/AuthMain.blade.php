<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Tailwind css --}}
    <link rel="stylesheet" href="/css/app.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/WebLogo.png" />

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- My Style -->
    <link rel="stylesheet" href="/assets/css/auth.css">

    <title>{{ $title }} | D' BENGKEL</title>
</head>
<body style="background: url('/assets/img/header-img-2.jpg'); background-position: center;
background-size: cover; background-repeat: no-repeat; height: 100vh; font-family: 'Poppins', sans-serif;">

<span class="hover:text-gray-700 absolute top-7 right-7">
    <i id="dark-mode-icon" class="bi bi-moon-fill text-4xl"></i>
  </span>

    <div class="container">

    <div class="row justify-content-center">

        <div id="card-container" class="col-xl-10 col-lg-12 col-md-9">

            <div class="my-light-dark-card card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

    
    {{-- Jquery --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- My script --}}
    <script src="/assets/js/main.js"></script>

    <script>
        $(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
    </script>

</body>
</html>