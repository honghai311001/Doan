<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="/"><i class="fa fa-phone"></i>0933 546 421</a></li>
                <li><a href="/"><i class="fa fa-envelope-o"></i>honghai140300@gmail.com </a></li>
                <li><a href="/"><i class="fa fa-map-marker"></i> 120/29 thích quảng đức</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="/"><i class="fa fa-dollar"></i> VNĐ</a></li>
                @if (Session::has('nguoi-dung'))
                    <li><a href="/trackOrder"><i class="fa fa-user-o"></i>
                            {{ Session::get('nguoi-dung')->fullname }}</a></li>
                    <li><a href="/log-out"><i>- - </i>Đăng xuất</a></li>
                @else{
                    <li><a href="/login"><i class="fa fa-user-o"></i>
                            Đăng nhập</a></li>
                    <li><a href="/sign-up"><i>- - </i>Đăng kí</a></li>
                    }
                @endif


            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="/" class="logo">
                            <img src="{{ asset('./img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>

                            <input class="input" placeholder="nhập tên sản phẩm">
                            <button class="search-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Yêu Thích</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a href="/cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ Hàng</span>
                                <div class="qty">3</div>
                            </a>

                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
