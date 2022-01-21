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
                            <input type="text" name="first_name" id="first_name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="First name" value="{{ auth()->user()->first_name }}" required>
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block text-sm font-medium">Last name</label>
                            <input type="text" name="last_name" id="last_name" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Last name" value="{{ auth()->user()->last_name }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium">Email address</label>
                            <input type="email" name="email" id="email" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Email address" value="{{ auth()->user()->email }}">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="no_telp" class="block text-sm font-medium">No. Telephone</label>
                            <input type="number" name="no_telp" id="no_telp" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Number Telephone" value="{{ auth()->user()->no_telp }}">
                          </div>

                          <div class="col-span-6">
                            <label for="address" class="block text-sm font-medium">Street address</label>
                            <input type="text" name="address" id="address" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Street address" value="{{ auth()->user()->address }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="block text-sm font-medium">Country</label>
                            <input type="text" name="country" id="country" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Country" value="{{ auth()->user()->country }}">
                          </div>
                          
                          <div class="col-span-6 sm:col-span-3">
                            <label for="province" class="block text-sm font-medium">State / Province</label>
                            <input type="text" name="province" id="province" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="State / Province" value="{{ auth()->user()->province }}">
                          </div>
            
                          <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="block text-sm font-medium">City</label>
                            <input type="text" name="city" id="city" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="City" value="{{ auth()->user()->city }}">
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="pos_code" class="block text-sm font-medium">ZIP / Postal code</label>
                            <input type="text" name="pos_code" id="pos_code" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="ZIP / Postal code" value="{{ auth()->user()->pos_code }}">
                          </div>

                          <div class="col-span-6">
                            <label for="message" class="block text-sm font-medium">Message</label>
                            <textarea name="message" id="message" rows="7" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Message for your orders...">{{ auth()->user()->message }}</textarea>
                          </div>

                        </div>
                        @if($product_cart->count() > 0)
                        <div class="px-4 mt-12 py-30 text-right sm:px-6">
                          <button type="submit" class="inline-flex justify-center py-2 px-4 border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Place Order
                          </button>
                        </div>
                        @endif
                      </div>
                    </div>
                  </form>
                </div>
            </div>

            <div class="rounded w-1/4">
                <h1 class="text-3xl">Order Details</h1>
                <div class="my-light-dark-card shadow overflow-hidden sm:rounded-md p-3 mt-3">
                @if($product_cart->count() > 0)
               @php
                  $tax = 0;
                  $totalPrice = 0;       
               @endphp
                @foreach ($product_cart as $item)
                    <div class="flex">
                        <img class="w-16 mr-2" src="/assets/uploads/products/{{ $item->products->main_image }}" alt="">
                        <div>
                            <h1 class="text-sm font-medium text-gray-600">{{ $item->products->name }}</h1>
                            <div class="inline-block">
                                @if($item->products->disc_price)
                                    <p class="text-lg font-medium">{{ $item->products->disc_price }} <span class="text-lg font-medium text-gray-400"> x {{ $item->product_qty }}</span></p>
                                @else
                                    <p class="text-lg font-medium">{{ $item->products->ori_price }} <span class="text-md font-medium text-gray-400"> x {{ $item->product_qty }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr class="my-3 text-gray-400">  
                    @php
                        if($item->products->disc_price) :
                          $totalPrice += $item->products->disc_price * $item->product_qty;
                        else :
                          $totalPrice += $item->products->ori_price * $item->product_qty;
                        endif;
                        $tax += $totalPrice * 10 / 100;
                    @endphp
                    @endforeach
                    @php
                        $totalPrice += 20000;
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
                     <p  class="text-lg font-medium">Rp. {{ $totalPrice }}</p>
                  </div>
                  @else
                    <h1>No products in your cart</h1>
                  @endif
                </div>
            </div>
        </div>
    </div>
@endsection