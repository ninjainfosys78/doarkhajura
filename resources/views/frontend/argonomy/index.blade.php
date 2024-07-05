@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-9">
                <div class="agromony-image text-white">
                    @if ($agronomy->isNotEmpty())
                        <img src="{{ $agronomy->first()->photo }}" alt="{{ $agronomy->first()->title }}" height="450"
                            width="100%">
                        <h4>{{ $agronomy->first()->title }}</h4>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="info-title" style="background-color: {{ $colors->nav }};"><i class="fa fa-newspaper-o"></i> अनुसन्धानकर्ता</h4>

                <div class="info">
                    @foreach ($agronomy as $item)
                        @if ($item->Scientist)
                            <div class="row mb-3 mt-2">
                                <div class="col-md-4">
                                    <div class="employee-image">
                                        <img src="{{ $item->Scientist->photo }}" alt="" height="100"
                                            width="100" class="rounded-circle border border-dark">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="employee-head text-danger">
                                        <h5>{{ $item->Scientist->name }}</h5>
                                        <p class="text-dark">{{ $item->Scientist->designation->title }}</p>
                                        <a href="{{ route('employeeDetail.index', $item->Scientist->id) }}"
                                            class="btn btn-primary btn-sm"
                                            style="border-radius: 20px; font-size:12px">प्रोफाइल
                                            हेर्नुहोस्</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <hr>
                        @if ($item->TechnicalOfficer)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="employee-image">
                                        <img src="{{ $item->TechnicalOfficer?->photo }}" alt="" height="100"
                                            width="100" class="rounded-circle border border-dark">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="employee-head text-danger">
                                        <h5>{{ $item->TechnicalOfficer?->name }}</h5>
                                        <p class="text-dark">{{ $item->TechnicalOfficer?->designation->title }}</p>
                                        <a href="{{ route('employeeDetail.index', $item->TechnicalOfficer?->id) }}"
                                            class="btn btn-primary btn-sm"
                                            style="border-radius: 20px; font-size:12px">प्रोफाइल
                                            हेर्नुहोस्</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                @if ($agronomy->isNotEmpty() && $agronomy->first()->quotes)
                    <blockquote class="mt-4">
                        <h5 class="fw-bold" style="padding-left:10px;">{{ $agronomy->first()->quotes }}</h5>
                    </blockquote>
                @endif
            </div>
        </div>
        <div class="row container">
            <div class="col-md-12 p-4">
                @if ($agronomy->isNotEmpty())
                    {!! $agronomy->first()->description !!}
                @endif
            </div>
        </div>

        @include('frontend.argonomy.document')
        @include('frontend.argonomy.galleryslider')
        @include('frontend.argonomy.videogallery')
    </div>


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



