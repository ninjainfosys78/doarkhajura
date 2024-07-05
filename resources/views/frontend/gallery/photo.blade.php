@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item"> <a href="{{route('static',"photoGallery")}}">
                     {{__('Photo Gallery')}}
                    </a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(request()->language=='en') {{$photoGallery->title_en}}@else  {{$photoGallery->title}}@endif</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-picture-o"></i>   {{__('Photo Gallery')}}
        </div>
        <div class="row mt-4 mb-4">
            @foreach($photoGallery->photos as $photo)
                <a href="{{asset('storage/'.$photo->images)}}" data-toggle="lightbox" data-gallery="gallery"
                   class="col-md-4">
                    <img src="{{asset('storage/'.$photo->images)}}"
                         style="width: 100%;margin: 10px; object-fit: contain"
                         alt="{{$photo->title}}">
                </a>
            @endforeach
        </div>
    </div>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
        <script>
            $(document).on("click", '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
    @endpush

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    @endpush
@endsection
