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

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="#">News</a></li>
                    <li><a href="#">Popular</a></li>
                    <li class="cat-1"><a href="#">Web Design</a></li>
                    <li class="cat-2"><a href="#">JavaScript</a></li>
                    <li class="cat-3"><a href="#">Css</a></li>
                    <li class="cat-4"><a href="#">Jquery</a></li>
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
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
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="resources/views/index.blade.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                </ul>
            </div>
            <!-- /nav -->

            

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
<!-- /Header -->
