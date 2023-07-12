{{-- 固定在上方的navbar --}}
<nav class="navbar navbar-expand-xl navbar-light bg-white shadow-sm fixed-top navTop">
    <div class="container">
        <a class="navbar-brand" href="{{ route('productPage') }}">
            <h1 class="scene1">蔬菜購物網</h1>
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mx-auto">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">商品分類</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">水果</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">時蔬</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">根莖類</a></li>
                                <li><a class="dropdown-item" href="#">菇菌類</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">冷凍食品</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">火鍋料</a></li>
                                <li><a class="dropdown-item" href="#">調理食品</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="#">最新消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>

                @can('admin')
                    <li><a href="{{ route('adminPage') }}" class="nav-link adminBG">進入管理頁面</a></li>
                @endcan

            </ul>
            {{-- ----- --}}
            {{-- <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

            </ul> --}}

            <!-- Authentication Links -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            會員
                        </a>

                        <div class="dropdown-menu text-center">
                            @if (Route::has('login'))
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                            @if (Route::has('profile'))
                                <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#">
                        <i class="fa fa-shopping-cart text-danger fa-lg"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
