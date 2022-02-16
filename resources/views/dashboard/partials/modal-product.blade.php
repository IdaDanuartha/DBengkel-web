<!-- Modal Create -->
<div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content my-light-dark-card">
        <div class="modal-header flex justify-center">
            <h5 class="modal-title text-lg font-medium" id="staticBackdropLabel">Create New Product</h5>
        </div>
        <div class="modal-body">
            <form action="/dashboard/product/insert" onsubmit="submitForm('Creating')" method="post" enctype="multipart/form-data">
            @csrf
            <div>
            <div class="px-4 py-5 my-light-dark-text space-y-6 sm:p-6">
                <div class="mb-5">
                {{-- <small class="text-xs text-gray-500">Note: Uploading images must be at least 1 image and maximum 4 images with the file formats (png, jpg, jpeg or svg).</small> --}}
                <label class="block text-2xl font-medium">Product Image</label>
                <small class="text-xs- text-gray-400">Note: Uploading image is required, Don't upload file other than image, Image size must be under 2 mb</small>

                <div class="mt-3 flex flex-col">
                    <label class="cursor-pointer" for="main_image">
                    <img src="/assets/img/upload.svg" width="50%" height="200px" class="rounded overflow-hidden img-preview" id="img_preview" alt="">
                    </label>
                    <div class="my-3 w-96">
                        <input class="form-control block w-full text-base font-normal text-gray-700 bg-clip-padding rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="main_image" name="main_image" onchange="previewMainImage('#main_image', '#img_preview')" required>
                        @error('main_image')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                        @enderror
                    </div>
                    </div>

                </div>
                <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6">
                    <label for="name" class="block text-lg font-medium">Product Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Product Name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>
                
                <input type="hidden" name="slug" id="slug">

                <div class="col-span-6 sm:col-span-3">
                    <label for="category_id" class="block text-lg">Category</label>
                    <select id="category_id" name="category_id" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm">
                    <optgroup label="Select Category">
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                    </optgroup>
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="ori_price" class="block text-lg font-medium">Price</label>
                    <input type="text" name="ori_price" id="ori_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Rp 50.000" value="{{ old('ori_price') }}">
                    @error('ori_price')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="disc_price" class="block text-lg font-medium">Special Price</label>
                    <input type="text" name="disc_price" id="disc_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Rp 35.000" value="{{ old('disc_price') }}">
                    @error('disc_price')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="quantity" class="block text-lg font-medium">Stock</label>
                    <input type="text" name="quantity" id="quantity" autocomplete="off" class="mt-1 block w-full py-2 px-3 border input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Stock product..." value="{{ old('quantity') }}">
                    @error('quantity')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="description" class="block text-lg">
                    Description
                    </label>
                    <div class="mt-1">
                    <textarea id="description" name="description" rows="12" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Type description here...">{{ old('description') }}</textarea>
                    {{-- <small class="text-xs text-gray-400">Note: You can type description with HTML tag</small> --}}
                    </div>
                    @error('description')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                </div>
                
                <div class="flex">
                    <div class="flex items-start mr-3">
                    <div class="flex items-center h-5">
                        <input id="status" name="status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked>
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

        </div>
        <div class="modal-footer">
            <button type="reset" class="btn-effect btn-gray py-2 px-4 rounded text-sm" data-bs-dismiss="modal">
            Close
            </button>
            <button type="submit" class="btn-effect btn-details py-2 px-4 rounded text-sm btn-submit">
            Create
            </button>
        </div>
        </form>
        </div>
        </div>
    </div>
</div>
      
{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content my-light-dark-card">
        <div class="modal-header flex justify-center">
            <h5 class="modal-title text-lg font-medium" id="staticBackdropLabel">Edit Product</h5>
        </div>
        <div class="modal-body">
            <form id="edit-form" onsubmit="submitForm('Saving')" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
            <div class="px-4 py-5 my-light-dark-text space-y-6 sm:p-6">
                <div class="mb-5">
                <label class="block text-2xl font-medium">Product Image</label>
                <small class="text-xs- text-gray-400">Note: Uploading image is required, Don't upload file other than image, Image size must be under 2 mb</small>

                <div class="mt-3 flex flex-col">
                    <label class="cursor-pointer" for="main_image">
                    <img src="/assets/img/upload.svg" width="50%" height="200px" class="rounded overflow-hidden img-preview" id="edit_img_preview" alt="">
                    </label>
                    <div class="my-3 w-96">
                        <input class="form-control block w-full text-base font-normal text-gray-700 bg-clip-padding rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="edit_main_image" name="main_image" onchange="previewMainImage('#edit_main_image', '#edit_img_preview')">
                        @error('main_image')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                        @enderror
                    </div>
                    </div>

                </div>
                <div class="grid grid-cols-6 gap-4">
                <div class="col-span-6">
                    <label for="name" class="block text-lg font-medium">Product Name</label>
                    <input type="text" name="name" id="edit_name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Product Name">
                    @error('name')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>
                
                <input type="hidden" name="slug" id="edit_slug">

                <div class="col-span-6 sm:col-span-3">
                    <label for="category_id" class="block text-lg">Category</label>
                    <select id="edit_category_id" value="7" name="category_id" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm">
                    <optgroup label="Select Category" id="optgroup_category">
                        
                    </optgroup>
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="ori_price" class="block text-lg font-medium">Price</label>
                    <input type="text" name="ori_price" id="edit_ori_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Rp 50.000">
                    @error('ori_price')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="disc_price" class="block text-lg font-medium">Special Price</label>
                    <input type="text" name="disc_price" id="edit_disc_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Rp 35.000">
                    @error('disc_price')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="quantity" class="block text-lg font-medium">Stock</label>
                    <input type="text" name="quantity" id="edit_quantity" autocomplete="off" class="mt-1 block w-full py-2 px-3 border input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Stock product...">
                    @error('quantity')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="description" class="block text-lg">
                    Description
                    </label>
                    <div class="mt-1">
                    <textarea id="edit_description" name="description" rows="10" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" required placeholder="Type description here..."></textarea>
                    {{-- <small class="text-xs text-gray-400">Note: You can type description with HTML tag</small> --}}
                    </div>
                    @error('description')
                        <small class="text-red-500 opacity-75">{{ $message }}</small>   
                    @enderror
                </div>

                </div>
                
                <div class="flex">
                    <div class="flex items-start mr-3">
                    <div class="flex items-center h-5">
                        <input id="edit_status" name="status" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-md">
                        <label for="status" class="font-medium">Status</label>
                    </div>
                    </div>
                    <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="edit_trending" name="trending" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-md">
                        <label for="trending" class="font-medium">Trending</label>
                    </div>
                    </div>
                </div>

                </div>

        </div>
        <div class="modal-footer">
            <button type="reset" class="btn-effect btn-gray py-2 px-4 rounded text-sm" data-bs-dismiss="modal">
            Close
            </button>
            <button type="submit" class="btn-effect btn-details py-2 px-4 rounded text-sm btn-submit">
            Save
            </button>
        </div>
        </form>
        </div>
        </div>
    </div>
</div>