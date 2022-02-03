@extends('frontend.layouts.main')

@section('styles')
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/css/checkout.css">
@endsection

@section('main-content')
    
    <div class="main-content pt-40">
        <!-- Page content -->
        <div class="container">
          <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
              <div class="shadow-lg rounded">
                <div class="flex justify-center">
                    <img src="/assets/img/user-profile.png" width="100px" class="rounded-full">
                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="text-center">
                    <h3>
                      Danu Artha
                    </h3>
                    
                    <h3>
                      danuart@gmail.com
                    </h3>

                    <div class="text-lg mt-2 font-medium">
                      <i class="bi bi-geo-alt text-red-500 mr-2"></i>Indonesia, Bali, Badung
                    </div>
                    
                    <hr class="my-4">
                    <h2 class="text-left mb-3 uppercase font-medium text-xl">
                      Latest Order
                    </h2>
                    <div class="flex">
                      <img class="w-16 mr-2 rounded" src="https://picsum.photos/100" alt="">
                      <div class="text-left">
                          <h1 class="text-sm font-medium text-gray-600">Palu Thor Kuat Mantap Murah</h1>
                          <button class="btn-effect btn-details text-xs mt-2 py-1 px-2 rounded text-white">
                              Show Product
                          </button>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8 order-xl-1">
              <div class="bg-white shadow-lg p-4 rounded">
                <div class="border-b">
                  <div class="row align-items-center">
                    <div class="col-8 mb-2">
                      <h3 class="font-semibold uppercase text-lg">My Profile</h3>
                    </div>
                    <div class="col-4 text-right mb-2">
                      <button class="btn-effect btn-edit py-2 px-3 rounded text-sm"><i class="bi bi-pencil-fill mr-1"></i> Edit Profile</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="flex justify-between">
                            <div class="field half mr-2">
                              <label for="first_name" class="font-medium text-md">First Name</label>
                              <input class="input-checkout" disabled name="first_name" id="first_name" type="text" placeholder="-" value="{{ auth()->user()->first_name }}">
                            </div>
                            <div class="field half">
                              <label for="last_name" class="font-medium text-md">Last Name</label>
                              <input class="input-checkout" disabled id="last_name" name="last_name" type="text" placeholder="-" value="{{ auth()->user()->last_name }}">
                            </div>
                          </div>
                          
                          <div class="flex justify-between">
                            <div class="field half mr-2">
                              <label for="email" class="font-medium text-md">Email Address</label>
                              <input class="input-checkout" disabled name="email" id="email" type="email" placeholder="-" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="field half">
                              <label for="no_telp" class="font-medium text-md">No. Telephone</label>
                              <input class="input-checkout" disabled id="no_telp" name="no_telp" type="text" placeholder="-" value="{{ auth()->user()->no_telp }}">
                            </div>
                          </div>
          
                      </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Address information</h6>
                    <div class="pl-lg-4">
                          <div class="field full">
                            <label for="address" class="font-medium text-md">Street Address</label>
                            <input class="input-checkout" disabled name="address" id="address" type="text" placeholder="-" value="{{ auth()->user()->address }}">
                          </div>

                        <div class="flex justify-between">
                          <div class="field half mr-2">
                            <label for="country" class="font-medium text-md">Country</label>
                            <input class="input-checkout" disabled name="country" id="country" type="text" placeholder="-" value="{{ auth()->user()->country }}">
                          </div>
                          <div class="field half">
                            <label for="province" class="font-medium text-md">Province</label>
                            <input class="input-checkout" disabled id="province" name="province" type="text" placeholder="-" value="{{ auth()->user()->province }}">
                          </div>
                        </div>

                        <div class="flex justify-between">
                          <div class="field half mr-2">
                            <label for="city" class="font-medium text-md">City</label>
                            <input class="input-checkout" disabled id="city" name="city" type="text" placeholder="-" value="{{ auth()->user()->city }}">
                          </div>
                          <div class="field half">
                            <label for="pos_code" class="font-medium text-md">ZIP / Postal Code</label>
                            <input class="input-checkout" disabled id="pos_code" name="pos_code" type="text" placeholder="-" value="{{ auth()->user()->pos_code }}">
                          </div>
                        </div>
            
                        </div>
                      </div>
                    </div>
                    
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection

