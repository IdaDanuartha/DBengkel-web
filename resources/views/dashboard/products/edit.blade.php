@extends('dashboard.layouts.main')

@section('content')
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 mb-12 md:mt-0 md:col-span-2">
            <form action="/dashboard/product/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div>
                <div class="px-4 py-5 my-light-dark-text space-y-12 sm:p-6">
                  <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="block text-lg font-medium">Product Name</label>
                        <input type="text" name="name" id="name" autocomplete="off" class="mt-1 block w-full py-2 px-3 rounded-md focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="Product Name" value="{{ $product->name }}">
                        @error('name')
                            <small class="text-red-500 opacity-75">{{ $message }}</small>   
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="slug" class="block text-lg font-medium">Slug</label>
                      <input type="text" name="slug" id="slug" autocomplete="off" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="product-slug" value="{{ $product->slug }}">
                      @error('slug')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="category_id" class="block text-lg">Category</label>
                      <select id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color">
                        <optgroup label="Select Category">
                        @foreach ($categories as $category)
                        @if ($product->category_id == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                      </optgroup>
                      </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="ori_price" class="block text-lg font-medium">Original Price</label>
                      <input type="text" name="ori_price" id="ori_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="Rp 50.000" value="{{ $product->ori_price }}">
                      @error('ori_price')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="disc_price" class="block text-lg font-medium">Discount</label>
                      <input type="text" name="disc_price" id="disc_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="Rp 35.000" value="{{ $product->disc_price }}">
                      @error('disc_price')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="quantity" class="block text-lg font-medium">Quantity</label>
                      <input type="text" name="quantity" id="quantity" autocomplete="off" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="Ex: 67" value="{{ $product->quantity }}">
                      @error('quantity')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>
                    <div class="col-span-6">
                      <label for="about" class="block text-lg">
                        Description
                      </label>
                      <div class="mt-1">
                      <textarea id="about" name="description" rows="10" class="mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm input-color" placeholder="Type description here...">{{ $product->description }}</textarea>
                      <small class="text-xs text-gray-400">Note: You can type description with HTML tag</small>
                      </div>
                      @error('description')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>
                  </div>

                    <div class="mt-6">
                    <label class="block text-lg mb-2">
                      Product Image
                    </label>
                    <div class="mt-3 flex flex-col">
                      {{-- @if ($product->main_image) --}}
                        <img src="/assets/uploads/products/{{ $product->main_image }}" width="75%" height="350px" class="rounded img-preview" alt="">
                       {{-- @else
                        <img src="/assets/img/upload.svg" width="75%" height="350px" class="rounded img-preview" alt="">
                      @endif --}}
                        <div class="my-3 ml-3 w-96">
                          <input class="form-control block w-full px-3 py-1.5 text-base font-normal bg-clip-padding rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="main_image" name="main_image" onchange="previewMainImage()">
                          @error('main_image')
                            <small class="text-red-500 opacity-75">{{ $message }}</small>   
                          @enderror
                        </div>
                      </div>

                    </div>
                    <div class="flex">
                      <div class="flex items-start mr-3">
                        <div class="flex items-center h-5">
                          <input id="status" name="status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ $product->status == '1' ? 'checked':'' }}>
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="status" class="font-medium text-gray-700">Status</label>
                        </div>
                      </div>
                      <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="trending" name="trending" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{ $product->trending == '1' ? 'checked':'' }}>
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="trending" class="font-medium text-gray-700">Trending</label>
                        </div>
                      </div>
                    </div>

                    </div>

                  </div>

                <div class="px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="btn-effect btn-details py-3 px-4 rounded text-sm">
                    Save Changes
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
@endsection

