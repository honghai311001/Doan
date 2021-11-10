@if (Session::has('Cart') != null)

    @foreach (Session::get('Cart')->products as $item)
        <tr>
            <td>
                <img class="img-product-cart" src="/images/products/{{ $item['productInfo']->avatar }}" alt="">
            </td>
            <td>{{ $item['productInfo']->name }}</td>
            <td><span class="amount">
                    {{ number_format($item['productInfo']->price_sale) }} </span></td>
            <td>
                <input id="{{ $item['productInfo']->id }}" name="quantity" class="form-control" type="number"
                    value="{{ $item['quanty'] }}" min="1" max="1000"
                    onchange="onChangeSL({{ $item['productInfo']->id }})">
                <input type="number" hidden id="price" value="{{ $item['productInfo']->price_sale }}">
            </td>
            <td>{{ $item['price'] }}</td>
            <td>
                <div class="removeCart" data-id="{{ $item['productInfo']->id }}">Xóa
                </div>
            </td>
        </tr>
    @endforeach


@else
    <div>
        Không có sản phẩm nào trong giỏ hàng
    </div>
@endif
