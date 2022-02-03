@extends('dashboard.layouts.main')

@section('content') 

<div class="grid grid-cols-1 md:grid-cols-2 gap-0 lg:grid-cols-2">

    <div class="p-3">
        <div class="md:col-span-2">
            <div class="shadow-md overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 my-light-dark-card my-light-dark-text sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium">First name</label>
                    <input type="text" name="first_name" id="first_name" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="First name" disabled value="{{ $orders->first_name }}">
                  </div>
    
                  <div class="col-span-6 sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium">Last name</label>
                    <input type="text" name="last_name" id="last_name" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="Last name" disabled value="{{ $orders->last_name }}">
                  </div>

                  <div class="col-span-6">
                    <label for="no_telp" class="block text-sm font-medium">No. Telephone</label>
                    <input type="number" name="no_telp" id="no_telp" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="Number Telephone" disabled value="{{ $orders->no_telp }}">
                  </div>

                  <div class="col-span-6">
                    <label for="address" class="block text-sm font-medium">Street address</label>
                    <input type="text" name="address" id="address" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="Street address" disabled value="{{ $orders->address }}">
                  </div>
    
                  <div class="col-span-6 sm:col-span-3">
                    <label for="country" class="block text-sm font-medium">Country</label>
                    <input type="text" name="country" id="country" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="Country" disabled value="{{ $orders->country }}">
                  </div>
                  
                  <div class="col-span-6 sm:col-span-3">
                    <label for="province" class="block text-sm font-medium">State / Province</label>
                    <input type="text" name="province" id="province" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="State / Province" disabled value="{{ $orders->province }}">
                  </div>
    
                  <div class="col-span-6 sm:col-span-3">
                    <label for="city" class="block text-sm font-medium">City</label>
                    <input type="text" name="city" id="city" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="City" disabled value="{{ $orders->city }}">
                  </div>

                  <div class="col-span-6 sm:col-span-3">
                    <label for="pos_code" class="block text-sm font-medium">ZIP / Postal code</label>
                    <input type="text" name="pos_code" id="pos_code" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="ZIP / Postal code" disabled value="{{ $orders->pos_code }}">
                  </div>

                  <div class="col-span-6">
                    <label for="message" class="block text-sm font-medium">Message</label>
                    <textarea name="message" id="message" rows="7" autocomplete="off" class="my-light-dark-text input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm sm:text-sm" placeholder="No Message" disabled>{{ $orders->message }}</textarea>
                  </div>


                  <div class="col-span-6 sm:col-span-4">
                    <form action="/update-status/{{ $orders->id }}" method="POST">
                        @csrf
                        @method('PUT')
                    <label for="status" class="block text-md mb-2 font-medium">Order Status</label>
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                          <select id="status" class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            my-light-dark-text
                            body-color bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="status">
                              <option value="0" {{ $orders->status == 0 ? 'selected':'' }}>Waiting for Confirmation</option>
                              <option value="1" {{ $orders->status == 1 ? 'selected':'' }}>Order Proccessed</option>
                              <option value="2" {{ $orders->status == 2 ? 'selected':'' }}>Order Delivered</option>
                              <option value="3" {{ $orders->status == 3 ? 'selected':'' }}>Order Arrived</option>
                          </select>
                        </div>
                      </div>
                  </div>

                  <div class="col-span-6 flex flex-end">
                    <a href="/dashboard/customers-order" class="inline-block mr-5 px-4 py-2 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">Back</a>
                    <button type="submit" class="inline-block px-4 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Update Status</button>
                  </div>
                </form>


                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="rounded p-3">
        <div class="my-light-dark-card shadow-md overflow-hidden sm:rounded-md p-3">
          <h1 class="mb-4 font-medium text-xl uppercase">Order Details</h1> 
          @php
              $tax = 0;
          @endphp
        @foreach ($orders->orderItems as $item)
            <div class="flex">
                <img class="w-16 mr-2" src="/assets/uploads/products/{{ $item->products->main_image }}" alt="">
                {{-- <img class="w-16 mr-2" src="{{ $item->products->main_image }}" alt=""> --}}
                <div>
                    <h1 class="text-sm font-medium text-gray-600">{{ $item->products->name }}</h1>
                    <div class="inline-block">
                        @if($item->products->disc_price)
                            <p class="text-lg font-medium">Rp {{ number_format($item->products->disc_price, 0, ',', '.') }}<span class="text-lg font-medium text-gray-400"> x {{ $item->quantity }}</span></p>
                        @else
                            <p class="text-lg font-medium">Rp {{ number_format($item->products->ori_price, 0, ',', '.') }}<span class="text-md font-medium text-gray-400"> x {{ $item->quantity }}</span></p>
                        @endif
                    </div>
                </div>
            </div>
            <hr class="my-3"> 
            
            @php
                if($item->products->disc_price) :
                  $tax += $item->products->disc_price * $item->quantity;
                else :
                  $tax += $item->products->ori_price * $item->quantity;;
                endif
            @endphp
            @endforeach
         
            @php
              $tax *= 10 / 100;
          @endphp

          <div class="flex justify-between">
             <p>Delivery</p>
             <p>Rp {{ number_format(20000, 0, ',', '.') }}</p>
          </div>
          <div class="flex justify-between">
             <p>PPN(10%)</p>
             <p>Rp {{ number_format($tax, 0, ',', '.') }}</p>
          </div>
          <hr class="my-3">
          <div class="flex justify-between">
             <h1 class="text-2xl font-medium">Total</h1>
             <p  class="text-lg font-medium">Rp {{ number_format($orders->total_price, 0, ',', '.') }}</p>
          </div>
        </div>
    </div>
</div>       

@endsection

