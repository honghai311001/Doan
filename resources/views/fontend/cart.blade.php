<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - Giỏ hàng</title>
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
                    <h3 class="breadcrumb-header">Giỏ hàng</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <section class="container-fluid">
        <div class="cart-content">
            <h2>Chi tiết giỏ hàng </h2>
            <div class="cart-detail ">
                <div>
                    <table class="listProduct">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành Tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>


                        @if (Session::has('Cart') != null)
                            <tbody class="listCart">
                                @foreach (Session::get('Cart')->products as $item)


                                    <tr>
                                        <td>
                                            <img class="img-product-cart"
                                                src="/images/products/{{ $item['productInfo']->avatar }}" alt="">
                                        </td>
                                        <td>{{ $item['productInfo']->name }}</td>
                                        <td><span class="amount">
                                                {{ number_format($item['productInfo']->price_sale) }}₫ </span>
                                            <input type="number" hidden id="price"
                                                value="{{ $item['productInfo']->price_sale }}">
                                        </td>

                                        <td>
                                            <input id="{{ $item['productInfo']->id }}" name="quantity"
                                                class="form-control" type="number" data-=""
                                                value="{{ $item['quanty'] }}" min="1" max="1000"
                                                onchange="onChangeSL({{ $item['productInfo']->id }})">
                                        </td>
                                        <td>{{ number_format($item['price']) }} ₫</td>
                                        <td>
                                            <div class="removeCart" data-id="{{ $item['productInfo']->id }}">Xóa
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach


                            @else
                                <div>không có sản phẩm trong giỏ hàng</div>
                        @endif
                        </tbody>
                    </table>
                    <a href="/"> <button> Tiếp tục mua hàng</button></a>
                </div>
                <div>
                    <div>
                        <div>
                            <span>Tổng tiền</span>
                            @if (Session::has('Cart') != null)
                                <span id="TongTien">{{ number_format(Session::get('Cart')->totalPrice) }} ₫</span>
                            @else
                                <span>0 ₫</span>
                            @endif

                        </div>
                        <br>
                        <div>
                            <p>Mua hàng trực tiếp tại cửa hàng được giảm giá 5%</p>

                            <p>Nếu đặt online Bạn hãy đồng ý với điều khoản sử dụng & hướng dẫn hoàn trả.</p>
                        </div>
                        <a href="/Checkout"><button>Đặt hàng</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <script>
        $(".listCart").on("click", ".removeCart", function() {
            $.ajax({
                url: '/delete/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                var sum = document.getElementById("TongTien").value;
                console.log(response);
                $(".listCart").html(response);
                alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');
            });
        });

        function onChangeSL(id) {
            var sl = document.getElementById(id).value;

            $.ajax({
                url: '/update/' + id + '/' + sl,
                type: 'GET',
                dataType: 'json',
                data: {
                    id: id,
                    sl: sl,
                },
            }).done(function(response) {

                $(".listCart").html(response);

            });
        }
    </script>
</body>

</html>
