@extends('frontend.layouts.main')

@section('main-content')
        <!-- Start Category Product section -->
    
        <section class="category-products pt-40 pb-6 text-4xl uppercase font-medium" id="featured-product">
            <div class="container">
                <h2 class="mb-5">All Category</h2>                   
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                        @foreach ($categories as $category)
                        @if($category->status == 1)
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg my-light-dark-card max-w-sm">
                              <a href="/all-products?category={{ $category->slug }}">
                                {{-- <img class="rounded-t-lg w-full h-60" src="/assets/uploads/categories/{{ $category->main_image }}" alt=""/> --}}
                                <img class="rounded-t-lg w-full h-60" src="{{ $category->main_image }}" alt=""/>
                              <div class="p-6">
                                <h5 class="my-light-dark-text text-xl font-medium mb-2">{{ $category->name }}</h5>
                                <p class="my-light-dark-text text-xs mb-4">
                                  {{ $category->description }}
                                </p>
                              </div>
                            </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
            </div>

            <div class="container">
                <h2 class="mb-5 mt-20">Popular Category</h2>
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                    @foreach ($popular_categories as $category)
                    @if($category->status == 1)
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg my-light-dark-card my-light-dark-text max-w-sm">
                        <a href="/all-products?category={{ $category->slug }}">
                            {{-- <img class="rounded-t-lg w-full h-60" src="/assets/uploads/categories/{{ $category->main_image }}" alt=""/> --}}
                            <img class="rounded-t-lg w-full h-60" src="{{ $category->main_image }}" alt=""/>
                            <div class="p-6">
                            <h5 class="my-light-dark-text text-xl font-medium mb-2">{{ $category->name }}</h5>
                            <p class="my-light-dark-text text-xs mb-4">
                                {{ $category->description }}
                            </p>
                            </div>
                        </a>
                    </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    
        <!-- End Category Product Section -->

@endsection