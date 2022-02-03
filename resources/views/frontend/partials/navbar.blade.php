    <!-- Navigation-->
    {{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-none" id="mainNav">
        <div class="container px-3 px-lg-5">
            <a class="navbar-brand fw-bold" href="/"><img src="/assets/img/WebLogo.png" alt="Logo" width="35px"> D' BENGKEL</a>
            <button id="navbar-toggler" class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item home"><a class="nav-link" href="/"><i class="bi bi-house-fill"></i> Home</a></li>
                    <li class="nav-item product me-2"><a class="nav-link" href="/all-products"><i class="bi bi-bag-fill"></i> All Product</a></li>
                </ul>
                <div class="cart-profile-search d-flex">
                    <div class="d-flex text-light user-profile">
                        <div class="nav-icon cart-icon">
                            <a href="/cart" class="cart-icon">
                                <i class="bi bi-cart3"></i>
                            </a>
                        </div>

                        @auth
                        <div class="nav-icon profile" onclick="dropdownToggle();">
                            <img src="/assets/img/user.png" width="40px" height="39px" alt="" class="bi" style="margin-top: -3px;">
                        </div>

                        <div class="dropdown">
                            <h3>Hi, {{ auth()->user()->name }}</h3>
                            <h6>{{ auth()->user()->email }}</h6>
                            <div class="sub-dropdown">
                                <hr>
                                <p><a href="#"><i class="bi bi-heart"></i> Wishlist</a></p>
                                <p><a href="#"><i class="far fa-user"></i> Profile</a></p>
                                <p><a href="#"><i class="far fa-edit"></i> Edit Profile</a></p>
                                <hr>
                                <form class="logout-form" action="/logout" method="POST">
                                    @csrf
                                    <button class="btn-logout" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>

                    <form action="/all-products" method="GET" class="nav-item d-flex search-box" id="search-box">
                        <input class="" type="text" placeholder="Search Here..." name="search" autocomplete="off" value="{{ request('search') }}">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </nav> --}}

    <nav class="
  fixed
  w-full
  flex-wrap
  items-center
  justify-between
  py-4
  nav-footer-color
  hover:text-gray-700
  focus:text-gray-700
  shadow-lg
  navbar navbar-expand-lg navbar-light hidden
  " id="mainNav">
  <div class="container w-full flex flex-wrap items-center justify-between px-6">
  <button class="
      navbar-toggler
      text-gray-500
      border-0
      hover:shadow-none hover:no-underline
      py-2
      px-2.5
      bg-transparent
      my-light-dark-text
      focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
    " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
    class="w-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
    <path fill="currentColor"
      d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
    </path>
  </svg>
  </button>
  <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
    <a class="font-semibold	flex text-lg items-center my-light-dark-text duration-500 hover:text-gray-100
    mr-5 my-2" href="/"><img src="/assets/img/WebLogo2.png" alt="Logo" class="w-8 mr-2"> D' BENGKEL</a>
  <!-- Left links -->
  <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
    <li class="nav-item p-2">
      <a class="text-gray-500 duration-500 p-0 navbar-link {{ Request::is('/') ? 'active':'' }}" href="/">Home</a>
    </li>
    <li class="nav-item p-2">
      <a class="text-gray-500 duration-500 p-0 navbar-link {{ Request::is('category') ? 'active':'' }}" href="/category">Category</a>
    </li>
    <li class="nav-item p-2">
        <a class="text-gray-500 duration-500 p-0 navbar-link {{ Request::is('all-products') ? 'active':'' }}" href="/all-products">All Products</a>
      </li>
  </ul>
  <!-- Left links -->

  <!-- Right elements -->
  <div class="flex items-center relative">
    @auth
  <!-- Icon -->
  @if (Auth::user()->role_as == 0)
  <a class="text-gray-500 hover:text-gray-700 focus:text-gray-700" href="/carts">
    <i class="bi bi-cart text-2xl"></i>
    <span class="cart-counter text-white bg-red-500 absolute rounded-full text-xs -mt-1 -ml-2 py-0.5 px-1.5">0</span>
  </a>
  @endif
      
  <div class="dropdown relative ml-5 mr-1.5">
    <a class="flex items-center" href="#" id="dropdownMenuButton2" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      @if(auth()->user()->image)
        <img src="/assets/uploads/users/{{ auth()->user()->image }}" class="rounded-full" style="height: 35px; width: 35px" alt=""/>
      @else
        <img src="/assets/img/user-profile.png" class="rounded-full" style="height: 35px; width: 35px" alt=""/>
      @endif
    </a>
    <ul class="
    my-light-dark-card
    my-light-dark-text
    dropdown-menu
    min-w-max
    absolute
    hidden
    text-base
    z-50
    float-left
    py-2
    list-none
    text-left
    rounded-lg
    shadow-lg
    mt-1
    m-0
    bg-clip-padding
    border-none
    left-auto
    right-0
  " aria-labelledby="dropdownMenuButton2">
    <li>
      <p class="
      mx-3
      text-sm
      font-normal
      block
      w-full
      bg-transparent" >Hi, {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>
    </li>
    {{-- <li>
      <p class="
      mx-3
      text-xs
      font-normal
      block
      w-full
      bg-transparent"><i class="bi bi-envelope"></i> {{ auth()->user()->email }}</p>
    </li> --}}

    @if(auth()->user()->role_as == 0)
      <hr class="m-2">
      <li>
        <a class="
        dropdown-item
        text-sm
        font-normal
        block
        w-full
        bg-transparent
        hover:opacity-75
        whitespace-nowrap
        my-light-dark-text
      " href="/carts"><i class="bi bi-cart"></i> Cart</a>
      </li>
      <li>
        <a class="
        dropdown-item
        text-sm
        font-normal
        block
        w-full
        bg-transparent
        hover:opacity-75
        whitespace-nowrap
        my-light-dark-text
      " href="/my-orders"><i class="bi bi-clipboard-check"></i> My Orders</a>
      </li>
      @endif
      <hr class="m-2">
    @if (!auth()->user()->role_as == 0)
    <li>
      <a class="
      dropdown-item
      text-sm
      font-normal
      block
      w-full
      bg-transparent
      hover:opacity-75
      whitespace-nowrap
      my-light-dark-text
    " href="/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
    </li>
  @endif
    <li>
      <a class="
      dropdown-item
      text-sm
      font-normal
      block
      w-full
      bg-transparent
      hover:opacity-75
      whitespace-nowrap
      my-light-dark-text
    " href="/my-profile"><i class="bi bi-person"></i> My Profile</a>
    </li>
      <li>
        <form class="logout-form dropdown-item
        text-sm
        font-normal
        block
        w-full
        bg-transparent
        hover:opacity-75
        whitespace-nowrap
        my-light-dark-text" action="/logout" method="POST">
            @csrf
            <button type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
      </li>
    </ul>
  </div>
  @endauth

  @guest
    @if (!Request::is('/'))
    <a href="/login" class="relative top-0.5 bg-red-400 duration-500 hover:bg-red-500 ml-3 rounded-full text-white py-2 px-3"><i class="bi bi-box-arrow-in-right mr-1"></i> Login</a>
    @endif
  @endguest
  </div>
  <!-- Right elements -->
</div>
<!-- Collapsible wrapper -->

<form action="/all-products" class="ml-0 lg:ml-2 flex body-color my-light-dark-text search-box" id="search-box">
  @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
  @endif
  <input type="text" class="input-search typeahead p-1 mr-1 rounded-full" placeholder="Search Product Here..." name="search" id="searching" value="{{ request('search') }}">
  <button type="submit"><i class="bi bi-search"></i></button>
</form>
<span class="text-gray-500 hover:text-gray-700 focus:text-gray-700 ml-3">
  <i id="dark-mode-icon" class="bi bi-moon-fill text-2xl"></i>
</span>
  </div>
</nav>