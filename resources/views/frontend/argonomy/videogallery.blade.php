
@if($videoGalleries->isNotEmpty())
<div class="info mt-3">
    <h4 class="info-title d-flex justify-content-between align-items-center"style="background-color: {{ $colors->nav }};">
        <span><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp; भिडियो ग्यालरी</span>
        <a href="{{ route('static','videoGallery') }}" class="btn btn-danger btn-sm ml-auto">{{ __('View More') }}</a>
    </h4>
    <div class="container-fluid">
        <div class="row">
            @foreach($videoGalleries as $videoGallery)

                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-img">
                                <iframe width="100%" height="200" src="{{ $videoGallery->url }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="carousel-caption d-none d-md-block">
                                <p>{{ $videoGallery->title }}</p>
                            </div>
                        </div>
                    </div>

            @endforeach
        </div>
    </div>
</div>
@endif
