@extends('frontend.layouts.main')

@section('main-content')
    <div class="pt-36 pb-24">
        <div class="flex justify-center">

            <div class="w-3/5 mr-12">
                <h1 class="text-3xl">Basic Details</h1>
                <div class="mt-3 md:mt-0 md:col-span-2">
                  <form action="/placeorder" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                      <div class="px-4 py-5 my-light-dark-card my-light-dark-text sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block text-sm font-medium">First name</label>
                            <input type="text" name="first_name" id="first_name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="First name" disabled value="{{ $orders->first_name }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium">Last name</label>
                            <input type="text" name="last_name" id="last_name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Last name" disabled value="{{ $orders->last_name }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium">Email address</label>
                            <input type="email" name="email" id="email" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Email address" disabled value="{{ $orders->email }}">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="no_telp" class="block text-sm font-medium">No. Telephone</label>
                            <input type="number" name="no_telp" id="no_telp" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Number Telephone" disabled value="{{ $orders->no_telp }}">
                          </div>

                          <div class="col-span-6">
                            <label for="address" class="block text-sm font-medium">Street address</label>
                            <input type="text" name="address" id="address" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Street address" disabled value="{{ $orders->address }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium">Country</label>
                            <input type="text" name="country" id="country" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Country" disabled value="{{ $orders->country }}">
                          </div>
                          
                          <div class="col-span-6 sm:col-span-3">
                            <label for="province" class="block text-sm font-medium">State / Province</label>
                            <input type="text" name="province" id="province" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="State / Province" disabled value="{{ $orders->province }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="block text-sm font-medium">City</label>
                            <input type="text" name="city" id="city" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="City" disabled value="{{ $orders->city }}">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="pos_code" class="block text-sm font-medium">ZIP / Postal code</label>
                            <input type="text" name="pos_code" id="pos_code" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="ZIP / Postal code" disabled value="{{ $orders->pos_code }}">
                          </div>

                          <div class="col-span-6">
                            <label for="message" class="block text-sm font-medium">Message</label>
                            <textarea name="message" id="message" rows="7" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Message for your orders..." disabled>{{ $orders->message }}</textarea>
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>

            <div class="rounded w-1/4">
                <h1 class="text-3xl">Order Details</h1>
                <div class="my-light-dark-card shadow overflow-hidden sm:rounded-md p-3 mt-3">
                @foreach ($orders->orderItems as $item)
                    <div class="flex">
                        <img class="w-16 mr-2" src="/assets/uploads/products/{{ $item->products->main_image }}" alt="">
                        <div>
                            <h1 class="text-sm font-medium text-gray-600">{{ $item->products->name }}</h1>
                            <div class="inline-block">
                                @if($item->products->disc_price)
                                    <p class="text-lg font-medium">{{ $item->products->disc_price }} <span class="text-lg font-medium text-gray-400"> x {{ $item->quantity }}</span></p>
                                @else
                                    <p class="text-lg font-medium">{{ $item->products->ori_price }} <span class="text-md font-medium text-gray-400"> x {{ $item->quantity }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr class="my-3 text-gray-400">  
                    @endforeach
                 
                    @php
                      $tax = 0;
                      $tax += $orders->total_price * 10 / 100;
                  @endphp

                  <div class="flex justify-between">
                     <p>Delivery</p>
                     <p>Rp. 20000</p>
                  </div>
                  <div class="flex justify-between">
                     <p>PPN(10%)</p>
                     <p>Rp. {{ $tax }}</p>
                  </div>
                  <hr class="my-3 text-gray-400">
                  <div class="flex justify-between">
                     <h1 class="text-2xl font-medium">Total</h1>
                     <p  class="text-lg font-medium">Rp. {{ $orders->total_price }}</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection