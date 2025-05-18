@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Giỏ hàng của bạn-Gille')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Giỏ hàng của bạn</li>

                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--shopping cart area start -->
<div class="shopping_cart_area">
    @if(session()->has('cart')>0)
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="cart_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product_name">Tên sản phẩm</th>
                                <th class="product_thumb">Hình ảnh</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Só lượng</th>
                                <th class="product_total">Thành tiền</th>
                                <th class="product_remove">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach ($newcart->products as $item)
                                    @php
                                        $photo = explode(',', $item['productInfo']->photo);
                                    @endphp
                                    <tr>
                                        <td class="product_name"><a href="#">{{ $item['productInfo']->title }}</a>
                                        </td>
                                        <td class="product_thumb"><a href="#"><img src="{{ $photo[0] }}"
                                                    style="height: 100px" alt=""></a>
                                        </td>
                                        <td class="product-price">{{ number_format($item['productInfo']->price), 2 }}đ
                                        </td>
                                        <td class="product_quantity">
                                            <form action="{{ route('cart-update', $item['productInfo']['id']) }}"
                                                method="GET">
                                                @csrf
                                                <input class="cart-item" min="0" name="quantity" max="100"
                                                    value="{{ $item['quantity'] }}" type="number"
                                                    data-href={{ route('cart-update', $item['productInfo']['id']) }}>
                                                <div class="cart_submit">
                                                    {{-- <button type="submit">Cập nhật</button> --}}
                                                </div>
                                            </form>
                                        </td>
                                        <td class="product_total">{{ number_format($item['price']), 2 }}đ</td>
                                        <td class="product_remove"><a
                                                href="{{ route('deleteCart', $item['productInfo']->id) }}"><i
                                                    class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- <div class="cart_submit">
                        <button type="submit">Cập nhật</button>
                    </div> --}}
            </div>
        </div>
    </div>
    @else
    <h4>Giỏ hàng của bạn đang trống</h4>
    @endif
    <!--coupon code area start-->
    <div class="coupon_area">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="coupon_code">
                    <h3>Thông tin đơn hàng</h3>
                    <div class="coupon_inner">
                        <div class="cart_subtotal">
                            <p>Tổng tiền</p>
                            @if (session('cart'))
                                <p class="cart_amount">{{ number_format($newcart->totalPrice), 2 }}đ </p>
                            @else
                                <p class="cart_amount">0đ</p>
                            @endif
                        </div>
                        @if(session('cart'))
                        <div class="checkout_btn">
                            <a href="/checkout">Thanh toán</a>
                        </div>
                        @else
                        <div class="checkout_btn">
                            <a href="/checkout" style="pointer-events: none">Thanh toán</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area end-->

</div>
<!--shopping cart area end -->


</div>
<!--pos page inner end-->
</div>
</div>
<script>
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach((value) => {
        value.addEventListener('input', (event) => {
            console.log(event.target.dataset.href)
            event.target.parentElement.submit();
        });

    });
</script>
<!--pos page end-->
@endsection
