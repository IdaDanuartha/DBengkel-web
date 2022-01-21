<nav class="navbar w-full h-16 flex justify-between items-center px-2.5">
    {{-- hamburger menu --}}
    <div class="toggle relative w-16 h-16 flex justify-center items-center cursor-pointer text-4xl">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    {{-- Title navbar --}}
    <div class="title-nav relative w-96 mx-2.5 text-center text-2xl font-medium uppercase">
        <h2>{{ $title }}</h2>
    </div>

    {{-- User Profile --}}
    <div class="flex">
    <span class="hover:text-gray-700 relative top-0 right-12">
        <i id="dark-mode-icon" class="bi bi-moon-fill text-2xl"></i>
    </span>
    <form class="logout-form" action="/logout" method="POST">
        @csrf
        <button class="back-home flex flex-row relative top-1 right-9 w-9 h-9 duration-500 hover:text-red-500" type="submit">Logout <i class="bi bi-box-arrow-right ml-1.5 relative top-0.5"></i></button>
    </form>
    </div>
</nav>