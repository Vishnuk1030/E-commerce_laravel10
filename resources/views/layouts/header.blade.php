<header class="header-style-2" id="home">
    <div class="main-header navbar-searchbar">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-lg-12">

                    {{-- success msg --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show color" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- / success msg --}}

                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="{{ route('app.index') }}">
                                    <img src="{{ asset('assets/images/surf.webp') }}"
                                        class="h-logo img-fluid blur-up lazyload" alt="logo" width="130px">
                                </a>
                            </div>

                        </div>
                        <nav>
                            <div class="main-navbar">
                                <div id="mainnav">
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    <ul class="nav-menu">
                                        <li class="back-btn d-xl-none">
                                            <div class="close-btn">
                                                Menu
                                                <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="{{ Route::is('app.index') ? 'active' : '' }}">
                                            <a href="{{ route('app.index') }}" class="nav-link menu-title">Home</a>
                                        </li>
                                        <li class="{{ Route::is('shop.index') ? 'active' : '' }}">
                                            <a href="{{ route('shop.index') }}" class="nav-link menu-title">Shop</a>
                                        </li>
                                        <li class="{{ Route::is('cart.index') ? 'active' : '' }}">
                                            <a href="{{ route('cart.index') }}" class="nav-link menu-title">Cart</a>
                                        </li>
                                        <li class="{{ Route::is('about_Us') ? 'active' : '' }}">
                                            <a href="{{ route('about_Us') }}" class="nav-link menu-title">About
                                                Us</a>
                                        </li>
                                        <li class="{{ Route::is('contact_Us') ? 'active' : '' }}">
                                            <a href="{{ route('contact_Us') }}" class="nav-link menu-title">Contact
                                                Us</a>
                                        </li>
                                        <li class="{{ Route::is('blog') ? 'active' : '' }}">
                                            <a href="{{ route('blog') }}" class="nav-link menu-title">Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="menu-right">
                            <ul>
                                <li>
                                    <div class="search-box theme-bg-color">
                                        <i data-feather="search"></i>
                                    </div>
                                </li>
                                <li class="onhover-dropdown wislist-dropdown">
                                    <div class="cart-media">
                                        <a href="{{ route('wishlist.product.list') }}">
                                            <i data-feather="heart"></i>
                                            <span id="wishlist-count" class="label label-theme rounded-pill">
                                                {{ Cart::instance('wishlist')->content()->count() }}
                                            </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="onhover-dropdown wislist-dropdown">
                                    <div class="cart-media">
                                        <a href="{{ route('cart.index') }}">
                                            <i data-feather="shopping-cart"></i>
                                            <span id="cart-count" class="label label-theme rounded-pill">
                                                {{ Cart::instance('cart')->content()->count() }}
                                            </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="onhover-dropdown">
                                    <div class="cart-media name-usr">
                                        @auth<span>{{ Auth::user()->name }}</span>@endauth
                                        <i data-feather="user"></i>
                                    </div>
                                    <div class="onhover-div profile-dropdown">
                                        <ul>
                                            @if (Route::has('login'))
                                                @auth
                                                    @if (Auth::user()->utype === 'ADM')
                                                        <li>
                                                            <a href="{{ route('admin.index') }}"
                                                                class="d-block">Dashboard</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('user.index') }}" class="d-block">My
                                                                Account</a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();document.getElementById('frmlogout').submit();"
                                                            class="d-block">Logout</a>

                                                        <form id="frmlogout" action="{{ route('logout') }}" method="POST">
                                                            @csrf

                                                        </form>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{ route('login') }}" class="d-block">Login</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('register') }}" class="d-block">Register</a>
                                                    </li>
                                                @endauth
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="search-full">
                            <form method="GET" class="search-full" action="http://localhost:8000/search">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" name="q" class="form-control search-type"
                                        placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
