<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/bstyle.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('backend.component.slidebar')
        <div id="content-wrapper" class="d-flex flex-colum">
            <div id="content">
                @include('backend.component.topbar')
                <div class="container-fluid">
                    <form action="/admin/discount/store" method="POST">
                        @method('POST')
                        @csrf
                        <div class="content-header">
                            <h2>Thêm Mã Giảm Giá</h2>
                            <div>
                                <button type="submit">Lưu</button>
                                <a href="{{ route('discount.index') }}">Thoát</a>
                            </div>
                            <div class="box-body">
                                <div>
                                    <h6>Tên mã giảm giá</h6>
                                    <input type="text" name="code">
                                    <h6>Số tiền giảm</h6>
                                    <input type="text" name="discount">
                                    <h6> Số lần nhập </h6>
                                    <input type="text" name="limit_number">
                                    <h6>Số tiền tối thiểu đơn hàng được áp dụng</h6>
                                    <input type="text" name="payment_limit">

                                </div>
                                <div>
                                    <h6>Ngày giới hạn nhập</h6>
                                    <input type="date" name="expiration_date">
                                    <h6>Mô tả ngắn</h6>
                                    <textarea name="description" class="form-control"></textarea>
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control" style="width:235px">
                                        <option value="1">Có hiệu lực</option>
                                        <option value="0">Không có hiệu lực</option>
                                    </select>


                                </div>
                            </div>





                        </div>
                    </form>
                    @include('backend.component.footer')
                </div>


            </div>

        </div>

        <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('backend/js/demo/chart-pie-demo.js"') }}></script>




</body>
