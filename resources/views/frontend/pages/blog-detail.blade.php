@extends('frontend.layouts.master')
@section('main-content')
@section('title','')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Tin Tức / {{$post->title}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="main_blog_area blog_details">
    <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="blog_details_left">
                    <div class="blog_gallery">   
                        <div class="blog_header">
                            {{-- <span>
                                <a href="#">WordPress</a>
                            </span>
                            <h2><a href="#">Post with Gallery</a></h2> --}}
                            {{-- <div class="blog__post">
                                <ul>
                                    <li class="post_author">Posts by : admin</li>
                                    <li class="post_date"> Mar102015	</li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="blog_active owl-carousel">
                            @php
                                $photo=explode(',',$post->photo);
                            @endphp
                            @foreach($photo as $photos)
                           <div class="blog_thumb blog__hover">
                                <a href="{{route('blog-detail',$post->slug)}}"><img  src="{{$photos}}" alt="{{$photos}}"></a>
                            </div>
                            @endforeach
                            
                        </div>   

                        <div class="blog_entry_content">
                           <p>{!!$post->description !!}</p>

                          
                        </div>
                      
                        <div class="wishlist-share">
                        <h4>Chia sẻ qua:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                        </ul>      
                    </div>
                    </div> 
                     <!--services img area-->
             
                   <!--services img end-->
                </div>
            </div>
            <div class="col-lg-3 col-md-8 offset-md-2 offset-lg-0">
               <div class="blog_details_right">
                    <div class="blog_widget search_widget mb-30">
                       <h3>Tìm kiếm</h3>
                       <form action="#">
                           <input placeholder="search.." type="text">
                           <button type="submit"><i class="fa fa-search"></i></button>
                       </form>
                    </div>
      
                    <div class="blog_widget widget_categoie  mb-30">
                        <h3>Danh Mục Blog</h3>
                        <ul>
                            @foreach($postcate as $cate)
                            <li><a href="#">{{$cate->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                   
                    <div class="blog_widget widget_recent  mb-30">
                       <h3>Bài viết gần đây</h3> 
                        <div class="widget_recent_inner">   
                            @foreach($recent as $re)
                            <div class="single_posts">
                                <div class="posts_thumb">
                                    <a href="#"><img src="{{$re->photo}}" alt=""></a>
                                </div>
                                <div class="post_content">
                                    <span>
                                        <a class="tweet_author" href="#">{{$re->title}}</a>

                                    </span>
                                    <a href="#">{{$re->created_at->format('d.m.Y')}} </a>
                                </div>
                            </div>
                            @endforeach
                        </div>         
                    </div>
                </div>
            </div>
        </div>
</div>
<!--blog area end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

@endsection