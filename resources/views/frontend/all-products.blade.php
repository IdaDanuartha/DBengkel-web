@extends('frontend.layouts.main')

@section('main-content')
    {{-- Start Sort by --}}
    <div class="container pt-40">
      <div class="rounded my-light-dark-card p-4 flex items-center font-medium mb-10 border-1 border-gray-300">
            <h5 class="mr-5 flex text-xl my-light-dark-text"><i class="bi bi-funnel mr-1"></i> Filter</h5>
                <form action="/all-products" class="flex">
                  @csrf
                  <div class="my-2 mx-1 xl:w-96">
                    <select class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      text-base
                      font-normal
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-700
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-white
                      focus:outline-none" style="color: #333" name="category">
                        <option value="all" selected>All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="my-2 ml-1 mr-3 xl:w-96">
                    <select class="form-select appearance-none
                      block
                      w-full
                      px-3
                      py-2
                      text-base
                      font-normal
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-700
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-white
                      focus:outline-none" style="color: #333" name="filter">
                        <option value="latest" selected>Latest</option>
                        <option value="popular">Popularity</option>
                        <option value="high-to-low">Price - High to Low</option>
                        <option value="low-to-high">Price - Low to High</option>
                    </select>
                  </div>
                  
                <button type="submit" class="h-10 px-4 py-2 mt-2 apply-btn">Apply</button>
              </form>

      </div>
    {{-- End sort by --}}

    @if(request('search'))
      <p class="text-gray-400 text-2xl mt-3.5 mb-10"><i class="bi bi-lightbulb mr-1"></i>Search result for <span class="text-red-400">'{{ request('search') }}'</span></p>
    @endif
    @if($products->count() > 0)
        <div class="mb-10 mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
          @foreach ($products as $product)
          @if($product->status == 1)
          <div class="flex justify-center">
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
          @endif
          @endforeach
      </div>

      @else
        <h1 class="text-center text-3xl text-gray-300 my-20 sm:text-4xl md:text-4xl">No results found, try searching again</h1>
      @endif

        {{ $products->links() }}

      </div>
@endsection