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
                                            <li>Tin tức</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->
                        
                        <!--blog area start-->
                        <div class="blog_area">
                            <div class="row">   
                                @foreach($posts as $post)

                                @php
                                    $photo=explode(',',$post->photo);
                                @endphp
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_blog">
                                        <div class="blog_thumb">
                                            <a href="{{route('blog-detail',$post->slug)}}"><img src="{{$photo[0]}}" alt=""></a>
                                        </div>
                                        <div class="blog_content">
                                          
                                            <h3><a href="{{route('blog-detail',$post->slug)}}">{{$post->title}}</a></h3>
                                            <p>{!! $post->summary !!}</p>
                                            <div class="post_footer">
                                                <div class="post_meta">
                                                    <ul>
                                                        <li>{{$post->created_at->format('s:i:H d-m-Y ')}}</li>
                                                    </ul>
                                                </div>
                                                <div class="Read_more">
                                                    <a href="{{route('blog-detail',$post->slug)}}">Chi tiết  <i class="fa fa-angle-double-right"></i></a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>    
                        </div>
                        <!--blog area end-->
                        
                        <!--pagination style start--> 
                        <div class="blog_pagination">
                            <div class="row">
                                <div class="col-12">
                                   {{$posts->links()}}
                                </div>
                            </div>
                        </div>
                        <!--pagination style end--> 
 
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
@endsection