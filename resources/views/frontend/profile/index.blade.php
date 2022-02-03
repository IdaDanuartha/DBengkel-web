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
              <div class="shadow-lg rounded my-light-dark-card">
                <div class="flex justify-center">
                  @if (auth()->user()->image)
                      <img src="/assets/uploads/users/{{ auth()->user()->image }}" style="width: 100px; height: 100px; margin-top: 10px;" class="rounded-full">
                  @else
                      <img src="/assets/img/user-profile.png" style="margin-top: 10px; width: 100px;" class="rounded-full">
                  @endif  

                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="text-center">
                    <h3 class="text-xl font-medium">
                      {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                      @if(auth()->user()->role_as == 0)
                        <span class="badge bg-blue-500 relative -top-2 text-white" style="font-size: 10px;">Customer</span>
                      @elseif(auth()->user()->role_as == 1)
                        <span class="badge bg-red-500 relative -top-2 text-white" style="font-size: 10px;">Admin</span>
                      @elseif(auth()->user()->role_as == 2)
                        <span class="badge relative -top-2 text-white" style="font-size: 10px; background: linear-gradient(to right, #9108bf, #3700ff);">Super Admin</span>
                      @endif
                    </h3>
                    
                    <h3 class="text-sm font-light">
                      <i class="bi bi-envelope-fill mr-1"></i>{{ auth()->user()->email }}
                    </h3>

                    <div class="text-md mt-2 font-medium">
                      @if(auth()->user()->country && auth()->user()->province && auth()->user()->city != NULL)
                        <i class="bi bi-geo-alt text-red-500 mr-1"></i>
                        {{ auth()->user()->country . ', ' . auth()->user()->province . ', ' . auth()->user()->city }}
                      @endif
                    </div>
                    
                    @if(auth()->user()->role_as == 0)
                      <hr class="my-4">
                      <h2 class="text-left mb-3 uppercase font-medium text-xl">
                        <i class="bi bi-hourglass mr-1"></i> Order History
                      </h2>
                      @if($userOrder->count() > 0)
                          @foreach ($userOrder as $item)
                            <div class="flex mb-4">
                              <i class="bi bi-bag-check text-5xl mr-3" style="color: rgb(34 197 94);"></i>
                              <div class="text-left">
                                  <h1 class="text-sm font-medium text-gray-600">Order Code : {{ $item->tracking_no }}</h1>
                                  <button type="button" class="btn-effect btn-details text-xs mt-2 py-1 px-2 rounded text-white" onclick="orderDetail({{ $item->id }})">
                                      Order Details
                                  </button>
                              </div>
                            </div>    
                          @endforeach
                      @else
                          <p class="text-2xl text-gray-400 text-center">No Order</p>
                      @endif
                    @endif
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8 order-xl-1">
              <div class="my-light-dark-card shadow-lg p-4 rounded">
                <div class="border-b">
                  <div class="row align-items-center">
                    <div class="col-8 mb-2">
                      <h3 class="font-semibold uppercase text-lg">My Profile</h3>
                    </div>
                    <div class="col-4 text-right mb-2">
                      <button type="button" class="btn-effect btn-edit py-2 px-3 rounded text-sm" data-bs-toggle="modal" data-bs-target="#modal-edit"><i class="bi bi-pencil-fill mr-1"></i> Edit Profile</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">
                      User information 
                    </h6>
                    <div class="pl-lg-4">
                        <div class="flex justify-between">
                            <div class="field half mr-2">
                              <label for="first_name" class="font-medium text-md">First Name</label>
                              <input class="input-checkout input-color" disabled name="first_name" id="first_name" type="text" placeholder="-" value="{{ auth()->user()->first_name }}">
                            </div>
                            <div class="field half">
                              <label for="last_name" class="font-medium text-md">Last Name</label>
                              <input class="input-checkout input-color" disabled id="last_name" name="last_name" type="text" placeholder="-" value="{{ auth()->user()->last_name }}">
                            </div>
                          </div>
                          
                          <div class="flex justify-between">
                            <div class="field half mr-2">
                              <label for="email" class="font-medium text-md">Email Address</label>
                              <input class="input-checkout input-color" disabled name="email" id="email" type="email" placeholder="-" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="field half">
                              <label for="no_telp" class="font-medium text-md">No. Telephone</label>
                              <input class="input-checkout input-color" disabled id="no_telp" name="no_telp" type="text" placeholder="-" value="{{ auth()->user()->no_telp }}">
                            </div>
                          </div>
          
                    </div>
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Address information</h6>
                    <div class="pl-lg-4">
                          <div class="field full">
                            <label for="address" class="font-medium text-md">Street Address</label>
                            <input class="input-checkout input-color" disabled name="address" id="address" type="text" placeholder="-" value="{{ auth()->user()->address }}">
                          </div>

                        <div class="flex justify-between">
                          <div class="field half mr-2">
                            <label for="country" class="font-medium text-md">Country</label>
                            <input class="input-checkout input-color" disabled name="country" id="country" type="text" placeholder="-" value="{{ auth()->user()->country }}">
                          </div>
                          <div class="field half">
                            <label for="province" class="font-medium text-md">Province</label>
                            <input class="input-checkout input-color" disabled id="province" name="province" type="text" placeholder="-" value="{{ auth()->user()->province }}">
                          </div>
                        </div>

                        <div class="flex justify-between">
                          <div class="field half mr-2">
                            <label for="city" class="font-medium text-md">City</label>
                            <input class="input-checkout input-color" disabled id="city" name="city" type="text" placeholder="-" value="{{ auth()->user()->city }}">
                          </div>
                          <div class="field half">
                            <label for="pos_code" class="font-medium text-md">ZIP / Postal Code</label>
                            <input class="input-checkout input-color" disabled id="pos_code" name="pos_code" type="text" placeholder="-" value="{{ auth()->user()->pos_code }}">
                          </div>
                        </div>

                        <div class="field half">
                          <label class="font-medium text-md mb-3">Address Type</label>
                          <div class="flex">
                            @if(auth()->user()->address_type == 1)
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

{{-- Modal edit profile --}}
<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content my-light-dark-card">
      <div class="modal-header flex justify-center">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
      </div>
      <div class="modal-body">
        <form action="/edit-profile/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="user-upload-image">
            <label class="font-medium text-xl">Upload Image</label>
            <div class="small-12 medium-2 large-2 columns">
              <div class="circle">
                <!-- User Profile Image -->
                @if(auth()->user()->image)
                  <img class="profile-pic" src="/assets/uploads/users/{{ auth()->user()->image }}">
                @else
                  <img class="profile-pic" src="/assets/img/user-profile.png">
                @endif
      
              </div>
              <div class="p-image">
                <i class="fa fa-camera upload-button"></i>
                 <input class="file-upload" name="image" type="file" accept="image/*"/>
              </div>
           </div>
         </div>
         
         <h6 class="heading-small text-muted mb-4">
          User information 
        </h6>
          <div class="flex justify-between">
            <div class="field half mr-2">
              <label for="first_name" class="font-medium text-md">First Name</label>
              <input class="input-checkout input-color" name="first_name" id="first_name" type="text" placeholder="-" value="{{ auth()->user()->first_name }}">
            </div>
            <div class="field half">
              <label for="last_name" class="font-medium text-md">Last Name</label>
              <input class="input-checkout input-color" id="last_name" name="last_name" type="text" placeholder="-" value="{{ auth()->user()->last_name }}">
            </div>
          </div>
          
          <div class="flex justify-between">
            <div class="field half mr-2">
              <label for="email" class="font-medium text-md">Email Address</label>
              <input class="input-checkout input-color" name="email" id="email" type="email" placeholder="-" value="{{ auth()->user()->email }}">
            </div>
            <div class="field half">
              <label for="no_telp" class="font-medium text-md">No. Telephone</label>
              <input class="input-checkout input-color" id="no_telp" name="no_telp" type="text" placeholder="No Telephone / Whatsapp" value="{{ auth()->user()->no_telp }}">
            </div>
          </div>

          <h6 class="heading-small text-muted mb-4 mt-3">
            Address information 
          </h6>
          <div class="field full">
            <label for="address" class="font-medium text-md">Street Address</label>
            <input class="input-checkout input-color" name="address" id="address" type="text" placeholder="Enter your address" value="{{ auth()->user()->address }}">
          </div>

        <div class="flex justify-between">
          <div class="field half mr-2">
            <label for="country" class="font-medium text-md">Country</label>
            <input class="input-checkout input-color" name="country" id="country" type="text" placeholder="Country" value="{{ auth()->user()->country }}">
          </div>
          <div class="field half">
            <label for="province" class="font-medium text-md">State / Province</label>
            <input class="input-checkout input-color" id="province" name="province" type="text" placeholder="State / Province" value="{{ auth()->user()->province }}">
          </div>
        </div>

        <div class="flex justify-between">
          <div class="field half mr-2">
            <label for="city" class="font-medium text-md">City</label>
            <input class="input-checkout input-color" id="city" name="city" type="text" placeholder="City" value="{{ auth()->user()->city }}">
          </div>
          <div class="field half">
            <label for="pos_code" class="font-medium text-md">ZIP / Postal Code</label>
            <input class="input-checkout input-color" id="pos_code" name="pos_code" type="text" placeholder="ZIP / Postal Code" value="{{ auth()->user()->pos_code }}">
          </div>
        </div>

        <div class="field half">
          <label class="font-medium text-md mb-3">Address Type</label>
          <div class="flex">
            <div class="mr-12 flex">
              <input type="radio" class="mr-2" name="address_type" {{ (auth()->user()->address_type == 1) ? 'checked' : '' }} value="1" id="home">
              <label for="home">Home</label>
            </div>
            <div class="flex">
              <input type="radio" class="mr-2" name="address_type" {{ (auth()->user()->address_type == 2) ? 'checked' : '' }} value="2" id="office">
              <label for="office">Office</label>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-effect btn-gray py-2 px-3 rounded text-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn-effect btn-details py-2 px-3 rounded text-sm">Save Changes</button>
      </div>

    </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    <script>
      function orderDetail(id) {
        document.location.href = '/order-details/' + id;
      }

      $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});

    </script>
@endsection