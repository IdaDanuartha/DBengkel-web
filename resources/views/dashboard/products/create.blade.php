@extends('dashboard.layouts.main')

@section('content')
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="mt-5 mb-12 md:mt-0 md:col-span-2">
            <form action="/dashboard/product/insert" method="post" enctype="multipart/form-data">
                @csrf
              <div>
                <div class="px-4 py-5 my-light-dark-text space-y-6 sm:p-6">
                  <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="name" class="block text-lg font-medium">Product Name</label>
                        <input type="text" name="name" id="name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Product Name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-red-500 opacity-75">{{ $message }}</small>   
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="slug" class="block text-lg font-medium">Slug</label>
                      <input type="text" name="slug" id="slug" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="product-slug" value="{{ old('slug') }}">
                      @error('slug')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="category_id" class="block text-lg">Category</label>
                      <select id="category_id" name="category_id" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm">
                        @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="ori_price" class="block text-lg font-medium">Original Price</label>
                      <input type="number" name="ori_price" id="ori_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Ex: 45000" value="{{ old('ori_price') }}">
                      @error('ori_price')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="disc_price" class="block text-lg font-medium">Discount</label>
                      <input type="number" name="disc_price" id="disc_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Ex: 35000" value="{{ old('disc_price') }}">
                      @error('disc_price')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="quantity" class="block text-lg font-medium">Quantity</label>
                      <input type="number" name="quantity" id="quantity" autocomplete="off" class="mt-1 block w-full py-2 px-3 border input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Ex: 67" value="{{ old('quantity') }}">
                      @error('quantity')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                    <div class="col-span-6">
                      <label for="about" class="block text-lg">
                        Description
                      </label>
                      <div class="mt-1">
                      <textarea id="about" name="description" rows="10" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Type description here...">{{ old('description') }}</textarea>
                      {{-- <small class="text-xs text-gray-400">Note: You can type description with HTML tag</small> --}}
                      </div>
                      @error('description')
                          <small class="text-red-500 opacity-75">{{ $message }}</small>   
                      @enderror
                    </div>

                  </div>

                    <div class="mt-6">
                    {{-- <small class="text-xs text-gray-500">Note: Uploading images must be at least 1 image and maximum 4 images with the file formats (png, jpg, jpeg or svg).</small> --}}
                    <label for="main_image" class="block text-2xl font-medium">Product Image</label>
                    <small class="text-xs- text-gray-400">Note: Uploading image is required, Don't upload file other than image, Image size must be under 2 mb</small>
                    <div class="mt-3 flex flex-col">
                      <img src="/assets/img/upload.svg" width="75%" height="350px" class="rounded overflow-hidden img-preview" alt="">
                        <div class="my-3 ml-3 w-96">
                          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="main_image" name="main_image" onchange="previewMainImage()">
                          @error('main_image')
                            <small class="text-red-500 opacity-75">{{ $message }}</small>   
                          @enderror
                        </div>
                      </div>

                      {{-- <div class="mt-10 flex flex-col">
                        <img src="/assets/img/upload.svg" width="200px" class="rounded img-preview2" alt="">
                        <div class="mb-3 ml-3 w-96">
                          <small class="text-xl ml-3 text-gray-800">Sub Images</small>
                          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0
                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="image2" name="image2" onchange="previewImage2()">
                          @error('image2')
                            <small class="text-red-500 opacity-75">{{ $message }}</small>   
                          @enderror
                        </div>
                      </div> --}}

                    </div>
                    <div class="flex">
                      <div class="flex items-start mr-3">
                        <div class="flex items-center h-5">
                          <input id="status" name="status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-md">
                          <label for="status" class="font-medium">Status</label>
                        </div>
                      </div>
                      <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="trending" name="trending" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-md">
                          <label for="trending" class="font-medium">Trending</label>
                        </div>
                      </div>
                    </div>

                  </div>

                <div class="px-4 py-3 text-right sm:px-6">
                  <div class="px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      Create
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
@endsection

