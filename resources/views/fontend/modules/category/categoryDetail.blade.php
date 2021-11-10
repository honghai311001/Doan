@foreach ($items as $item)
    <div class="col-md-4">
        <figure class="card card-product-grid card-lg"> <a href="/san-pham/{{ $item->id }}" class="img-wrap"
                data-abc="true"><img src="./images/products/{{ $item->avatar }}"></a>
            <figcaption class="info-wrap">
                <div class="row">
                    <div class="col-md-8"> <a href="/san-pham/{{ $item->id }}" class="title productName"
                            data-abc="true">{{ $item->name }}</a>
                    </div>
                    <div class="col-md-4">
                        <div class="rating text-right"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </figcaption>
            <div class="bottom-wrap"> <a onclick="AddCart({{ $item->id }})" href="javascript:"
                    class="btn btn-primary float-right" data-abc="true"> Giỏ
                    hàng </a>
                <div class="price-wrap"> <span class="price h5">{{ number_format($item->price_sale) }}
                        ₫</span>
                    <br>
                    <small class="text-success">Free ship</small>
                </div>
            </div>
        </figure>
    </div>

@endforeach
