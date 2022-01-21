@extends('frontend.layouts.main')

@section('main-content')

    <section class="text-gray-700 body-font overflow-hidden body-color">
        <div class="container px-5 py-24 mx-auto pt-40">
          <div class="lg:w-4/5 mx-auto flex flex-wrap product_data my-light-dark-text">
            <img alt="Cover image" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-100" src="/assets/uploads/products/{{ $product->main_image }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <a href="/all-products?category={{ $product->category->slug }}" class="text-sm duration-500 my-light-dark-text hover:text-gray-400 tracking-widest">{{ $product->category->name }}</a>
              <h1 class="my-light-dark-text text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
              <div class="flex mb-4">
                <span class="flex items-center">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <span class="my-light-dark-text ml-3">4 Reviews</span>
                </span>
                <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                  <p>Sold 34</p>
                </span>
                <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                    @if ($product->quantity)
                        <span class="mr-1">Stock </span>
                        {{ $product->quantity }}
                    @else
                        <p class="text-red-500 font-semibold">
                            Out of Stock
                        </p>
                    @endif
                </span>
              </div>
              <p class="leading-relaxed font-light">{{ $product->description }}</p>
              <div class="mt-6 pb-5 border-b-2 border-gray-200 mb-5">
                <div class="flex">
                  <span class="mr-3 font-semibold relative top-1">Quantity</span>
                  <div class="relative">
                    <div class="flex w-24">
                        <input type="hidden" value="{{ $product->id }}" class="product_id">

                        <button id="minus" disabled class="text-2xl px-2.5 my-light-dark-text duration-400">-</button>
                        <input class="product_quantity w-12 text-md text-center my-light-dark-card my-light-dark-text border-1 border-slate-400" id="quantity" type="number" min="1" max="{{ $product->quantity }}" value="1">
                        <button id="plus" class="text-2xl px-2.5 my-light-dark-text duration-400">+</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex">
                <span class="flex font-medium text-2xl text-gray-900">
                  @if($product->disc_price)
                    <p class="my-light-dark-text text-lg sm:text-md">Rp. {{ $product->disc_price }}</p>
                    <p class="relative left-2 text-xs text-gray-400"><s>Rp. {{ $product->ori_price }}</s></p>
                  @else
                    <div class="my-light-dark-text">Rp. {{ $product->ori_price }}</div>
                  @endif  
                </span>

                @if($product->quantity)
                <button class="addToCart flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded lg"><i class="bi bi-cart ml-1"></i> Add to Cart</button>
                @else
                <button class="addToCart cursor-not-allowed flex ml-auto text-white bg-red-500 border-0 py-2 px-6 rounded lg" disabled><i class="bi bi-cart ml-1"></i> Add to Cart</button>
                @endif
                {{-- <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                  </svg>
                </button> --}}
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection

@section('scripts')
    <script>
      // Quantity Counter Single Product
document.querySelector("#minus").setAttribute("disabled", "disabled");

let valueCount;

// Plus Button
document.querySelector("#plus").addEventListener("click", function() {
    valueCount = document.getElementById("quantity").value;

    valueCount++;

    document.getElementById("quantity").value = valueCount;

    if( valueCount > 1 ) {
        document.querySelector("#minus").removeAttribute("disabled", "disabled");
    }
})

// Minus Button
document.querySelector("#minus").addEventListener("click", function() {
    valueCount = document.getElementById("quantity").value;

    valueCount--;

    document.getElementById("quantity").value = valueCount;

    if( valueCount <= 1 ) {
        document.querySelector("#minus").setAttribute("disabled", "disabled");
    }
})
    </script>
@endsection