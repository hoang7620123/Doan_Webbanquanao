@extends('frontend.layouts.master')
@section('main-content')
@section('title','Thời Trang Nam Nữ Gille')
 <!--pos home section-->
 <div class="pos_home_section">
    <div class="row">
       <!--banner slider start-->
        <div class="col-12">
            <div class="banner_slider slider_two">
                <div class="slider_active owl-carousel">
                    @foreach($banner as $banners)
                    <div class="single_slider" style="background-image: url({{$banners->photo}})">
                        <div class="slider_content">
                            <div class="slider_content_inner">  
                                {{-- <h1>fashion for you</h1> --}}
                                {{-- <p>{!!$banners->description!!}</p> --}}
                                {{-- <a href="#">shop now</a> --}}
                            </div>     
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> 
            <!--banner slider start-->
        </div>    
    </div>  
     <!--new product area start-->
    <div class="new_product_area product_two">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                <h3>Sản Phẩm Mới</h3>
            </div>
            </div> 
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @foreach($productnew as $product)
                @php
                    $photo=explode(',',$product->photo);
                @endphp
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                           <a href="{{route('product-detail',$product->slug)}}"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a> 
                           {{-- <div class="price-box">
                            @if($product->discount==0)
                            @else
                            <span class="discount-percentage">-{{$product->discount}}%</span>
                            @endif
                           </div> --}}
                           <div class="product_action">
                               <a href="{{route('add-to-cart',$product->id)}}" > <i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                           </div>
                        </div>
                        <div class="product_content">
                            <span class="old-price">{{number_format($product->price),2}}đ</span>
                            <h3 class="product_title"><a href="{{route('productview',$product->slug)}}">{{$product->title}}</a></h3>
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
    <!--new product area start--> 
           
    <!--banner area start-->
    <div class="banner_area banner_two">
        <div class="row">
            @foreach($category as $cate)
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="{{route('product-cat',$cate->slug)}}"><img src="{{$cate->photo}}" alt=""></a>
                    <div class="banner_title">
                        <p><span>{{$cate->title}}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="#"><img src="assets\img\banner\banner8.jpg" alt=""></a>
                    <div class="banner_title title_2">
                        <p>sale off <span> 30%</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner">
                    <a href="#"><img src="assets\img\banner\banner11.jpg" alt=""></a>
                    <div class="banner_title title_3">
                        <p>sale off <span> 30%</span></p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>     
    <!--banner area end--> 
                                  
    <!--featured product area start-->
    <div class="new_product_area product_two">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                <h3>Sản Phẩm Nổi Bật</h3>
            </div>
            </div> 
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @foreach($products as $product)
                @php
                    $photo=explode(',',$product->photo);
                @endphp
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                           <a href="{{route('product-detail',$product->slug)}}"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a> 
                           <div class="img_icone">
                               <img src="assets\img\cart\span-new.png" alt="">
                           </div>
                           <div class="product_action">
                               <a href="/cart-add/{{$product->id}}"> <i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                           </div>
                        </div>
                        <div class="product_content">
                            <span class="old-price">{{number_format($product->price),2}}đ</span>
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
    <!--featured product area start-->   
           
    <!--blog area start-->
    <div class="blog_area blog_two">
        <div class="row">   
            @foreach($posts as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="{{route('blog-detail',$data->slug)}}"><img src="{{$data->photo}}" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="#">Tech</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="{{route('blog-detail',$data->slug)}}">{{$data->title}}</a></h3>
                        <p>{!!$data->summary!!}</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="{{route('blog-detail',$data->slug)}}">Đọc Thêm  <i class="fa fa-angle-double-right"></i></a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
    <!--blog area end-->  
           
    <!--brand logo strat--> 
    <div class="brand_logo brand_two">
        <div class="block_title">
            <h3>Thương Hiệu</h3>
        </div>
        <div class="row">
            <div class="brand_active owl-carousel">
                @foreach($brand as $brands)
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="{{$brands->photo}}" alt="{{$brands->photo}}"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>       
    <!--brand logo end-->                                             
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

{{-- @if($products) --}}
@if($productnew)
@foreach($productnew as $product)
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
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                role="tab" aria-controls="tab1" aria-selected="false"><img
                                                    src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                        </li>
                                        @foreach($photo as $data)
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                aria-controls="tab2" aria-selected="false"><img
                                                    src="{{$data}}" alt=""></a>
                                        </li>
                                        @endforeach
                                        {{-- <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="assets\img\cart\cart19.jpg" alt=""></a>
                                        </li> --}}
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
                                        <input min="0" max="100" step="2" value="1" name="quantity"
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
@endif

@if($products)
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
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1"
                                                role="tab" aria-controls="tab1" aria-selected="false"><img
                                                    src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                        </li>
                                        @foreach($photo as $data)
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                aria-controls="tab2" aria-selected="false"><img
                                                    src="{{$data}}" alt=""></a>
                                        </li>
                                        @endforeach
                                        {{-- <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="assets\img\cart\cart19.jpg" alt=""></a>
                                        </li> --}}
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
                                        <input min="0" max="100" step="2" value="1" name="quantity"
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
@endif


@endsection

@push('styles')
<style>
</style>
@endpush