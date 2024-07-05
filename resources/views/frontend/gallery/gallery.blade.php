@extends('layouts.master')
@section('content')

    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{__('Photo Gallery')}} </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative; margin-bottom: 20px;background-color: {{$colors->nav}};">
            <i class="fa fa-picture-o"></i> {{__('Photo Gallery')}}
        </div>
        <div class="row mt-4 mb-4" >
            @foreach($photoAlbums as $photoAlbum)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('storage/'.$photoAlbum->photos->first()->images)}}"
                             alt="Card image cap" width="100%">
                        <div class="card-body">
                            <p class="card-text">
                                {{$photoAlbum->title}}
                                <a href="{{route('photoGalleryDetails',$photoAlbum->slug)}}" class="btn btn-outline-primary btn-xs">
                                    View Photos
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
