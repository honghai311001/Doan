<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - Thanh Toán</title>
    <link rel="icon" type="image/x-icon" href="/images/cart2.jpg">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

</head>

<body>
    <!-- HEADER -->
    @include('fontend/layout/header')
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    @include('fontend/layout/navigation')
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Thanh toán</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active">Thanh toán</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->

    <div class="section">
        <!-- container -->
        @if (Session::has('Cart') != null && Session::has('nguoi-dung') != null)
            <div class="container">
                <!-- row -->
                <div class="row">
                    <form action="/order" method="POST">
                        @csrf
                        <div class="col-md-7">
                            <!-- Billing Details -->

                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Đặt hàng</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="first-name"
                                        placeholder="Họ và tên..." value="{{ session::get('nguoi-dung')->fullname }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email"
                                        value="{{ session::get('nguoi-dung')->email }}" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Address"
                                        required>
                                </div>



                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" placeholder="Số điện thoại"
                                        value="{{ session::get('nguoi-dung')->phone }}">
                                </div>

                            </div>
                            <!-- /Billing Details -->

                            <!-- Shiping Details -->

                            <!-- /Shiping Details -->

                            <!-- Order notes -->

                            <!-- /Order notes -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Giỏ hàng của bạn</h3>
                            </div>
                            <div class="order-summary">


                                <div class="order-col">
                                    <div><strong>sản phẩm</strong></div>
                                    <div><strong>giá tiền</strong></div>
                                </div>
                                @foreach (session::get('Cart')->products as $item)
                                    <div class="order-products">
                                        <div class="order-col">
                                            <div>{{ $item['productInfo']->name }} x{{ $item['quanty'] }} </div>
                                            <div>{{ number_format($item['price']) }}</div>
                                        </div>
                                @endforeach
                            </div>
                            <div class="order-col">
                                <div>phí ship</div>
                                <div><strong>miễn phí</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>Tổng tiền</strong></div>
                                <div><strong
                                        class="order-total">{{ number_format(session::get('Cart')->totalPrice) }}</strong>
                                </div>
                            </div>
                        </div>


                        <button class="primary-btn order-submit">Đặt hàng ngay</button>
                </div>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
    </div>
@else
    <div class="container">
        <h3>không có sản phẩm </h3>
    </div>
    @endif
    <!-- /container -->
    </div>

    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    @include('fontend/layout/footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src='{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}'></script>

</body>

</html>
