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
    <link rel="stylesheet" href="{{ asset('backend/css/bstyle.css') }}">
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('backend.component.slidebar')
        <div id="content-wrapper" class="d-flex flex-colum">
            <div id="content">
                @include('backend.component.topbar')
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Quản lí loại sản phẩm </h1>
                    @include('backend.component.flash-message')
                    <div class="d-add"><a href="{{ route('lproduct.create') }}"><button type="button"
                                class="btn btn-primary">Thêm mới</button></a></div>
                    <div class="___class_+?5___">
                        <div class="table-custom">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên loại sản phẩm</th>

                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }} </td>
                                            <td>{{ $item->name }}</td>

                                            <td>{{ $item->created_at }}</td>
                                            <td style="width: 60px">
                                                @if ($item->status == 1)
                                                    <a href="/admin/Lproduct/checked/{{ $item->id }}"> <i
                                                            class="far fa-check-circle fa-2x"
                                                            style="color: green"></i></a>
                                                @else
                                                    <a href="/admin/Lproduct/checked/{{ $item->id }}"><i
                                                            class="far fa-times-circle fa-2x" style="color:red "></i></a>
                                                @endif

                                            </td>

                                            <td>
                                                <a href="/admin/Lproduct/edit/{{ $item->id }}"> <button
                                                        type="button" class="btn-success">
                                                        Sửa</button></a>
                                                <a href="/admin/Lproduct/delete/{{ $item->id }}"><button
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Xác nhận xóa sản phẩm này ?')">Xóa</button></a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>

                            </table>



                        </div>


                    </div>
                </div>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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
