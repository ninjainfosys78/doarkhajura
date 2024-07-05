<div class="info-farmer mt-2">
    <h4 class="info-title d-flex justify-content-between align-items-center" style="background-color: {{ $colors->nav }};">
        <span><i class="fa fa-newspaper-o"></i>&nbsp;{{ __('Recommendations/informational material for farmers') }}</span>
        <a href="{{ route('farmerUsefulMaterials.index') }}" class="btn btn-danger btn-sm ml-auto">{{__('View More')}}</a>
    </h4>
    <div class="row">
        @foreach ($farmerHelpfulls as $farmerHelpfull)
        <div class="col-md-3 mb-3">
            <div class="card farmer-info" style="width: calc(100% - 10px); margin: 5px;">
                <img src="{{ $farmerHelpfull->photo }}" class="card-img-top" alt="{{ $farmerHelpfull->title }}" height="250" width="300">
                <div class="card-body">
                   <a href="{{ route('farmerDetail.file', $farmerHelpfull)  }}"> <h6>{{ $farmerHelpfull->title }}</h6></a>
                    <p class="card-text">
                        {{ Str::words(strip_tags( $farmerHelpfull->description),20) }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
