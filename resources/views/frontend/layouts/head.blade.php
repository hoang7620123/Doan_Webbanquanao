<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title')</title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">

<!-- all css here -->
<link rel="stylesheet" href="{{asset('frontend\assets\css\bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend\assets\css\plugin.css')}}">
<link rel="stylesheet" href="{{asset('frontend\assets\css\bundle.css')}}">
<link rel="stylesheet" href="{{asset('frontend\assets\css\style.css')}}">
<link rel="stylesheet" href="{{asset('frontend\assets\css\responsive.css')}}">
<script src="{{asset('frontend\assets\js\vendor\modernizr-2.8.3.min.js')}}"></script>

 <!-- select2 -->
 <link rel="stylesheet" href="{!! asset('backend/plugins/select2/css/select2.min.css') !!}">
 <!-- toastr -->
 <link rel="stylesheet" href="{!! asset('backend/plugins/toastr/toastr.min.css') !!}">

 <style>
    @keyframes zoom {
        0% {
            transform: scale(.5);
            opacity: 0
        }

        50% {
            opacity: 1
        }

        to {
            opacity: 0;
            transform: scale(1)
        }
    }

    @keyframes lucidgenzalo {
        0% to {
            transform: rotate(-25deg)
        }

        50% {
            transform: rotate(25deg)
        }
    }

    .jscroll-to-top {
        bottom: 100px
    }

    .fcta-zalo-ben-trong-nut svg path {
        fill: #fff
    }

    .fcta-zalo-vi-tri-nut {
        position: fixed;
        bottom: 24px;
        right: 20px;
        z-index: 999
    }

    .fcta-zalo-nen-nut,
    div.fcta-zalo-mess {
        box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16)
    }

    .fcta-zalo-nen-nut {
        width: 50px;
        height: 50px;
        text-align: center;
        color: #fff;
        background: #0068ff;
        border-radius: 50%;
        position: relative
    }

    .fcta-zalo-nen-nut::after,
    .fcta-zalo-nen-nut::before {
        content: "";
        position: absolute;
        border: 1px solid #0068ff;
        background: #0068ff80;
        z-index: -1;
        left: -20px;
        right: -20px;
        top: -20px;
        bottom: -20px;
        border-radius: 50%;
        animation: zoom 1.9s linear infinite
    }

    .fcta-zalo-nen-nut::after {
        animation-delay: .4s
    }

    .fcta-zalo-ben-trong-nut,
    .fcta-zalo-ben-trong-nut i {
        transition: all 1s
    }

    .fcta-zalo-ben-trong-nut {
        position: absolute;
        text-align: center;
        width: 60%;
        height: 60%;
        left: 10px;
        bottom: 25px;
        line-height: 70px;
        font-size: 25px;
        opacity: 1
    }

    .fcta-zalo-ben-trong-nut i {
        animation: lucidgenzalo 1s linear infinite
    }

    .fcta-zalo-nen-nut:hover .fcta-zalo-ben-trong-nut,
    .fcta-zalo-text {
        opacity: 0
    }

    .fcta-zalo-nen-nut:hover i {
        transform: scale(.5);
        transition: all .5s ease-in
    }

    .fcta-zalo-text a {
        text-decoration: none;
        color: #fff
    }

    .fcta-zalo-text {
        position: absolute;
        top: 6px;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 700;
        transform: scaleX(-1);
        transition: all .5s;
        line-height: 1.5
    }

    .fcta-zalo-nen-nut:hover .fcta-zalo-text {
        transform: scaleX(1);
        opacity: 1
    }

    div.fcta-zalo-mess {
        position: fixed;
        bottom: 29px;
        right: 58px;
        z-index: 99;
        background: #fff;
        padding: 7px 25px 7px 15px;
        color: #0068ff;
        border-radius: 50px 0 0 50px;
        font-weight: 700;
        font-size: 15px
    }

    .fcta-zalo-mess span {
        color: #0068ff !important
    }

    span#fcta-zalo-tracking {
        font-family: Roboto;
        line-height: 1.5
    }

    .fcta-zalo-text {
        font-family: Roboto
    }
    
    .icon-user:before {
    content: '\f364'
}

.account {
    align-items: flex-end;
    padding-left: 3.4rem
}

.account a {
    font-size: 3rem;
    color: #333;
    line-height: 1
}
.account {
    padding-left: 3rem
}


</style>

@stack('styles')