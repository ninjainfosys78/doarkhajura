@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{__('Video Gallery')}} </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-video-camera" aria-hidden="true"></i>  {{__('Video Gallery')}}
        </div>
        <div class="row mb-4">
            @foreach($videoGalleries as $videoGallery)
                <div class="col-md-4 mt-4">
                    <iframe width="100%" height="250" src="{!!$videoGallery->url!!}"
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div style="color:red;">
                        @if(request()->language=='en')
                        {{$videoGallery->title_en}}
                        @else
                            {{$videoGallery->title}}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
