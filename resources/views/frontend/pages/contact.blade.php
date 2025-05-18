@extends('frontend.layouts.master')
@section('main-content')
@section('title','Liên Hệ Gille')
   <!--breadcrumbs area start-->
   <div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Liên hệ</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact area start-->
<div class="contact_area">
    <div class="row">
           <div class="col-lg-6 col-md-12">
               <div class="contact_message">
                    <h3>Gửi thắc mắc cho chúng tôi</h3>   
                    <form  action="{{route('post-contact')}}" id="contact-form" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Tên của bạn *" type="text">    
                            </div>
                            <div class="col-lg-6">
                                <input name="email" placeholder="Email của bạn *" type="email">    
                            </div>
                            <div class="col-lg-6">
                                <input name="subject" placeholder="Chủ Đề *" type="text">   
                            </div>
                             <div class="col-lg-6">
                                <input name="phone" placeholder="Số điện thoại của bạn *" type="text">   
                            </div>

                            <div class="col-12">
                                <div class="contact_textarea">
                                    <textarea placeholder="Nội dung *" name="message" class="form-control2"></textarea>     
                                </div>   
                                <button type="submit"> Gủi cho chúng tôi </button>  
                            </div> 
                            <div class="col-12">
                                <p class="form-messege">
                            </div>
                        </div>
                    </form>    
                </div> 
           </div>
          
           <div class="col-lg-6 col-md-12">
               <div class="contact_message contact_info">
                    <h3>Thông tin liên hệ</h3>    
                     <p>{!!$setting->description !!}</p>
                    <ul>
                        <li><i class="fa fa-fax"></i>  Địa chỉ : {{$setting->address}}</li>
                        <li><i class="fa fa-phone"></i> <a href="#">{{$setting->phone}}</a></li>
                        <li><i class="fa fa-envelope-o"></i> {{$setting->email}}</li>
                    </ul>        
                    <h3><strong>Thời gian làm việc</strong></h3>
                    <p><strong>Tất cả các ngày trong tuần</strong>:  Online: 8:00-22:00 | Offline: 10:00-21:00</p>       
                </div> 
           </div>
       </div>
</div>

<!--contact area end-->

<!--contact map start-->
<div class="contact_map">
    <div class="row">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.147393614596!2d106.65184127480525!3d10.800021089350183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175292976c117ad%3A0x5b3f38b21051f84!2zSOG7jWMgVmnhu4duIEjDoG5nIEtow7RuZyBWaeG7h3QgTmFtIENTMg!5e0!3m2!1svi!2s!4v1740135214992!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<!--contact map end-->


</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

@endsection