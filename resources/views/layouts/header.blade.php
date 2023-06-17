<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
                </div>
                <!-- /logo -->

                {{menu('main_menu', 'layouts.main_menu')}}

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    @guest
                    <button class="login-popup"><i class="fa fa-regular fa-user fa-fw"></i>Login</button>
                    @endguest
                    @auth
                    @php
                    $fullName = Auth::user()->name;
                    $lastName = explode(' ', $fullName);
                    $lastName = end($lastName);
                    @endphp
                    <button class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $lastName }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="#" >
                                    Account info
                                </a>
                            </li>
                            <li>
                                <a href="#" class="logout" >
                                    Logout
                                </a>
                            </li>

                        </ul>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            {{menu('side_menu', 'layouts.aside_menu')}}



            <!-- social links -->
            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->

    @yield('page-header')
</header>

<div class="login-area" >
    <div class="login-box">
        <a href="#"><i style="color: #0b0f28" class="fa fa-close"></i></a>
        <div class="col-6 col-offset-3">
            <h2 class="text-center">Login</h2>
            <form action="{{ route('voyager.login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center">
                <h4 style="margin-top: 10px">Or login with:</h4>
                <div class="btn-group">
                    <a href="{{ route('google.login') }}">
                        <button class="btn btn-danger">Google</button>
                    </a>

                    <button class="btn btn-primary" onclick="loginWithFacebook()">Facebook</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Header -->
