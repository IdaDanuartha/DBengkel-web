@extends('frontend.layouts.main')

@section('main-content')
    {{-- Start Sort by --}}
    <div class="container pt-36">
      {{-- Breadcrumbs
      <nav class="nav-footer-color py-3 px-4 font-bold mb-5 rounded" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
          <li class="flex items-center">
            <a href="/" class="my-light-dark-text">Home <span class="mx-2"> > </span></a>
          </li>
          <li class="flex items-center">
            <p class="text-gray-500">All Products</p>
          </li>
        </ol>
      </nav> --}}

      @if(request('search'))
        <p class="text-gray-400 text-xl mb-10"><i class="bi bi-lightbulb mr-1"></i>Search result for <span class="text-red-400">'{{ request('search') }}'</span></p>
      @endif

      <div class="rounded my-light-dark-card p-4 flex items-center font-medium mb-10 border-1 border-gray-300">
            <h5 class="mr-5 flex text-xl my-light-dark-text"><i class="bi bi-filter mr-1"></i> Sort By</h5>
                <form action="/all-products" class="flex flex-wrap">
                  @csrf
                  <input type="hidden" name="search" value="{{ request('search') }}">

                  <div class="my-3 ml-3 mr-1">
                    <select class="form-select appearance-none
                      block
                      w-full
                      pl-2
                      pr-6
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
                      <optgroup label="Category">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                          @if(request('category') === $category->slug)

                            <option value="{{ $category->slug }}" selected>{{ $category->name }}</option>
                          @else

                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    </select>
                  </div>

                  <div class="m-3">
                    <select class="form-select appearance-none
                      block
                      w-full
                      pl-2
                      pr-6
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
                      <optgroup label="Filter">
                        <option value="">No Filter</option>
                        <option value="latest" {{ $filter == 'latest' ? 'selected':'' }}>Latest</option>
                        <option value="popular" {{ $filter == 'popular' ? 'selected':'' }}>Popularity</option>
                        <option value="lowest-price" {{ $filter == 'lowest-price' ? 'selected':'' }}>Lowest Price</option>
                        <option value="highest-price" {{ $filter == 'highest-price' ? 'selected':'' }}>Highest Price</option>
                    </optgroup>
                    </select>
                  </div>
                  
                <button type="submit" class="px-4 py-2 h-10 mt-3 apply-btn">Apply</button>
              </form>

      </div>
    {{-- End sort by --}}

    @if($products->count() > 0)
        <div class="mb-10 mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
          @foreach ($products as $product)
          @if($product->status == 1)
          <div class="flex justify-center">
            <div class="rounded-lg shadow-md my-light-dark-card max-w-sm">
              <a href="/category/{{ $product->category_slug }}/{{ $product->slug }}">
                <img class="rounded-t-lg w-full h-60" src="/assets/uploads/products/{{ $product->main_image }}" alt=""/>
                {{-- <img class="rounded-t-lg w-full h-60" src="{{ $product->main_image }}" alt=""/> --}}
      
              <div class="p-6">
                <h5 class="my-light-dark-text text-md font-medium mb-2">{{ Str::limit($product->name, 40) }}</h5>

                <div class="flex mb-4 text-sm justify-between">
                  <span class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                  </span>
                  <p class="my-light-dark-text">
                    No Review
                  </p>
                </div>

                <div class="flex">
                  @if($product->disc_price)
                    <p class="text-sm md:text-lg my-light-dark-text">Rp. {{ number_format($product->disc_price, 0, ',', '.') }}</p>
                    <p class="relative left-2 text-xs text-gray-500"><s>Rp {{ number_format($product->ori_price, 0, ',', '.') }}</s></p>
                  @else
                    <div class="my-light-dark-text">Rp {{ number_format($product->ori_price, 0, ',', '.') }}</div>
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