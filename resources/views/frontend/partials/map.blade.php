<div class="info mt-3">
    <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
        <span><i class="fa fa-map-marker" aria-hidden="true"></i>
            &nbsp; {{ __('Office Location') }}</span>

    </h4>
    <div class="container-fluid">
        <iframe src="{{$header->map_iframe}}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
