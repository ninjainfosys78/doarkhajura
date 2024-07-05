@extends('layouts.master')
@section('content')

    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(request()->language=='en') {{$document->title_en}} @else {{$document->title}}  @endif</li>
            </ol>
        </nav>
    </div>
    <section class="single-category-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="textbox">
                        <h5 class="title-dark">@if(request()->language=='en') {{$document->title_en}} @else {{$document->title}}  @endif</h5>
                    </div>
                    <div class="news-iframe">
                        @foreach($document->files as $file)
                            @if(in_array($file->extension,['jpg','jpeg','png']))
                                <img src="{{ asset('storage/'.$file->url) }}" alt="Image"
                                     style="width: 100%;height: auto">
                            @elseif($file->extension=="pdf")
                                <iframe src="{{asset('storage/'.$file->url)}}" height="600px" width="100%"></iframe>
                            @else
                                <a href="{{asset('storage/'.$file->url)}}" download="{{asset('storage/'.$file->url)}}">
                                    <i class="fa fa-download"></i> Download
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="p-1">
                        @if(request()->language=='en')
                        <p> {!! $document->description_en !!}</p>
                        @else
                            <p> {!! $document->description !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box">
                        <h4 class="title mb-3">{{__('Related')}} @if(request()->language=='en') {{$document->mainDocumentCategory->title_en ?? ''}} @else  {{$document->mainDocumentCategory->title ?? ''}} @endif</h4>
                        <div class="tab-pane fade show">
                            @forelse($relatedDocuments as $relatedDocument)
                            <a  href="{{route('documentDetail',[$relatedDocument->slug,'language'=>$language])}}"
                               class="card-01 mb-2">
                                @if(request()->language=='en')
                                <h6 class="heading des">{{$relatedDocument->title_en}}</h6>
                                @else
                                    <h6 class="heading des">{{$relatedDocument->title}}</h6>
                                @endif
                                <p class="mt-2 sub-title">{{$relatedDocument->published_date}} | @if(request()->language=='en') {{$relatedDocument->publisher_en}} @else{{$relatedDocument->publisher}} @endif</p>
                            </a>
                            @empty
                                <h6>No Data !!</h6>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

