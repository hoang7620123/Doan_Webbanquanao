  <!--footer area start-->
  <div class="footer_area">
      <div class="footer_top">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="footer_widget">
                          <h3>Giới Thiệu</h3>
                         
                          <p>{!!$settings->description!!}</p>
                          <div class="footer_widget_contect">
                              <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$settings->address}}</p>

                              <p><i class="fa fa-mobile" aria-hidden="true"></i> {{$settings->phone}}</p>
                              <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                 {{$settings->email}} </a>
                          </div>
                       
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="footer_widget">
                          <h3>Liên kết</h3>
                          <ul>
                              <li><a href="#">Giới thiệu</a></li>
                              <li><a href="#">Chính sách đổi trả</a></li>
                              <li><a href="#">Chính Sách Vận chuyển</a></li>
                              <li><a href="#">Chương trình khách hàng thân thiết</a></li>
                              <li><a href="#">Chính sách bảo mật</a></li>
                              <li><a href="#">Điều khoản dịch vụ</a></li>
                              <li><a href="{{route('contact')}}"> Thông Tin Liên Hệ</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="footer_widget">
                          <h3>Fanpage</h3>
                          <div class="footer-content">
							<!-- Facebook widget -->						
							<div class="footer-static-content"> 
								<div class="fb-page" data-href="https://www.facebook.com/gilleevietnam"  data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">	</div>
							</div>
							
							<div style="clear:both;" ></div>
							<!-- #Facebook widget -->
							<script>
								setTimeout(function(){
									(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&appId=263266547210244&version=v2.0";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								}, 5000);
							</script>
							
						</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer_bottom">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6 col-md-6">
                      <div class="copyright_area">
                          
                          <p>Copyright &copy; 2022 <a href="#">Đồ án nhóm 06</a>. All rights reserved. </p>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="footer_social text-right">
                          <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                              <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"
                                          aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--footer area end-->

  <!-- zalo chat-->
  @include('frontend.layouts.zalo-chat')
  @include('frontend.layouts.phone')

  <!-- comment facebook-->
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=958736781539672&autoLogAppEvents=1" nonce="3rr7Oget"></script>

  <!-- all js here -->
  <script src="{{asset('frontend\assets\js\vendor\jquery-1.12.0.min.js')}}"></script>
  <script src="{{asset('frontend\assets\js\popper.js')}}"></script>
  <script src="{{asset('frontend\assets\js\bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend\assets\js\ajax-mail.js')}}"></script>
  <script src="{{asset('frontend\assets\js\plugins.js')}}"></script>
  <script src="{{asset('frontend\assets\js\main.js')}}"></script>
  <script src="{!! asset('backend/plugins/select2/js/select2.min.js') !!}"></script>
<!-- toastr -->
<script src="{!! asset('backend/plugins/toastr/toastr.min.js') !!}"></script>
<!-- Page level custom scripts -->
{{-- <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script> --}}
{{-- <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script> --}}
<script>
    toastr.options.closeButton = true;
    @if (session('success'))
        var message = "{{ session('success') }}";
        toastr.success(message, {
            timeOut: 3000
        });
    @endif
    @if (session('error'))
        var message = "{{ session('error') }}";
        toastr.error(message, {
            timeOut: 3000
        });
    @endif
    setTimeout(function() {
        toastr.clear()
    }, 3000);
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>

<script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.getElementById("linkzalo").href = "https://chat.zalo.me/0937744254";
    }
</script>

@include('frontend.layouts.script')

@stack('scripts')