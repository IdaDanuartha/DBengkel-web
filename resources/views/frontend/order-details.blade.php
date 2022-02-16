@extends('frontend.layouts.main')

@section('main-content')
    <div class="pt-36 pb-24">
        <div class="flex justify-center">

            <div class="w-3/5 mr-12">
              <div class="flex">
                <h1 class="text-lg">Status : 
                <span class="font-semibold">
                @if($orders->status == 0)
                  Waiting For Confirmation
                @elseif($orders->status == 1)
                  Order Proccessed
                @elseif($orders->status == 2)
                  Order Delivered
                @elseif($orders->status == 3)
                  Order Arrived
                @elseif($orders->status == 4)
                <span style="color: rgb(22 163 74);">Order Completed</span>
                @elseif($orders->status == 5)
                  <span class="text-red-500">Order Canceled</span>
                @endif
              </span>
              </h1>
                <form action="/update-order-status/{{ $orders->id }}" onsubmit="submitForm('Loading')" method="POST">
                  @csrf
                  @method('PUT')
                  @if($orders->status == 0)
                      <button type="submit" class="btn-submit marker:btn-effect btn-delete rounded py-2 px-4 ml-5 text-white text-sm">Cancel Order</button>
                  @elseif($orders->status == 3)
                      <button type="submit" class="btn-submit btn-effect btn-complete rounded py-2 px-4 ml-5 text-white text-sm">Complete the order</button>
                  @endif
                </form>
              </div>
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

                          <div class="col-span-6">
                            <label for="no_telp" class="block text-sm font-medium">No. Telephone</label>
                            <input type="number" name="no_telp" id="no_telp" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Number Telephone" disabled value="{{ $orders->no_telp }}">
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
                            <label for="address" class="block text-sm font-medium">Street address</label>
                            <input type="text" name="address" id="address" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" placeholder="Street address" disabled value="{{ $orders->address }}">
                          </div>

                          <div class="col-span-6">
                            <label for="message" class="block text-sm font-medium">Message</label>
                            <textarea placeholder="No Message" name="message" id="message" rows="7" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" disabled>{{ $orders->message }}</textarea>
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                              <label class="font-medium text-md mb-3">Address Type</label>
                              <div class="flex">
                                @if($orders->address_type == 1)
                                <div class="flex">
                                  <input type="radio" class="mr-2" checked>
                                  <label class="relative -top-1" for="home">Home</label>
                                </div>
                                @else
                                <div class="flex">
                                  <input type="radio" class="mr-2" checked>
                                  <label class="relative -top-1" for="office">Office</label>
                                </div>
                                @endif
                              </div>
                          </div>

                          <div class="col-span-6 sm:col-span-3">
                            <label for="payment_method" class="block text-sm font-medium mb-1">Payment Method</label>
                            <input type="text" name="payment_method" id="payment_method" autocomplete="off" class="input-color mt-1 block w-full py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-red-400 focus:border-red-400 sm:text-sm" disabled value="COD | Cash On Delivery">
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>

            <div class="rounded w-1/4">
                <div class="my-light-dark-card shadow overflow-hidden sm:rounded-md p-3 mt-5">
                  <h1 class="text-xl mb-3">Order Details</h1>
                  @php
                      $tax = 0;
                  @endphp
                @foreach ($orders->orderItems as $item)
                    <div class="flex">
                        <img class="w-16 mr-2" src="/assets/uploads/products/{{ $item->products->main_image }}" alt="">
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
                    <hr class="my-3 text-gray-400">
                    @php
                        if($item->products->disc_price) :
                          $tax += $item->products->disc_price * $item->quantity;
                        else :
                          $tax += $item->products->ori_price * $item->quantity;
                        endif;
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
                  <hr class="my-3 text-gray-400">
                  <div class="flex justify-between">
                     <h1 class="text-2xl font-medium">Total</h1>
                     <p  class="text-lg font-medium">Rp {{ number_format($orders->total_price, 0, ',', '.') }}</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
