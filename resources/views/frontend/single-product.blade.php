@extends('frontend.layouts.main')

@section('main-content')

    <section class="text-gray-700 body-font overflow-hidden body-color">
        <div class="container px-5 py-24 mx-auto pt-40">
          <div class="lg:w-4/5 mx-auto flex flex-wrap product_data my-light-dark-text">
            {{-- <img alt="Cover image" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-100" src="/assets/uploads/products/{{ $product->main_image }}"> --}}
            <img alt="Cover image" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-100" src="{{ $product->main_image }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <a href="/all-products?category={{ $product->category->slug }}" class="text-sm duration-500 my-light-dark-text hover:text-gray-400 tracking-widest">{{ $product->category->name }}</a>
              <h1 class="my-light-dark-text text-3xl title-font font-medium mb-1">{{ $product->name }}</h1>
              <div class="flex mb-4">
                <span class="flex items-center">
                  @php $rate_num = number_format($rating_value) @endphp
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
                  @if($ratings->count() > 0)
                    @if($ratings->count() == 1)
                      <a href="#all-reviews" class="my-light-dark-text ml-2">{{ $user_review->count() }} Review</a>
                    @else
                      <a href="#all-reviews" class="my-light-dark-text ml-2">{{ $user_review->count() }} Reviews</a>
                    @endif
                  @else 
                    <span class="my-light-dark-text text-sm ml-2">No Review</span>
                  @endif
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
                        <input class="product_quantity w-20 h-8 text-md text-center my-light-dark-card my-light-dark-text border-1 border-slate-400" id="quantity" type="number" min="1" max="{{ $product->quantity }}" value="1">
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
              </div>
            </div>
          </div>

          <hr class="my-20">

          {{-- Related Products --}}
          <h1 class="text-3xl font-medium mt-16 mb-5 related-text">Related Products</h1>
          <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-3">
            @foreach ($related_products as $product)
            <div class="flex">
              <div class="rounded-lg shadow-md my-light-dark-card max-w-sm">
                <a href="/category/{{ $product->category->slug }}/{{ $product->slug }}">
                  {{-- <img class="rounded-t-lg w-full h-60" src="/assets/uploads/products/{{ $product->main_image }}" alt=""/> --}}
                  <img class="rounded-t-lg w-full h-60" src="{{ $product->main_image }}" alt=""/>
        
                <div class="p-6">
                  <h5 class="my-light-dark-text text-xl font-medium mb-2">{{ $product->name }}</h5>
  
                  <div class="flex mb-4 text-sm justify-between">
                    <span class="flex items-center">
                      {{-- @php $rate_num = number_format($rating_value) @endphp
                    @for ($i = 1; $i <= $rate_num; $i++)
                      <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                      </svg>
                    @endfor
                    @for ($j = $rate_num+1; $j <= 5; $j++)
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                      </svg>
                    @endfor --}}
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
                    </span>
                    <p class="my-light-dark-text">
                      Sold 25
                    </p>
                  </div>
  
                  <div class="flex">
                    @if($product->disc_price)
                      <p class="text-lg my-light-dark-text">Rp. {{ $product->disc_price }}</p>
                      <p class="relative left-2 text-xs text-gray-500"><s>Rp. {{ $product->ori_price }}</s></p>
                    @else
                      <div class="my-light-dark-text">Rp. {{ $product->ori_price }}</div>
                    @endif                  
                </div>
                
                </div>
              </div>
            </a>
            </div>
            @endforeach

          </div>


          <div class="flex flex-col">
            <div>

  @if(auth()->user()->role_as == 0)
  <button class="block mt-20 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button" data-modal-toggle="small-modal">
   <i class="bi bi-star-fill mr-1"></i> Leave a review
    </button>
  @endif
  
  <!-- Small Modal -->
<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 justify-center items-center md:inset-0 h-modal sm:h-full" id="small-modal" style="z-index: 10000;">
  <div class="relative px-4 w-full max-w-md h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative my-light-dark-card rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex justify-between items-center p-3 rounded-t border-b dark:border-gray-600">
              <h3 class="text-xl font-medium my-light-dark-text">
                  Review {{ $product->name }}
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
              </button>
          </div>
          <!-- Modal body -->
          <div class="p-6 flex flex-col">
              <form action="/add-review" method="POST" class="text-center">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            @if ($review)
              @for ($i = 1; $i <= $review->stars_rated; $i++)
                <input type="checkbox" name="product_rating" class="star-input" checked id="{{ $i }}" value="{{ $i }}"/>
                <label class="star-input-label" for="{{ $i }}">{{ $i }}
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star orange"></i>
                </label>
              @endfor
              @for ($j = $review->stars_rated+1; $j <= 5; $j++)
                <input type="checkbox" name="product_rating" class="star-input" id="{{ $j }}" value="{{ $j }}"/>
                <label class="star-input-label" for="{{ $j }}">{{ $j }}
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star orange"></i>
                </label>
              @endfor
            @else
              <input type="checkbox" name="product_rating" class="star-input" checked id="1" value="1"/>
              <label class="star-input-label" for="1">1
                <i class="fa fa-star"></i>
                <i class="fa fa-star orange"></i>
              </label>
              <input type="checkbox" name="product_rating" class="star-input" id="2" value="2"/>
              <label class="star-input-label" for="2">2
                <i class="fa fa-star"></i>
                <i class="fa fa-star orange"></i>
              </label>
              <input type="checkbox" name="product_rating" class="star-input" id="3" value="3"/>
              <label class="star-input-label" for="3">3
                <i class="fa fa-star"></i>
                <i class="fa fa-star orange"></i>
              </label>
              <input type="checkbox" name="product_rating" class="star-input" id="4" value="4"/>
              <label class="star-input-label" for="4">4
                <i class="fa fa-star"></i>
                <i class="fa fa-star orange"></i>
              </label>
              <input type="checkbox" name="product_rating" class="star-input" id="5" value="5"/>
              <label class="star-input-label" for="5">5
                <i class="fa fa-star"></i>
                <i class="fa fa-star orange"></i>
              </label>
            @endif
          <textarea id="user_review" name="user_review" rows="7" class="mt-3 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Type your review here...">{{ $review->user_review ?? old('user_review') }}</textarea>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
              <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Submit</button>
              <button data-modal-toggle="small-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Review later</button>
          </div>
        </form>
      </div>
  </div>
</div>
      </div>

        <div class="flex flex-col pt-24" id="all-reviews">
          <h1 class="my-5 text-xl text-gray-500">All Reviews ({{ $user_review->count() }})</h1>
          @foreach($user_review as $review)
          <div class="card mb-5 w-full border-0">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="flex mb-3">
                  <img class="rounded-full mr-2" src="https://picsum.photos/50" alt="">
                  <div class="flex flex-col">
                    <p>{{ $review->user->first_name . " " . $review->user->last_name }}</p>
                    <p class="text-gray-400 text-sm">
                      {{ $review->created_at->diffForHumans() }}
                      @if ($review->user_id == Auth::id())
                        <button class="mx-2 text-gray-700 duration-400 underline" type="button" data-modal-toggle="small-modal">
                          Edit
                        </button>
                     @endif
                    </p>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body relative -top-3">
                  <span class="flex mb-2">
                    @php $user_rated = $review->stars_rated; @endphp
                  @for ($i = 1; $i <= $user_rated; $i++)
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                  @endfor
                  @for ($j = $user_rated+1; $j <= 5; $j++)
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                  @endfor
                  </span>
                  <p class="card-text">{{ $review->user_review }}</p>
                </div>
              </div>
            </div>
            <hr>
          </div>
          @endforeach
          
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