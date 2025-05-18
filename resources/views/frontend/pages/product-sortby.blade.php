@extends('frontend.layouts.master')
@section('main-content')
@section('title','')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Danh Mục / Tất cả sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section shop_section shop_fullwidth">
    <div class="row">
        <div class="col-12">
            <!--banner slider start-->
            <div class="banner_slider fullwidht  mb-35">
                <img src="{{$banners->photo}}" alt="">
            </div> 
            <!--banner slider start-->
        </div>
    </div>       
    <div class="row">
        <div class="col-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">
                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        {{-- <li>
                            <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li> --}}
                    </ul>
                </div>
                <div class="page_amount">
                    <p>Tất cả sản phẩm</p>
                </div>
                <div class="select_option">
                    <form action="{{route('product_sort_by')}}" method="POST">
                        @csrf
                        <label>Lọc theo</label>
                        <select name="sort_by" id="short">
                            <option selected="" value="0">Mói nhất</option>
                            <option value="1">Giá: Tăng Dần</option>
                            <option value="2">Giá: Giảm dần</option>
                            <option value="3">Tên:A-Z</option>
                            <option value="4">Tên: Z-A</option>
                            <option value="5">Bán Chạy Nhất</option>
                            <option value="6">Tồn kho giảm dần</option>
                            {{-- <option value="1">In stock</option> --}}
                        </select>
                        <button  type="submit">Lọc</button>
                    </form>
                </div>
            </div>
            <!--shop toolbar end-->
        </div>
    </div>        

    <!--shop tab product-->
    <div class="shop_tab_product shop_fullwidth">   
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="large" role="tabpanel">
                <div class="row">
                    @foreach($products as $product)
                    @php
                        $photo=explode(',',$product->photo);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single_product">
                            <div class="product_thumb">
                               <a href="{{route('product-detail',$product->slug)}}"><img src="{{$photo[0]}}" alt=""></a> 
                               <div class="img_icone">
                                   <img src="assets\img\cart\span-new.png" alt="">
                               </div>
                               <div class="product_action">
                                   <a href="{{route('add-to-cart',$product->id)}}"> <i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                               </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ number_format($product->price),2}}đ</span>
                                <h3 class="product_title"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title=" Add to Wishlist ">Yêu Thích</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box_{{$product->id}}" title="Quick view">Chi Tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>  
        </div>
    </div>    
    <!--shop tab product end-->

    <!--pagination style start--> 
    <div class="">
        <div class="page_number">
            <ul>
                <li>
                {{$products->links()}}
                </li>
            </ul>
        </div>
    </div>
    <!--pagination style end-->   
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

@foreach($products as $product)
<!-- modal area start -->
<div class="modal fade" id="modal_box_{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content" id="pills-tabContent">
                                    @php
                                        $photo=explode(',',$product->photo);
                                    @endphp

                                   
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{$photo[0]}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                   
                                    {{-- <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets\img\product\product14.jpg"
                                                    alt=""></a>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets\img\product\product15.jpg"
                                                    alt=""></a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive" role="tablist">
                                        @foreach($photo as $photos)
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#{{$photos}}"
                                                role="tab" aria-controls="{{$photos}}" aria-selected="false"><img
                                                    src="{{$photos}}" alt=""></a>
                                        </li>
                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>{{$product->title}}</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    @php
                                        $giakm=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    @if($product->discount !=0)
                                    <span class="new_price">{{number_format($giakm),2}}đ</span>
                                    <span class="old_price">{{number_format($product->price),2}}đ</span>
                                    @else
                                    <span class="new_price">{{number_format($product->price),2}}đ</span>
                                    @endif
                                </div>
                                <div class="modal_content mb-10">
                                    <p>{!!$product->summary !!}</p>
                                </div>
                                <div class="modal_size mb-15">
                                    <h2>size</h2>
                                    @php
                                        $size=explode(',',$product->size)
                                    @endphp
                                    <ul>
                                        @foreach($size as $sizes)
                                        <li><a href="#">{{$sizes}}</a></li>
                                        @endforeach
                                        {{-- <li><a href="#">m</a></li>
                                        <li><a href="#">l</a></li>
                                        <li><a href="#">xl</a></li>
                                        <li><a href="#">xxl</a></li> --}}
                                    </ul>
                                </div>
                                <div class="modal_add_to_cart mb-15">
                                    <form action="{{route('single-add-cart',$product->id)}}" method="POST">
                                        @csrf
                                        <input min="0" max="100" step="2" value="1" name="sl"
                                            type="number">
                                        <button type="submit">Thêm Vào Giỏ Hàng</button>
                                    </form>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>{!! $product->description!!}</p>
                                </div>
                                <div class="modal_social">
                                    <h2>Chia sẻ qua</h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection