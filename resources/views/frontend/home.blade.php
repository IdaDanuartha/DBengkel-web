@extends('frontend.layouts.main')

@section('main-content')
    <!-- Header Section -->
    <div class="hero-section">
        <div class="spotlight-container">
            <div class="slide-container" id="slide-1">
                <div class="info-area-container">
                    <div class="spacer-div"></div>
                    <div class="info-area" id="info-1">
                        <h1 class="slide-title">D'BENGKEL SHOP</h1>
                        <h3 class="slide-sub-text">Anda ingin belanja keperluan untuk bengkel tapi malas keluar rumah? Tenang anda hanya perlu duduk dirumah saja karena kami akan mengantar barang yang anda inginkan ke depan rumah anda.</h3>
                        @auth
                            <a href="/all-products" class="btn rounded-pill px-3 explore-btn">Explore Now <i class="bi bi-arrow-right"></i></a>
                        @else
                            <a href="/login" class="a-btn login-btn">Login</a>
                            <a href="/register" class="a-btn register-btn">Register</a>
                        @endauth
                    </div>
                </div>
                <div class="slide my-light-dark-card bg-fixed" style="background-image: url('/assets/img/header-img-2.jpg');">
                </div>
            </div>
        </div>
    </div>


    <!-- Start Featured Product section -->

    <section class="featured-products mt-10" id="featured-products">
        <div class="container">
            <h2 class="mb-5">Featured Products</h2>                   
            <div class="owl-carousel owl-theme">
                @foreach ($featured_prod as $product)
                @if($product->status == 1 && $product->trending == 1)
                <div class="flex justify-center hover:shadow-lg">
                  <a href="/category/{{ $product->category_slug }}/{{ $product->slug }}" class="text-gray-700 duration-500 hover:text-gray-900">
                  <div class="rounded-lg shadow-sm max-w-sm my-light-dark-card-home my-light-dark-text">
                      <img class="rounded-t-lg w-full h-60" src="/assets/uploads/products/{{ $product->main_image }}" alt=""/>
                      {{-- <img class="rounded-t-lg w-full h-60" src="{{ $product->main_image }}" alt=""/> --}}
                    <div class="p-6">
                      <h5 class="text-lg font-medium mb-2">{{ Str::limit($product->name, 40) }}</h5>
      
                      <div class="flex mb-4 text-sm justify-between">
                        <span class="flex items-center">
                          @php $rate_num = $product->rating @endphp
                          @for ($i = 1; $i <= $rate_num; $i++)
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          @for ($j = $rate_num+1; $j <= 5; $j++)
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          </span>
                          <p class="my-light-dark-text">
                            Sold {{ $product->total_sold == NULL ? 0 : $product->total_sold }}
                          </p>
                      </div>
      
                      <div class="flex">
                        @if($product->disc_price)
                          <p class="text-lg">Rp {{ number_format($product->disc_price, 0, ',', '.') }}</p>
                          <p class="relative left-2 text-xs text-gray-500"><s>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</s></p>
                        @else
                          <div>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</div>
                        @endif                  
                    </div>
                    
                    </div>
                  </div>
                </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Featured Product Section -->


    {{-- Start latest product section --}}

    <section class="latest-products mt-16" id="latest-products">
        <div class="container">
            <h2 class="mb-5">Latest Products</h2>                   
            <div class="owl-carousel owl-theme">
                @foreach ($latest_prod as $product)
                @if($product->status == 1)
                <div class="flex justify-center hover:shadow-lg">
                  <a href="/category/{{ $product->category_slug }}/{{ $product->slug }}" class="text-gray-700 duration-500 hover:text-gray-900">
                  <div class="rounded-lg shadow-sm max-w-sm my-light-dark-card my-light-dark-text">
                    <img class="rounded-t-lg w-full h-60" src="/assets/uploads/products/{{ $product->main_image }}" alt=""/>
                    {{-- <img class="rounded-t-lg w-full h-60" src="{{ $product->main_image }}" alt=""/> --}}
                    <div class="p-6">
                      <h5 class="text-lg font-medium mb-2">{{ Str::limit($product->name, 40) }}</h5>
      
                      <div class="flex mb-4 text-sm justify-between">
                        <span class="flex items-center">
                          @php $rate_num = $product->rating @endphp
                          @for ($i = 1; $i <= $rate_num; $i++)
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          @for ($j = $rate_num+1; $j <= 5; $j++)
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          </span>
                          <p class="my-light-dark-text">
                            Sold {{ $product->total_sold == NULL ? 0 : $product->total_sold }}
                          </p>
                      </div>
      
                      <div class="flex">
                        @if($product->disc_price)
                          <p class="text-lg">Rp {{ number_format($product->disc_price, 0, ',', '.') }}</p>
                          <p class="relative left-2 text-xs text-gray-500"><s>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</s></p>
                        @else
                          <div>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</div>
                        @endif                  
                    </div>
                    
                    </div>
                  </div>
                </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- End latest product section --}}
    {{-- <div class="border-1 p-4 shadow-lg rounded-md ml-16"> --}}

    {{-- Start flash sale section --}}
    <div class="flash-sale" style="margin-top: 160px;">
      <div class="container">
            <div class="flex">
              <span class="my-light-dark-text mb-5 mr-2 uppercase font-semibold text-4xl">D'Bengkel</span>
              <h1 class="text-red-500 mb-2 uppercase font-bold text-4xl">Flash Sale %</h1>
            </div>
            <div class="owl-carousel owl-theme p-4 nav-footer-color shadow-lg rounded-md ml-16">
                @foreach ($flash_sale as $product)
                @if($product->status == 1)
                <div class="flex justify-center hover:shadow-lg">
                  <a href="/category/{{ $product->category_slug }}/{{ $product->slug }}" class="text-gray-700 duration-500 hover:text-gray-900">
                  <div class="rounded-lg shadow-sm max-w-sm my-light-dark-card my-light-dark-text">
                    <img class="rounded-t-lg w-full h-60" src="/assets/uploads/products/{{ $product->main_image }}" alt=""/>
                    {{-- <img class="rounded-t-lg w-full h-60" src="{{ $product->main_image }}" alt=""/> --}}
                    <div class="p-6">
                      <h5 class="text-lg font-medium mb-2">{{ Str::limit($product->name, 40) }}</h5>
      
                      <div class="flex mb-4 text-sm justify-between">
                        <span class="flex items-center">
                          @php $rate_num = $product->rating @endphp
                          @for ($i = 1; $i <= $rate_num; $i++)
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          @for ($j = $rate_num+1; $j <= 5; $j++)
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                          @endfor
                          </span>
                          <p class="my-light-dark-text">
                            Sold {{ $product->total_sold == NULL ? 0 : $product->total_sold }}
                          </p>
                      </div>
      
                      <div class="flex">
                        @if($product->disc_price)
                          <p class="text-lg">Rp {{ number_format($product->disc_price, 0, ',', '.') }}</p>
                          <p class="relative left-2 text-xs text-gray-500"><s>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</s></p>
                        @else
                          <div>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</div>
                        @endif                  
                    </div>
                    
                    </div>
                  </div>
                </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
      </div>

@endsection 

@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:5,
            nav:false,
            autoplay:true,
            autoplayTimeout:8500,
            autoplayHoverPause:false,
            responsive:{
                0:{
                    items:1
                },
                400:{
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:3
                },
                1000:{
                    items:4
                },
            }
        })

    </script>
@endsection
