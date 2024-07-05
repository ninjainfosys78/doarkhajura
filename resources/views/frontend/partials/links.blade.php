<div>
    <div class="row">
        <div class="col-md-6">
            <div class="info mt-4">
                <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                         {{ _('Facebook Page') }}</span>
                </h4>
                <div class="container-fluid">


                    <iframe
                        src="{{ $header->facebook_iframe }}"
                        width="500" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info mt-4">
                <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
                    <span><i class="fa fa-link" aria-hidden="true"></i>
                        &nbsp; {{ __('Related Links') }}</span>
                </h4>
                <div class="container-fluid">
                    <div class="links-card">
                        <ul>
                            @foreach ($sharedLinks as $link)
                            <li>
                                <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                            </li>

                            @endforeach

                            <a href="" class="btn btn-danger btn-sm ml-auto mt-2">{{ __('View More') }}</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info mt-4">
                <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
                    <span><i class="fa fa-youtube" aria-hidden="true"></i>
                        {{ __('Youtube') }}</span>

                </h4>
                <div class="container-fluid">
                    <div class="links-card">
                        <p><iframe width="560" height="300" src="https://www.youtube.com/embed/undefined"
                                title="" frameBorder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowFullScreen><br>Powered by <a href="https://youtubeembedcode.com">html embed youtube
                                    video</a> and <a href="https://allabeviljas.se/">smslån som beviljar
                                    alla</a></iframe></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info mt-4">
                <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">

                        <span><i class="fa fa-phone" aria-hidden="true"></i>
                            {{ __('Contact Address') }}</span>

                </h4>
                <div class="container-fluid">
                    <div class="links-card p-4 text-center text-danger">
                       <h4>
                        @if(request()->language=='en')
                            {{ $header->office_name_en }}
                        @else
                            {{ $header->office_name }}
                        @endif
                       </h4>
                       <h5>
                        @if(request()->language=='en')
                        {{ $header->office_address_en }}
                    @else
                        {{$header->office_address}}
                    @endif
                       </h5>
                       <h6> <i class="fa fa-phone"></i> {{ $header->office_phone }}</h6>
                       <p>
                        <i class="fa fa-envelope"></i> {{ $header->office_email }}
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
