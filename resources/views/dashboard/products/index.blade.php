@extends('dashboard.layouts.main')

@section('content') 
    <a href="/dashboard/product/create" class="btn-effect btn-create py-2 px-4 rounded text-md left-10 top-10"><ion-icon name="add-outline" class="relative top-0.5"></ion-icon> Create</a>

    <div class="flex flex-col my-20">
        <div class="sm:-mx-6 lg:-mx-8">
          <div class="py-5 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="bg-gray-800 text-white">
                  <tr>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Category
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Price
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Discount
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Quantity
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Status
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Trending
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Image
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                        Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}</td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ $product->name }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                          {{ $product->category->name }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ $product->ori_price}}
                        </td>
                        @if($product->disc_price)
                          <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                            {{ $product->disc_price}}
                          </td>
                        @else
                          <td class="text-lg font-light px-6 py-4 whitespace-nowrap">
                            -
                          </td>
                        @endif
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                          {{ $product->quantity }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap font--medium {{ $product->status == 0 ? 'text-red-500':'' }}" style="{{ $product->status == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $product->status == 1 ? 'Active':'Not Active' }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap font--medium {{ $product->trending == 0 ? 'text-red-500':'' }}" style="{{ $product->trending == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $product->trending == 1 ? 'Yes':'No' }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                          <img src="/assets/uploads/products/{{ $product->main_image }}" width="60px" class="rounded img-preview" alt="">
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a href="/dashboard/product/edit/{{ $product->id }}" class="btn-effect btn-edit py-2 px-4 rounded text-xs"><ion-icon name="create-outline" class="relative top-0.5 right-1"></ion-icon>Edit</a>
                            <a href="#" class="btn-effect btn-delete py-2 px-4 rounded text-xs" onclick="deleteConfirm(event, {{ $product->id }})"><ion-icon name="trash-outline" class="relative top-0.5 right-1"></ion-icon>Delete</a>
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
@endsection

@section('script')
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
@endsection
