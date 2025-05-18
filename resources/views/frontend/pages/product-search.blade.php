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
                    <li>Tìm kiếm với tên từ khóa </li>
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
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">
                <div class="list_button">
                   
                </div>
                <div class="page_amount">
                    <p>Có tất cả <b>{{$countProduct}} sản phẩm</b> cho tìm kiếm</p>
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
                                   <a href="#"> <i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                               </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ number_format($product->price),2}}đ</span>
                                <h3 class="product_title"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title=" Add to Wishlist ">Yêu Thích</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Chi Tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>  
            </div>
            <div class="tab-pane fade" id="list" role="tabpanel">

                @foreach($products as $product)
                @php
                    $photo=explode(',',$product->photo);
                @endphp
                <div class="product_list_item mb-35">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-5 col-sm-6">
                            <div class="product_thumb">
                               <a href="single-product.html"><img src="{{$photo[0]}}" alt=""></a> 
                               <div class="hot_img">
                                   <img src="assets\img\cart\span-hot.png" alt="">
                               </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-6">
                            <div class="list_product_content">
                               <div class="product_ratting">
                                   <ul>
                                       <li><a href="#"><i class="fa fa-star"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star"></i></a></li>
                                       <li><a href="#"><i class="fa fa-star"></i></a></li>
                                   </ul>
                               </div>
                                <div class="list_title">
                                    <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                </div>
                                <p class="design">{!!$product->summary !!}</p>
                                <div class="content_price">
                                    @php
                                        $discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
                                    @if($product->discount==0)
                                    <span>{{number_format($product->price),2}}đ</span>
                                    @else
                                    <span>{{number_format($discount),2}}đ</span>
                                    <span class="old-price">{{number_format($product->price),2}}đ</span>
                                    @endif
                                </div>
                                <div class="add_links">
                                    <ul>
                                        <li><a href="{{route('add-to-cart',$product->id)}}" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                @endforeach                        
            </div>

        </div>
    </div>    
    <!--shop tab product end-->

    <!--pagination style start--> 
    <div class="pagination_style shop_page">
        <div class="page_number">
            {{-- <span>Pages: </span>
            <ul>
                <li>«</li>
                <li class="current_number">1</li>
                <li><a href="#">2</a></li>
                <li>»</li>
            </ul> --}}
            
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
@endsection