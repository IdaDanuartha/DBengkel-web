@extends('dashboard.layouts.main')

@section('content') 
    <a href="/dashboard/category/create" class="py-2 px-3 ml-5 rounded bg-blue-500 text-white relative top-10"><ion-icon name="add-outline" class="relative top-0.5"></ion-icon> Create</a>

    <div class="flex flex-col my-20">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block w-11/12 sm:px-6 lg:px-8">
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
                      Description
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Status
                    </th>
                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                      Popular
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
                  @foreach ($categories as $category)
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $loop->iteration }}</td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ $category->name }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                        {{ $category->description}}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap font--medium {{ $category->status == 0 ? 'text-red-500':'' }}" style="{{ $category->status == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $category->status == 1 ? 'Active':'Not Active' }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap font--medium {{ $category->popular == 0 ? 'text-red-500':'' }}" style="{{ $category->popular == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $category->popular == 1 ? 'Yes':'No' }}
                        </td>
                        <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                          <img src="/assets/uploads/categories/{{ $category->main_image }}" width="60px" class="rounded img-preview" alt="">
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a href="/dashboard/category/edit/{{ $category->id }}" class="py-1 px-3 rounded" style="background-color: rgb(253 186 116);"><ion-icon name="create-outline" class="relative top-0.5 right-1"></ion-icon>Edit</a>
                            <a href="#" class="py-1 px-3 bg-red-400 text-white rounded" onclick="deleteConfirm(event, {{ $category->id }})"><ion-icon name="trash-outline" class="relative top-0.5 right-1"></ion-icon>Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="relative left-10 top-10">
              {{ $categories->links() }}
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
          document.location.href = '/dashboard/category/destroy/' + productId;
          {{-- Swal.fire(
              'Deleted',
              '{{ session("delete") }}',
              'success'
              ) --}}
          } else {
              return false;
          }

      })
  }

@endsection