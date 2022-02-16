@extends('frontend.layouts.main')

@section('styles')
  <link rel="stylesheet" href="/assets/css/checkout.css">

  {{-- Tailwind elements --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
@endsection

@section('main-content')
  <div class="pt-36 pb-24">
    @auth
    @if(auth()->user()->role_as == 0)
      <article class="card checkout-card-color">
        <div class="container">
          <div class="">
            <h1 class="text-3xl">Order Details</h1>
            <div class="nav-footer-color shadow overflow-hidden sm:rounded-md p-3 mt-3">
            @if($product_cart->count() > 0)
          @php
              $tax = 0;
              $totalPrice = 0;       
          @endphp
            @foreach ($product_cart as $item)
                <div class="flex">
                    <img class="w-16 mr-2 rounded" src="/assets/uploads/products/{{ $item->products->main_image }}" alt="">
                    {{-- <img class="w-16 mr-2" src="{{ $item->products->main_image }}" alt=""> --}}
                    <div>
                        <h1 class="text-sm font-medium text-gray-600">{{ $item->products->name }}</h1>
                        <div class="inline-block">
                            @if($item->products->disc_price)
                                <p class="text-lg font-medium">Rp {{ number_format($item->products->disc_price, 0, ',', '.') }} <span class="text-lg font-medium text-gray-400"> x {{ $item->product_qty }}</span></p>
                            @else
                                <p class="text-lg font-medium">Rp {{ number_format($item->products->ori_price, 0, ',', '.') }} <span class="text-md font-medium text-gray-400"> x {{ $item->product_qty }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="my-3 text-gray-400">  
                @php
                    if($item->products->disc_price) :
                      $totalPrice += $item->products->disc_price * $item->product_qty;
                      $tax += $item->products->disc_price * $item->product_qty;
                    else :
                      $totalPrice += $item->products->ori_price * $item->product_qty;
                      $tax += $item->products->ori_price * $item->product_qty;
                    endif;

                @endphp
                @endforeach
                @php
                    $tax *= 10 / 100;
                    $totalPrice += $tax + 20000;
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
                <p  class="text-lg font-medium">Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
              </div>
              @else
                <h1>No products in your cart</h1>
              @endif
            </div>
        </div>
          <div class="card-body mt-10">
            <div class="payment-type">
              <h4>Please fill in the blanks</h4>
            </div>
            <form action="/placeorder" method="POST" onsubmit="submitForm('Processing')">
              @csrf
              <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <div class="payment-info flex justify-space-between">
              <ul class="stepper" data-mdb-stepper="stepper">
              <li class="stepper-step satu stepper-active">
                <div class="stepper-head">
                  <span class="stepper-head-icon"> 1 </span>
                  <span class="stepper-head-text"> Basic Info </span>
                </div>
                <div class="stepper-content">
                  <div class="flex justify-between">
                    <div class="field required half mr-2">
                      <label for="first_name" class="font-medium text-md">First Name</label>
                      <input class="input-checkout input-color @error('first_name') is-invalid @enderror" name="first_name" id="first_name" type="text" placeholder="Enter your first name" value="{{ auth()->user()->first_name }}">
                      @error('first_name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="field required half">
                      <label for="last_name" class="font-medium text-md">Last Name</label>
                      <input class="input-checkout input-color @error('last_name') is-invalid @enderror" id="last_name" name="last_name" type="text" placeholder="Enter your last name" value="{{ auth()->user()->last_name }}">
                      @error('last_name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                    <div class="field required full">
                      <label for="no_telp" class="font-medium text-md">No. Telephone</label>
                      <input class="input-checkout input-color @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" type="text" placeholder="No. Telephone / Whatsapp" value="{{ auth()->user()->no_telp }}">
                      @error('no_telp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  <div class="field full">
                    <label for="message" class="font-medium text-md">Message</label>
                    <textarea class="input-checkout input-color" rows="6" id="message" name="message" type="text" placeholder="Message for your orders">{{ auth()->user()->message }}</textarea>
                  </div>
                  <div class="card-actions mt-5">
                    <a href="/carts" class="button button-secondary">Back to Cart</a>
                  </div>
                </div>
              </li>
              <li class="stepper-step dua">
                <div class="stepper-head">
                  <span class="stepper-head-icon"> 2 </span>
                  <span class="stepper-head-text"> Address Info </span>
                </div>
                <div class="stepper-content">
                  <div class="flex justify-between">
                    <div class="field required half mr-2">
                      <label for="country" class="font-medium text-md">Country</label>
                      <input class="input-checkout input-color @error('country') is-invalid @enderror" name="country" id="country" type="text" placeholder="Your Country" value="{{ auth()->user()->country }}">
                      @error('country')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="field required half">
                      <label for="province" class="font-medium text-md">State / Province</label>
                      <input class="input-checkout input-color @error('province') is-invalid @enderror" id="province" name="province" type="text" placeholder="Your State / Province" value="{{ auth()->user()->province }}">
                      @error('province')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="flex justify-between">
                    <div class="field required half mr-2">
                      <label for="city" class="font-medium text-md">City</label>
                      <input class="input-checkout input-color @error('city') is-invalid @enderror" id="city" name="city" type="text" placeholder="Your City" value="{{ auth()->user()->city }}">
                      @error('city')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="field required half">
                      <label for="pos_code" class="font-medium text-md">ZIP / Postal code</label>
                      <input class="input-checkout input-color @error('pos_code') is-invalid @enderror" id="pos_code" name="pos_code" type="text" placeholder="ZIP / Postal Code" value="{{ auth()->user()->pos_code }}">
                      @error('pos_code')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="field required full">
                    <label for="address" class="font-medium text-md">Address Details</label>
                    <textarea class="input-checkout input-color @error('address') is-invalid @enderror" rows="6" id="address" name="address" type="text" placeholder="Enter your Street Address">{{ auth()->user()->address }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                  </div>
                  <div class="field half">
                    <label class="font-medium text-md">Address Type</label>
                    <div class="flex">
                      <div class="mr-12 flex">
                        <input type="radio" class="mr-2" name="address_type" checked value="1" id="home">
                        <label for="home">Home</label>
                      </div>
                      <div class="flex">
                        <input type="radio" class="mr-2" name="address_type" value="2" id="office">
                        <label for="office">Office</label>
                      </div>
                    </div>
                  </div>
                  <div class="card-actions mt-5">
                      <a href="/carts" class="button button-secondary">Back to Cart</a>
                  </div>
                </div>
              </li>
              <li class="stepper-step tiga">
                <div class="stepper-head">
                  <span class="stepper-head-icon"> 3 </span>
                  <span class="stepper-head-text"> Payment Info </span>
                </div>
                <div class="stepper-content">
                  <div class="flex justify-between mb-10">
                    <div class="block">
                      <button type="button" class="payment-btn selected my-light-dark-text flex py-3 px-5 rounded">
                        <img src="/assets/img/cash-on-delivery.png" class="mr-2" width="25px" alt=""> Cash On Delivery
                      </button>
                      <p class="mt-1"><i class="bi bi-check text-2xl relative top-1" style="color: rgb(34 197 94);"></i> Payment Available</p>
                    </div>
                    <div class="block">
                      <button type="button" class="payment-btn my-light-dark-text flex py-3 px-5 rounded">
                        <img src="/assets/img/credit-card.png" class="mr-2" width="25px" alt=""> Pay with Credit Card
                      </button>
                      <p class="mt-1"><i class="bi bi-x text-2xl relative top-1 text-red-500"></i> Payment Not Available</p>
                    </div>
                  </div>
                  <div class="card-actions mt-5">
                    <div class="flex justify-between">
                      <a href="/carts" class="button button-secondary">Back to Cart</a>
                      <button type="submit" class="btn-submit button button-primary">Proceed</button>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
              {{-- <div class="column billing">
                <div class="title">
                  <div class="num">1</div>
                  <h4>Billing Info</h4>
                </div>
                <div class="field full">
                  <label for="name">Full Name</label>
                  <input class="input-checkout" id="name" type="text" placeholder="Full Name">
                </div>
                <div class="field full">
                  <label for="address">Billing Address</label>
                  <input class="input-checkout" id="address" type="text" placeholder="Billing Address">
                </div>
                <div class="flex justify-space-between">
                  <div class="field half">
                    <label for="city">City</label>
                    <input class="input-checkout" id="city" type="text" placeholder="City">
                  </div>
                  <div class="field half">
                    <label for="state">State</label>
                    <input class="input-checkout" id="state" type="text" placeholder="State">
                  </div>
                </div>
                <div class="field full">
                  <label for="zip">Zip</label>
                  <input class="input-checkout" id="zip" type="text" placeholder="Zip">
                </div>
              </div>
              <div class="column shipping">
                <div class="title">
                  <div class="num">2</div>
                  <h4>Credit Card Info</h4>
                </div>
                <div class="field full">
                  <label for="name">Cardholder Name</label>
                  <input class="input-checkout" id="name" type="text" placeholder="Full Name">
                </div>
                <div class="field full">
                  <label for="address">Card Number</label>
                  <input class="input-checkout" id="address" type="text" placeholder="1234-5678-9012-3456">
                </div>
                <div class="flex justify-space-between">
                  <div class="field half">
                    <label for="city">Exp. Month</label>
                    <input class="input-checkout" id="city" type="text" placeholder="12">
                  </div>
                  <div class="field half">
                    <label for="state">Exp. Year</label>
                    <input class="input-checkout" id="state" type="text" placeholder="19">
                  </div>
                </div>
                <div class="field full">
                  <label for="zip">CVC Number</label>
                  <input class="input-checkout" id="zip" type="text" placeholder="468">
                </div>
              </div> --}}
            </div>
            </form>
          </div>
        </div>
      </article>
    @endif
    @endauth
  </div>
@endsection

@section('scripts')
    <script src="/assets/js/checkout.js"></script>

    {{-- Tailwind css --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
@endsection