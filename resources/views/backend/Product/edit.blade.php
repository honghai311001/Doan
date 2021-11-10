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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('backend.component.slidebar')
        <div id="content-wrapper" class="d-flex flex-colum">
            <div id="content">
                @include('backend.component.topbar')
                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" id="upload-image"
                        action="/admin/product/update/{{ $items->id }}">
                        @method('PATCH')
                        @csrf
                        <div class="content-header">
                            <h2>Thêm mới sản phẩm</h2>

                            <div>
                                <button type="submit">Lưu</button>
                                <a href="{{ route('product.index') }}">thoát</a>
                            </div>
                            <div class="box-body">
                                <div>



                                    <h6>Tên sản phẩm</h6>
                                    <input type="text" name="name" value="{{ $items->name }}">
                                    <h6>Loại sản phẩm</h6>
                                    <select name="catid" class="form-control">
                                        <option value="">[--Chọn loại sản phẩm--]</option>
                                        @foreach ($category as $item)
                                            @if ($item->id == $items->catid)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif

                                        @endforeach

                                    </select>
                                    <h6> Nhà cung cấp </h6>
                                    <select name="producer" class="form-control">
                                        <option value="">[--Chọn nhà sản xuất--]</option>
                                        @foreach ($producer as $item)
                                            @if ($item->id == $items->producer)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                    <div>
                                        <h6>Mô tả ngắn</h6>
                                        <textarea name="sortDesc" class="form-control"
                                            style="width: 100%;">{{ $items->sortDesc }}</textarea>
                                    </div>
                                    <h6>Chi tiết sản phẩm</h6>
                                    <textarea class="form-control" id="summary-ckeditor"
                                        name="detail">{{ $items->detail }}</textarea>

                                </div>
                                <div>
                                    <h6>Giá gốc</h6>
                                    <input type="number" name="price_root" value="{{ $items->price }}">
                                    <h6>Khuyến mãi (%)</h6>
                                    <input type="number" name="sale_of" value="{{ $items->sale }}">
                                    <h6>Giá bán </h6>
                                    <input type="number" name="price_buy" value="{{ $items->price_sale }}">
                                    <h6>Số lượng</h6>
                                    <input type="number" name="number" value="{{ $items->number_buy }}">

                                    <h6>Trạng thái</h6>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if ($items->status == 1) {
    echo 'selected';
} ?>>Kinh doanh</option>
                                        <option value="0" <?php if ($items->status == 1) {
    echo 'selected';
} ?>>Chưa Kinh doanh</option>
                                    </select>

                                </div>

                            </div>
                        </div>


                    </form>


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

    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>


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
    <script src="{{ asset('backend/js/demo/chart-pie-demo.js"') }}"></script>

</body>
