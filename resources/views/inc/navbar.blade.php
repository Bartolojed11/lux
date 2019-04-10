<nav class="navbar navbar-expand-md bg-light navbar-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Lux</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(isset($category) === 'men' ) active @endif"
                           href="#" id="navbardrop" data-toggle="dropdown">
                            &nbsp;Men
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item header text-danger" href="/sale/men">Sale</a>
                            <a class="dropdown-item" href="/all/men">All</a>
                            <a class="dropdown-item" href="/shirts/men">Shirts</a>
                            <a class="dropdown-item" href="/jeans/men">Jeans</a>
                            <a class="dropdown-item" href="/shorts/men">Shorts</a>
                            <a class="dropdown-item" href="/jackets/men">Jackets</a>
                            <a class="dropdown-item" href="/gymwear/men">Gymwear</a>
                            <a class="dropdown-item" href="/blazers/men">Blazers</a>
                            <a class="dropdown-item" href="/shoes/men">Shoes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  @if(isset($category) === 'women' ) active @endif" 
                           href="#" id="navbardrop" data-toggle="dropdown">
                            &nbsp;Women
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item header text-danger" href="/shoes/women">Sale</a>
                            <a class="dropdown-item" href="/all/women">All</a>
                            <a class="dropdown-item" href="/shirts/women">Shirts</a>
                            <a class="dropdown-item" href="/dress/women">Dress</a>
                            <a class="dropdown-item" href="/jeans/women">Jeans</a>
                            <a class="dropdown-item" href="/shorts/women">Shorts</a>
                            <a class="dropdown-item" href="/jackets/women">Jackets</a>
                            <a class="dropdown-item" href="/gymwear/women">Gymwear</a>
                            <a class="dropdown-item" href="/blazers/women">Blazers</a>
                            <a class="dropdown-item" href="/shoes/women">Shoes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle
                           @if(isset($page) === 'shop' || isset($page) === 'contact' || isset($page) === 'about' 
                                || isset($page) === 'help' ) active @endif" 
                           href="#" id="navbardrop" data-toggle="dropdown">
                            &nbsp;Pages
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/shop">Shop</a>
                            <a class="dropdown-item" href="/contact">Contact</a>
                            <a class="dropdown-item" href="/about">About</a>
                            <a class="dropdown-item" href="/help">Help</a>
                        </div>
                    </li>
                </ul>
                <!-- check notes -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <input type="text" class="form-control mr-sm-2" id="navbar-search-input" placeholder="Search in Lux...">
                        </form>
                    </li>
                    @if(Auth::guest())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="fa fa-cog"></span>
                            {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}"> {{ __('Login') }} </a>
                            <a class="dropdown-item" href="{{ route('register') }}"> {{ __('register') }} </a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/1" id="profile" >
                            <span class="fa fa-user-circle-o"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/mycart/1" class="nav-link" id="cart">
                            <span class="glyphicon glyphicon-shopping-cart">Cart</span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        <button type="submit" class="btn btn-dafault">
                          Sign out
                        </button>
                        @csrf
                    </form>
                    <li class="nav-item">
                    @endif
                </ul>
                <!-- check notes -->
            </div>
        </div>
    </nav>