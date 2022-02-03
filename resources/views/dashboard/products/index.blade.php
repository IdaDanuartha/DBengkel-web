@extends('dashboard.layouts.main')

@section('content') 
    <button type="button" class="btn-effect btn-create py-2 px-4 rounded text-md left-10 top-10" data-bs-toggle="modal" data-bs-target="#modal-create"><i class="bi bi-plus text-white"></i> Create</button>

    <div class="flex flex-col mb-20 mt-3">
        <div class="sm:-mx-6 lg:-mx-8">
          <div class="py-5 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="flex relative">
              <button class="relative" disabled style="left: 30px; top: -2px;"><i class="bi bi-search"></i></button>
              <input type="text" name="search-products" id="search-products" class="my-light-dark-card 
              block w-full mb-2 py-2 px-5 rounded-md shadow-sm focus:outline-none sm:text-sm" placeholder="Search by name, category or price...">
           </div>
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Action
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Image
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Category
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Price
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Special Price
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Quantity
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Status
                    </th>
                    <th scope="col" class="text-sm font-medium px-4 py-2 text-left">
                      Trending
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr class="border-1">
                      <td class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                        <button type="button" class="btn-effect btn-edit p-2 rounded text-sm mr-1" 
                        onclick="editProduct({{ $product->id }})">
                          <i class="bi bi-pencil-fill"></i>
                        </button>

                        <button type="button" class="btn-effect btn-delete p-2 rounded text-sm" onclick="deleteConfirm(event, {{ $product->id }})"><i class="bi bi-trash-fill"></i></button>
                      </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                        <td class="text-sm font-light px-4 py-2 whitespace-nowrap">
                          <img src="/assets/uploads/products/{{ $product->main_image }}" width="60px" class="rounded" alt="">
                        </td>
                        <td class="text-sm font-light px-4 py-2 whitespace-nowrap">
                        {{ $product->name }}
                        </td>
                        <td class="text-sm font-light px-4 py-2 whitespace-nowrap">
                          {{ $product->category->name }}
                        </td>
                        <td class="text-sm text-center font-light px-4 py-2 whitespace-nowrap">
                          Rp {{ number_format($product->ori_price, 0, ',', '.') }}
                        </td>
                        @if($product->disc_price)
                          <td class="text-sm text-center font-light px-4 py-2 whitespace-nowrap">
                            Rp {{ number_format($product->disc_price, 0, ',', '.') }}
                          </td>
                        @else
                          <td class="text-lg text-center font-light px-4 py-2 whitespace-nowrap">
                            -
                          </td>
                        @endif
                        <td class="text-sm text-center font-light px-4 py-2 whitespace-nowrap">
                          {{ $product->quantity }}
                        </td>
                        <td class="text-sm text-center px-4 py-2 whitespace-nowrap font-medium {{ $product->status == 0 ? 'text-red-500':'' }}" style="{{ $product->status == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $product->status == 1 ? 'Active':'Not Active' }}
                        </td>
                        <td class="text-sm text-center px-4 py-2 whitespace-nowrap font-medium {{ $product->trending == 0 ? 'text-red-500':'' }}" style="{{ $product->trending == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $product->trending == 1 ? 'Yes':'No' }}
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="relative left-10 top-10">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>


      <!-- Modal Create -->
<div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header flex justify-center">
        <h5 class="modal-title text-lg font-medium" id="staticBackdropLabel">Create New Product</h5>
      </div>
      <div class="modal-body">
        <form action="/dashboard/product/insert" method="post" enctype="multipart/form-data">
          @csrf
        <div>
          <div class="px-4 py-5 my-light-dark-text space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-4">
              <div class="col-span-6">
                  <label for="name" class="block text-lg font-medium">Product Name</label>
                  <input type="text" name="name" id="name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Product Name" value="{{ old('name') }}">
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
                  <option value="">Test</option>
                  </optgroup>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="ori_price" class="block text-lg font-medium">Price</label>
                <input type="text" name="ori_price" id="ori_price" autocomplete="off" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Rp 50.000" value="{{ old('ori_price') }}">
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
                <input type="text" name="quantity" id="quantity" autocomplete="off" class="mt-1 block w-full py-2 px-3 border input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Stock product..." value="{{ old('quantity') }}">
                @error('quantity')
                    <small class="text-red-500 opacity-75">{{ $message }}</small>   
                @enderror
              </div>

              <div class="col-span-6">
                <label for="description" class="block text-lg">
                  Description
                </label>
                <div class="mt-1">
                <textarea id="description" name="description" rows="10" class="mt-1 block w-full py-2 px-3 input-color rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Type description here...">{{ old('description') }}</textarea>
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
        <button type="button" class="btn-effect btn-gray py-2 px-4 rounded text-sm" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn-effect btn-details py-2 px-4 rounded text-sm">
          Create
        </button>
      </div>
     </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  const productName = document.querySelector('#name');
  const productSlug = document.querySelector('#slug');

  productName.addEventListener('change', function() {
    fetch('/dashboard/products/checkSlug?productName=' + productName.value)
      .then(response => response.json())
      .then(data => productSlug.value = data.slug)
  });

  // Preview Image script
  function previewMainImage() {
      const mainImage = document.querySelector('#main_image');
      const imgPreview = document.querySelector('.img-preview');

      const oFReader = new FileReader;
      oFReader.readAsDataURL(mainImage.files[0]);

      oFReader.onload = function(oFRevent) {
          imgPreview.src = oFRevent.target.result;
      }
  }

  function editProduct(id){
    document.location.href = '/dashboard/product/edit/' + id;
  }

  
  function deleteConfirm(e, productId) {
      e.preventDefault();

      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = '/dashboard/product/destroy/' + productId;
            // Swal.fire(
            //   'Deleted!',
            //   '{{ session("status") }}',
            //   'success'
            // )
          } else {
            return false;
          }

      })
  }
</script>
@endsection
