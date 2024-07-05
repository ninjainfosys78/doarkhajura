<div class="info mt-3">
    <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
        <span><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp; {{ __('Research Units') }}</span>
        <a href="" class="btn btn-danger btn-sm ml-auto">{{ __('View More') }}</a>
    </h4>
    <div class="container-fluid">
        <div class="row">
            @foreach ($researchUnits as $key => $researchUnit)
            @foreach ($researchUnit->researchUnits as $subResearchUnit)

            <div class="col-md-3 mb-3">
                <div class="card-research" style="position: relative;">
                    <a class="text-decoration-none" href="{{ route('argonomy.index', $subResearchUnit) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></a>
                    <i class="fa fa-arrow-circle-right p-2">
                        @if (request()->language == 'en')
                        {{$subResearchUnit->research_unit_name_en  }}
                        @else
                        {{$subResearchUnit->research_unit_name  }}
                        @endif
                    </i>
                </div>

            </div>

          @endforeach
          @endforeach


        </div>
    </div>
</div>
