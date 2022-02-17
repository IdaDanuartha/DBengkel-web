@extends('dashboard.layouts.main')

@section('content') 
<div class="container-table rounded-md mx-3 mt-5 mb-5 p-2" style="box-shadow: 10px 10px 35px rgba(0,0,0,0.2)">

<button type="button" class="btn-effect btn-create py-2 px-4 rounded text-md left-10 top-10" data-bs-toggle="modal" data-bs-target="#modal-create"><i class="bi bi-plus text-white"></i> Create</button>

    <div class="flex flex-col mb-20 mt-1">
        <div class="sm:-mx-6 lg:-mx-8">
          <div class="py-5 inline-block w-11/12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto ml-5">
              <table class="min-w-full my-light-dark-text">
                <thead class="my-light-dark-text border-b">
                  <tr>
                    <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      No
                    </th>
                    <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      Action
                    </th>
                    {{-- <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      Image
                    </th> --}}
                    <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      Status
                    </th>
                    <th scope="col" class="text-sm font-semibold px-4 py-3 text-left">
                      Popular
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr class="border-b hovered-table">
                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">{{ $loop->iteration + $categories->firstItem() - 1 }}</td>
                        <td class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                          <button type="button" class="btn-effect btn-edit p-2 rounded text-sm mr-1" value="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#modal-edit"><i class="bi bi-pencil-fill"></i></button>
                          <button type="button" class="btn-effect btn-delete p-2 rounded text-sm" onclick="deleteConfirm(event, {{ $category->id }})"><i class="bi bi-trash-fill"></i></button>
                        </td>
                        {{-- <td class="text-sm font-light px-4 py-2 whitespace-nowrap">
                          <img src="/assets/uploads/categories/{{ $category->main_image }}" width="60px" class="rounded" alt="">
                        </td> --}}
                        <td class="text-sm font-light px-4 py-2 whitespace-nowrap">
                        {{ $category->name }}
                        </td>
                        <td class="text-sm px-4 py-2 whitespace-nowrap font-medium {{ $category->status == 0 ? 'text-red-500':'' }}" style="{{ $category->status == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $category->status == 1 ? 'Active':'Inactive' }}
                        </td>
                        <td class="text-sm px-4 py-2 whitespace-nowrap font-medium {{ $category->popular == 0 ? 'text-red-500':'' }}" style="{{ $category->popular == 1 ? 'color: rgb(34 197 94);':'' }}">
                          {{ $category->popular == 1 ? 'Yes':'No' }}
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
</div>

@include('dashboard.partials.modal-category')

@endsection

@section('script')
  <script src="/assets/dashboard/js/category.js"></script>
@endsection