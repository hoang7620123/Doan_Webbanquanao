  <!-- Add your site or application content here -->
  <!--pos page start-->
  <div class="pos_page">
      <div class="container">
          <!--pos page inner-->
          <div class="pos_page_inner">
              <!--header area -->
              <div class="header_area">
                  <!--header top-->
                  <div class="header_top">
                      <div class="row align-items-center">
                          <div class="col-lg-6 col-md-6">
                              <div class="switcher">
                                  <ul>
                                      <li>
                                          <h4>3 ngày đổi hàng dễ dàng</h4>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                              <div class="header_links">
                                  <ul>
                                      <li><a href="tel:0343754517" title="Contact">
                                              <h5>0343754517</h5>
                                          </a></li>
                                      <li><a href=#" title="wishlist">
                                              <h5>Hỗ trợ mua hàng</h5>
                                          </a></li>

                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--header top end-->

                  <!--header middel-->
                  <div class="header_middel">
                      <div class="row align-items-center">
                          <!--logo start-->
                          <div class="col-lg-3 col-md-3">
                              <div class="logo">
                                  @php
                                      $settings = DB::table('settings')->get();
                                  @endphp
                                  <a href="{{ route('home') }}">
                                      @foreach ($settings as $setting)
                                          <img src="{{ $setting->logo }}" alt="">
                                      @endforeach
                                  </a>
                              </div>
                          </div>
                          <!--logo end-->
                          <div class="col-lg-9 col-md-9">
                              <div class="header_right_info">
                                  <div class="search_bar">
                                      <form action="{{ route('product-search') }}" method="POST">
                                          @csrf
                                          <input placeholder="Bạn tìm gì..." name="search" type="text">
                                          <button type="submit"><i class="fa fa-search"></i></button>
                                      </form>
                                  </div>
                                  <div class="shopping_cart">
                                      <a href="#"><i class="fa fa-shopping-cart"></i>
                                          @if (session()->has('cart'))
                                              @php $sanpham= session()->get('cart') @endphp {{ $sanpham->totalQuantity }} -
                                              {{ number_format($sanpham->totalPrice), 2 }}đ
                                          @else
                                              0  - 0đ
                                          @endif
                                          <i class="fa fa-angle-down"></i>
                                      </a>
                                      <!--mini cart-->
                                      <div class="mini_cart">
                                          @if (session()->has('cart') > 0)
                                              @foreach ($newcart->products as $key => $item)
                                                  @php
                                                      $photo = explode(',', $item['productInfo']->photo);
                                                  @endphp
                                                  <div class="cart_item">
                                                      <div class="cart_img">
                                                          <a href="#"><img src="{{ $photo[0] }}"
                                                                  alt="{{ $photo[0] }}"></a>
                                                      </div>
                                                      <div class="cart_info">
                                                          <a
                                                              href="{{ route('product-detail', $item['productInfo']->slug) }}">{{ $item['productInfo']->title }}</a>
                                                          <span
                                                              class="cart_price">{{ number_format($item['productInfo']->price), 2 }}đ</span>
                                                          <span class="quantity">Số lượng:
                                                              {{ $item['quantity'] }}</span>
                                                      </div>
                                                      <div class="cart_remove">
                                                          <a title="Remove this item"
                                                              href="{{ route('deleteCart', $item['productInfo']->id) }}"><i
                                                                  class="fa fa-times-circle"></i></a>
                                                      </div>
                                                  </div>
                                              @endforeach
                                              <div class="total_price">
                                                  <span>Tổng Tiền </span>
                                                  <span class="prices"> {{ number_format($newcart->totalPrice), 2 }}đ
                                                  </span>
                                              </div>
                                              <div class="cart_button">
                                                  <a href="/cart">Xem giỏ hàng</a>
                                                  <a href="{{ route('checkout') }}">Thanh Toán</a>
                                              </div>
                                          @else
                                              <div class="cart_item">
                                                  <div class="cart_img">
                                                      <a href="#"><img
                                                              src="{{ asset('frontend/assets/img/cart.png') }}"
                                                              alt=""></a>
                                                  </div>
                                                  <h6> Hiện chưa có sản phẩm</h6>
                                              </div>
                                              <div class="total_price">
                                                  <span>Tổng Tiền </span>
                                                  <span class="prices"> 0đ </span>
                                              </div>
                                              <div class="cart_button">
                                                  <a href="/cart">Xem giỏ hàng</a>
                                                  <a href="{{ route('checkout') }}" style="pointer-events: none"">Thanh
                                                      Toán</a>
                                              </div>
                                          @endif
                                      </div>
                                      <!--mini cart end-->
                                  </div>

                              </div>
                          </div>

                          <!-- My account -->
                          {{-- <div class="header_wishlist">
                            <a href="#" data-toggle="modal" data-target="#exampleModal"><img src="{{asset('frontend/assets/img/123.png')}}" alt=""></a>
                        </div> --}}
                  </div>
                  <!--header middel end-->
                  <div class="header_bottom">
                      <div class="row">
                          <div class="col-12">
                              <div class="main_menu_inner">
                                  <div class="main_menu d-none d-lg-block">
                                      <nav>
                                          <ul>
                                              <li class="active"><a href="{{ route('home') }}">NEW ARRIVALS</a>
                                                  <div class="mega_menu jewelry">

                                                  </div>
                                              </li>
                                              <li><a href="{{ route('product-grids') }}">Sản Phẩm</a>
                                                  <div class="mega_menu">
                                                      <div class="mega_top fix">
                                                          @php
                                                              $menu = App\Models\Category::getAllParentWithChild();
                                                          @endphp
                                                          @foreach ($menu as $value)
                                                              <div class="mega_items">
                                                                  <h3><a
                                                                          href="{{ route('product-cat', $value->slug) }}">{{ $value->title }}</a>
                                                                  </h3>
                                                                  @php
                                                                      $menuChild = App\Models\Category::getChildByParentID($value->id);
                                                                  @endphp
                                                                  <ul>
                                                                      @foreach ($menuChild as $val)
                                                                          <li><a href="#">{{ $val }}</a>
                                                                          </li>
                                                                      @endforeach
                                                                  </ul>
                                                              </div>
                                                          @endforeach
                                                      </div>
                                                      <div class="mega_bottom fix">
                                                          <div class="mega_thumb">
                                                              <a href="#"><img
                                                                      src="{{ asset('frontend\assets\img\banner\banner1.jpg') }}"
                                                                      alt=""></a>
                                                          </div>
                                                          <div class="mega_thumb">
                                                              <a href="#"><img
                                                                      src="{{ asset('frontend\assets\img\banner\banner2.jpg') }}"
                                                                      alt=""></a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>
                                              @foreach ($category as $cate)
                                                  <li>
                                                      <a
                                                          href="{{ route('product-cat', $cate->slug) }}">{{ $cate->title }}</a>
                                                  </li>
                                              @endforeach
                                              <li><a href="{{route('product-sales')}}">Khuyến Mãi</a>
                                                <div class="mega_menu jewelry">
                                                    <div class="mega_items jewelry">
                                                        <ul>
                                                            @foreach($discount as $data)
                                                            <li><a href="shop-list.html">SALE {{$data->discount}}%</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>  
                                            </li>

                                              <li><a href="{{ route('blog') }}">Tin Tức</a></li>

                                          </ul>
                                      </nav>
                                  </div>

                                  
                                  {{-- <div class="mobile-menu d-lg-none">
                                      <nav>
                                          <ul>
                                              <li><a href="index.html">NEW ARRIVALS</a>
                                                  <div>

                                                  </div>
                                              </li>
                                              <li><a href="shop.html">shop</a>
                                                  <div>
                                                      <div>
                                                          <ul>
                                                              <li><a href="shop-list.html">shop list</a></li>
                                                              <li><a href="shop-fullwidth.html">shop Full Width Grid</a>
                                                              </li>
                                                              <li><a href="shop-fullwidth-list.html">shop Full Width
                                                                      list</a></li>
                                                              <li><a href="shop-sidebar.html">shop Right Sidebar</a>
                                                              </li>
                                                              <li><a href="shop-sidebar-list.html">shop list Right
                                                                      Sidebar</a></li>
                                                              <li><a href="single-product.html">Product Details</a>
                                                              </li>
                                                              <li><a href="single-product-sidebar.html">Product
                                                                      sidebar</a></li>
                                                              <li><a href="single-product-video.html">Product Details
                                                                      video</a></li>
                                                              <li><a href="single-product-gallery.html">Product Details
                                                                      Gallery</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </li>
                                              <li><a href="#">women</a>
                                                  <div>
                                                      <div>
                                                          <div>
                                                              <h3><a href="#">Accessories</a></h3>
                                                              <ul>
                                                                  <li><a href="#">Cocktai</a></li>
                                                                  <li><a href="#">day</a></li>
                                                                  <li><a href="#">Evening</a></li>
                                                                  <li><a href="#">Sundresses</a></li>
                                                                  <li><a href="#">Belts</a></li>
                                                                  <li><a href="#">Sweets</a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <h3><a href="#">HandBags</a></h3>
                                                              <ul>
                                                                  <li><a href="#">Accessories</a></li>
                                                                  <li><a href="#">Hats and Gloves</a></li>
                                                                  <li><a href="#">Lifestyle</a></li>
                                                                  <li><a href="#">Bras</a></li>
                                                                  <li><a href="#">Scarves</a></li>
                                                                  <li><a href="#">Small Leathers</a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <h3><a href="#">Tops</a></h3>
                                                              <ul>
                                                                  <li><a href="#">Evening</a></li>
                                                                  <li><a href="#">Long Sleeved</a></li>
                                                                  <li><a href="#">Shrot Sleeved</a></li>
                                                                  <li><a href="#">Tanks and Camis</a></li>
                                                                  <li><a href="#">Sleeveless</a></li>
                                                                  <li><a href="#">Sleeveless</a></li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                      <div>
                                                          <div>
                                                              <a href="#"><img
                                                                      src="assets\img\banner\banner1.jpg"
                                                                      alt=""></a>
                                                          </div>
                                                          <div>
                                                              <a href="#"><img
                                                                      src="assets\img\banner\banner2.jpg"
                                                                      alt=""></a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>
                                              <li><a href="#">men</a>
                                                  <div>
                                                      <div>
                                                          <div>
                                                              <h3><a href="#">Rings</a></h3>
                                                              <ul>
                                                                  <li><a href="#">Platinum Rings</a></li>
                                                                  <li><a href="#">Gold Ring</a></li>
                                                                  <li><a href="#">Silver Ring</a></li>
                                                                  <li><a href="#">Tungsten Ring</a></li>
                                                                  <li><a href="#">Sweets</a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <h3><a href="#">Bands</a></h3>
                                                              <ul>
                                                                  <li><a href="#">Platinum Bands</a></li>
                                                                  <li><a href="#">Gold Bands</a></li>
                                                                  <li><a href="#">Silver Bands</a></li>
                                                                  <li><a href="#">Silver Bands</a></li>
                                                                  <li><a href="#">Sweets</a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <a href="#"><img
                                                                      src="assets\img\banner\banner3.jpg"
                                                                      alt=""></a>
                                                          </div>
                                                      </div>

                                                  </div>
                                              </li>
                                              <li><a href="#">pages</a>
                                                  <div>
                                                      <div>
                                                          <div>
                                                              <h3><a href="#">Column1</a></h3>
                                                              <ul>
                                                                  <li><a href="portfolio.html">Portfolio</a></li>
                                                                  <li><a href="portfolio-details.html">single portfolio
                                                                      </a></li>
                                                                  <li><a href="about.html">About Us </a></li>
                                                                  <li><a href="about-2.html">About Us 2</a></li>
                                                                  <li><a href="services.html">Service </a></li>
                                                                  <li><a href="my-account.html">my account </a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <h3><a href="#">Column2</a></h3>
                                                              <ul>
                                                                  <li><a href="blog.html">Blog </a></li>
                                                                  <li><a href="blog-details.html">Blog Details </a>
                                                                  </li>
                                                                  <li><a href="blog-fullwidth.html">Blog FullWidth</a>
                                                                  </li>
                                                                  <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                                  <li><a href="faq.html">Frequently Questions</a></li>
                                                                  <li><a href="404.html">404</a></li>
                                                              </ul>
                                                          </div>
                                                          <div>
                                                              <h3><a href="#">Column3</a></h3>
                                                              <ul>
                                                                  <li><a href="contact.html">Contact</a></li>
                                                                  <li><a href="cart.html">cart</a></li>
                                                                  <li><a href="checkout.html">Checkout </a></li>
                                                                  <li><a href="wishlist.html">Wishlist</a></li>
                                                                  <li><a href="login.html">Login</a></li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </li>

                                              <li><a href="blog.html">blog</a>
                                                  <div>
                                                      <div>
                                                          <ul>
                                                              <li><a href="blog-details.html">blog details</a></li>
                                                              <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                              <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </li>
                                              <li><a href="contact.html">Tin Tức</a></li>

                                          </ul>
                                      </nav>
                                  </div> --}}


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--header end -->

              <!-- Modal -->
              {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Đăng Nhập Tài Khoản</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <label>Email</label>
                            <input type="text" name="" placeholder="Email">
                            <label>Mật khẩu</label>
                            <input type="password" placeholder="Mật khẩu">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                              <button type="button" class="btn btn-danger">Đăng Nhập</button>
                          </div>
                          <div class="register">
                            <p style="text-align: center">Khách hàng mới? <a href="{{route('register')}}" style="color: blue"> Tạo tài khoản</a></p>
                            <p style="text-align: center">Quên mật khẩu? <a href="#" style="color: blue"> Khôi phục mật khẩu</a></p>
                        </div>
                        </div>
                  </div>
              </div> --}}
