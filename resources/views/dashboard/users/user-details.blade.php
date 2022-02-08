@extends('dashboard.layouts.main')

@section('content')
<div class="p-5">
    <div class="md:col-span-2">
        <div class="shadow-md overflow-hidden sm:rounded-md">
          <div class="px-4 pb-5 my-light-dark-card my-light-dark-text sm:p-6">
            <div class="flex justify-between mb-5 mt-2">
                <a href="/dashboard/users-registered" class="px-4 py-2 btn-effect btn-gray rounded text-white text-sm"><i class="bi bi-arrow-left mr-2"></i> Back</a>

            <form action="/dashboard/users-registered/update-role/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="px-4 py-2 btn-effect btn-details rounded text-white text-sm">Save Changes</button>
              </div>
            <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 m-auto">
                @if ($user->image)
                    <img src="/assets/uploads/users/{{ $user->image }}" class="rounded-full" style="width: 150px; height: 150px; border: 5px solid #555; alt="">
                @else
                    <img src="/assets/img/user-profile.png" class="rounded-full" style="width: 150px; height: 150px; border: 5px solid #555; alt="">
                @endif
                <p class="mt-3 mb-2 uppercase font-semibold">Role : 
                    <select class="border-1 py-1 px-2 ml-2 border-gray-600 input-color rounded focus:border-gray-800" name="role_as" id="role_as">
                        <option value="0" {{ $user->role_as == 0 ? 'selected':"" }}>Customer</option>
                        <option value="1" {{ $user->role_as == 1 ? 'selected':"" }}>Admin</option>
                    </select>
                </p>
            </form>

            </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium">First name</label>
                <input type="text" name="first_name" id="first_name" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->first_name }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium">Last name</label>
                <input type="text" name="last_name" id="last_name" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->last_name }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="block text-sm font-medium">Email Address</label>
                <input type="email" name="email" id="email" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->email }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="no_telp" class="block text-sm font-medium">No. Telephone</label>
                <input type="number" name="no_telp" id="no_telp" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->no_telp }}" disabled>
              </div>

              <div class="col-span-6">
                <label for="address" class="block text-sm font-medium">Street address</label>
                <input type="text" name="address" id="address" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->address }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium">Country</label>
                <input type="text" name="country" id="country" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->country }}" disabled>
              </div>
              
              <div class="col-span-6 sm:col-span-3">
                <label for="province" class="block text-sm font-medium">State / Province</label>
                <input type="text" name="province" id="province" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->province }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="city" class="block text-sm font-medium">City</label>
                <input type="text" name="city" id="city" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->city }}" disabled>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="pos_code" class="block text-sm font-medium">ZIP / Postal code</label>
                <input type="text" name="pos_code" id="pos_code" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="-" value="{{ $user->pos_code }}" disabled>
              </div>



            </div>
          </div>
        </div>
    </div>
</div>

@endsection