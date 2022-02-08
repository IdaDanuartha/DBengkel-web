{{-- Sidebar --}}
<div class="container-sidebar relative w-full">
    <div class="sidebar fixed h-full duration-500 overflow-hidden" id="sidebar">
        <ul class="absolute top-0 left-0 w-full">
            <li id="first-child">
                <a href="/">
                    <span class="icon"><img src="/assets/img/webLogo2.png" alt="Logo"></span>
                    <span class="title">D'BENGKEL</span>
                </a>
            </li>
            {{-- @can('admin') --}}
            <li class="{{ Request::is('dashboard') ? 'actived' : '' }}">
                <a href="/dashboard">
                    <span class="icon"><i class="bi bi-speedometer2 relative" style="top: -5px"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/products') || Request::is('dashboard/product*') ? 'actived' : '' }}">
                <a href="/dashboard/products">
                    <span class="icon"><i class="bi bi-clipboard-data relative" style="top: -5px"></i></span>
                    <span class="title">Products</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/categories') || Request::is('dashboard/category*') ? 'actived' : '' }}">
                <a href="/dashboard/categories">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Categories</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/customer-orders*') ? 'actived' : '' }}">
                <a href="/dashboard/customer-orders">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Customer Orders</span>
                </a>
            </li>
            @if(auth()->user()->role_as == '2')
            <li class="{{ Request::is('dashboard/users-registered*') ? 'actived' : '' }}">
                <a href="/dashboard/users-registered">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="title">Users Registered</span>
                </a>
            </li>
            @endif
            <li class="{{ Request::is('dashboard/messages*') ? 'actived' : '' }}">
                <a href="/dashboard/messages">
                    <span class="icon">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </span>
                    <span class="title">Messages</span>
                </a>
            </li>
        </ul>
    </div>
</div>