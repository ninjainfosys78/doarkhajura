<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        rel="shortcut icon"
        href="{{asset('assets/backend/images/np.png')}}"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/newstyle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    @stack('style')
</head>
<body>
<button onclick="topFunction()" id="backToTop" title="Go to top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
</button>
<div class="container-fluid">
    <div class="sub-header-card d-none d-sm-block">
        <div class="row">
            <div class="col-md-6">
                <div class="sub-header-dt-card">
                    <p>
                       <x-top-bar-date-component/>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header-navbar-language">
                    <ul>
                        <li>
                            <a href="{{route('login')}}" target="_blank">
                                <p class="active">LOGIN</p>
                            </a>
                        </li>
                        @if(config('default.dual_language'))
                        <li>
                            <a href="{{route('language','en')}}">
                                <p class="active">ENGLISH</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('language','ne')}}">
                                <p class="">नेपाली</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                    @include('frontend.search.search')
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container-fluid"  style="background-image: url({{asset('storage/'.$header->background_img)}});">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <img src="{{ asset('storage/'.$header->en_header) }}" alt="" style="height: 140px;margin: 10px;">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 mt-3">
                    @foreach($officeSettingHeaders as $officeSettingHeader)
                        <p class="text-center" style="font-size:{{$officeSettingHeader->font_size}}px;font-family: {{$officeSettingHeader->font_type}};color: {{$officeSettingHeader->font_color}};line-height: 0.8 !important;font-weight: {{$officeSettingHeader->font}};">
                            @if(request()->language=='en')
                                {{$officeSettingHeader->english}}
                            @else
                                {{$officeSettingHeader->nepali}}
                            @endif
                        </p>
                    @endforeach
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <img src="{{ asset('storage/'.$header->ne_header) }}" alt="" style="height: 140px;margin:10px;">
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.nav')

</header>

@yield('content')

@include('frontend.partials.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/frontend/js/app.js') }}"></script>
@stack('script')
<script>
    document.addEventListener("DOMContentLoaded", function(){
        if (window.innerWidth > 992) {
            document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
                everyitem.addEventListener('mouseover', function(e){
                    let el_link = this.querySelector('a[data-bs-toggle]');
                    if(el_link != null){
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.add('show');
                        nextEl.classList.add('show');
                    }
                });
                everyitem.addEventListener('mouseleave', function(e){
                    let el_link = this.querySelector('a[data-bs-toggle]');
                    if(el_link != null){
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.remove('show');
                        nextEl.classList.remove('show');
                    }
                })
            });
        }
    });
</script>
<script>
    //Get the button
    const backToTop = document.getElementById("backToTop");
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTop.style.display = "block";
        } else {
            backToTop.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>

</html>
