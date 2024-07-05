@if($galleries->isNotEmpty())
<h4 class="info-title " style="background-color: {{ $colors->nav }};"><i class="fa fa-picture-o" aria-hidden="true"></i> फोटो ग्यालरी</h4>
<section class="gallery-section mt-2 py-1 px-1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach ($galleries as $gallery)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <a
                                            href="{{ route('photoGalleryDetails', [$gallery->slug, 'language' => $language]) }}">
                                            <img src="{{ !empty($gallery->photos->first()) ? asset('storage/' . $gallery->photos->first()?->images) : '' }}"
                                                style="width: 100%" class="img-fluid" alt="Image">
                                        </a>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        @if (request()->language == 'en')
                                            {{ $gallery->title_en }}
                                        @else
                                            {{ $gallery->title }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#galleryCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#galleryCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
