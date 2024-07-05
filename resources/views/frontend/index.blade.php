@extends('layouts.master')
@section('content')
    <section class="newsbar-section mt-2">
        <div class="container-fluid">
            <div class="newsbar-container" style="background-color: {{ $colors->scroller }}">
                <div class="flex-shrink-0 newsbar-title pr-lg-3">{{ __('Latest News') }}</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <ul class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            @foreach ($tickerFiles as $tickerFile)
                                <li>
                                    <a href="{{ route('documentDetail', [$tickerFile->slug, 'language' => $language]) }}">
                                        @if (request()->language == 'en')
                                            {{ $tickerFile->title_en }}
                                        @else
                                            {{ $tickerFile->title }}
                                        @endif {{ $tickerFile->published_date }}
                                        <span class="type">{{ __('New') }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </marquee>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="introduction mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 order-3 order-lg-1">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                            <div class="well-heading" style="color:black;">
                               <a href="https://opac.narc.gov.np/opac_css/" target="_blank">
                                <i class="fa fa-arrow-circle-right"></i>
                                NARC online Library
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="report">
                        <div class="accordion" id="accordionExample">
                            @foreach ($researchUnits as $key => $researchUnit)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                            aria-controls="collapse{{ $key }}">
                                            <a href="{{ route('argonomy.index', $researchUnit->id) }}">
                                                <i class="fa fa-arrow-circle-right p-2"></i>
                                                @if (request()->language == 'en')
                                                    {{ $researchUnit->research_unit_name_en }}
                                                @else
                                                    {{ $researchUnit->research_unit_name }}
                                                @endif
                                            </a>
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}"
                                        class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled custom-list">
                                                @foreach ($researchUnit->researchUnits as $subResearchUnit)
                                                    <li>
                                                        <a href="{{ route('argonomy.index', $subResearchUnit->id) }}"
                                                            class="text-decoration-none">

                                                            @if (request()->language == 'en')
                                                                {{ $subResearchUnit->research_unit_name_en }}
                                                            @else
                                                                {{ $subResearchUnit->research_unit_name }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>



                    {{-- <div class="intro mt-2" style="padding-left: 35px;">
                        <i class="fa fa-arrow-circle-right"></i>
                        NARC online Library
                    </div>
                    <div class="intro mt-2" style="padding-left: 35px;">
                        <i class="fa fa-arrow-circle-right"></i>
                        NARC online Library
                    </div>
                    <div class="intro mt-2" style="padding-left: 35px;">
                        <i class="fa fa-arrow-circle-right"></i>
                        NARC online Library
                    </div> --}}


                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div id="slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($sliders as $sliderButton)
                                <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"
                                    @if ($loop->first) aria-current="true" @endif
                                    aria-label="Slide {{ $loop->iteration }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($sliders as $slider)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ $slider->photo }}" class="d-block w-100 " style="height:280px;"
                                        alt="{{ $slider->title }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        @if (request()->language == 'en')
                                            <p>{{ $slider->title_en }}</p>
                                        @else
                                            <p>{{ $slider->title }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="intro mt-2">
                        <h6 class="heading mb-2">
                            @if (request()->language == 'en')
                                {{ $officeDetail->title_en ?? '' }}
                            @else
                                {{ $officeDetail->title ?? '' }}
                            @endif
                        </h6>
                        <p class="text-withlink">
                            @if (request()->language == 'en')
                                {!! Str::words($officeDetail->description_en ?? '', 500, '...') !!}
                            @else
                                {!! Str::words($officeDetail->description ?? '', 500, '...') !!}
                            @endif

                            <a class="intro-title"
                                href="{{ route('officeDetail', [$officeDetail->slug ?? '', 'language' => $language]) }}">
                                {{ __('View More') }}
                            </a>
                    </div>


                </div>
                <div class="col-lg-3 order-2 order-lg-3">
                    <img src="https://doarkhajura.narc.gov.np/assets/image/call.jpeg" alt="" width="100%"
                        height="50">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12 mt-3 mt-md-0">
                            <div class="card-01">
                                @if ($header->chief_id || $header->information_officer_id)
                                    <ul class="list list-01">
                                        <li>
                                            @if ($header->chief_id)
                                                <div class="avatar avatar-lg">
                                                    <img src="{{ $header->chief->photo ?? '' }}"
                                                        alt="{{ $header->chief->name ?? '' }}">
                                                </div>
                                                <div class="textbox-01">
                                                    @if (request()->language == 'en')
                                                        <h6>{{ $header->chief->name_en ?? '' }}</h6>
                                                    @else
                                                        <h6>{{ $header->chief->name ?? '' }}</h6>
                                                    @endif
                                                    <p>{{ __('Office Chief') }}</p>
                                                    <p><i class="fa fa-phone"></i> {{ $header->chief->phone ?? '' }}</p>
                                                    <p><i class="fa fa-envelope"></i> {{ $header->chief->email ?? '' }}
                                                    </p>
                                                </div>
                                        </li>
                                @endif
                                @if ($header->information_officer_id)
                                    <li>
                                        <div class="avatar avatar-lg">
                                            <img src="{{ $header->informationOfficer->photo ?? '' }}"
                                                alt="{{ $header->informationOfficer->name ?? '' }}">
                                        </div>
                                        <div class="textbox-01">
                                            @if (request()->language == 'en')
                                                <h6>{{ $header->informationOfficer->name_en ?? '' }}</h6>
                                            @else
                                                <h6>{{ $header->informationOfficer->name ?? '' }}</h6>
                                            @endif
                                            <p>{{ __('Information Officer') }}</p>
                                            <p>
                                                <i class="fa fa-phone"></i> {{ $header->informationOfficer->phone ?? '' }}
                                            </p>
                                            <p>
                                                <i class="fa fa-envelope"></i>
                                                {{ $header->informationOfficer->email ?? '' }}
                                            </p>
                                        </div>
                                    </li>
                                @endif

                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12 mt-3">
                            @if ($documents->isNotEmpty())
                                <div class="info">
                                    <h4 class="info-title" style="background-color: {{ $colors->nav }};"><i class="fa fa-newspaper-o"></i> सूचना /
                                        जानकारी</h4>
                                    <table class="table table-responsive table-striped downloadtable">
                                        <thead>
                                            <tr>
                                                <th width="95%"> शीर्षक</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documents as $document)
                                                <tr class="ng-star-inserted">
                                                    <td class="pub-title">
                                                        <a class="color-black"
                                                            href="#/single-notice/{{ $document->id }}">
                                                            {{ $document->title }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if ($document->files->isNotEmpty())
                                                            <a target="_blank"
                                                                href="{{ $document->files->first()->url }}">
                                                                <i class="fa fa-download btn btn-success btn-sm"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="4">
                                                    <a class="btn btn-success btn-sm" href="#/news/1"> थप हर्नुहोस् </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            @if ($documents->isNotEmpty())
                                <div class="info mt-2">
                                    <h4 class="info-title" style="background-color: {{ $colors->nav }};"><i class="fa fa-bell"></i> सूचना /
                                        गातिबिधिहरु</h4>
                                    <table class="table table-responsive table-striped downloadtable">
                                        <thead>
                                            <tr>
                                                <th width="95%"> शीर्षक</th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documents as $document)
                                                <tr class="ng-star-inserted">
                                                    <td class="pub-title">
                                                        <a class="color-black"
                                                            href="#/single-notice/{{ $document->id }}">
                                                            {{ $document->title }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if ($document->files->isNotEmpty())
                                                            <a target="_blank"
                                                                href="{{ $document->files->first()->url }}">
                                                                <i class="fa fa-download btn btn-success btn-sm"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="4">
                                                    <a class="btn btn-success btn-sm" href="#/news/1"> थप हर्नुहोस् </a>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.index.document')

    @include('frontend.index.farmerInfoMaterial')
    @if ($galleries->isNOtEmpty())
        <div class="container-fluid">
            <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
                <span><i class="fa fa-picture-o"></i> {{ __('Photo Gallery') }}</span>
            </h4>
        </div>
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
    @include('frontend.index.videoList')

    @include('frontend.index.researchUnit')

    @include('frontend.partials.map')
    @include('frontend.partials.links')


    <!-- Modal -->
    @if ($noticePopups->count() > 0)
        <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticeModal"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($noticePopups as $noticePopup)
                            @foreach ($noticePopup->files as $file)
                                @if ($file->extension == 'pdf')
                                    <iframe src="{{ asset('storage/' . $file->url) }}" frameborder="0"
                                        style="width:100%;height:600px;"></iframe>
                                @else
                                    <img src="{{ asset('storage/' . $file->url) }}" alt="" style="width:100%;">
                                @endif
                                <hr>
                            @endforeach
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endif

    @push('script')
        <script>
            const myCarousel = document.querySelector('#myCarousel');
            const carousel = new bootstrap.Carousel(myCarousel, {
                interval: 2000,
                wrap: false,
                loop: true
            });
        </script>
        <script>
            let items = document.querySelectorAll('#galleryCarousel .carousel-item')
            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })
        </script>
        <script>
            $(document).ready(function() {
                $("#noticeModal").modal("show");
                setTimeout(function() {
                    $('#noticeModal').modal('hide');
                }, 10000);
            });
        </script>
    @endpush
@endsection
