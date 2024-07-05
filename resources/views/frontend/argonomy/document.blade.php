@if ($farmerHelpfulls->isNotEmpty())
    <div class="document">

        <h4 class="info-title" style="background-color: {{ $colors->nav }};"><i class="fa fa-server" aria-hidden="true"></i>किसानका लागी सिफारिस/जानकारीमुलक सामग्री</h4>

        <div class=" mt-2">
            <div class="row">
                @foreach ($farmerHelpfulls as $farmerHelpfull)
                    <div class="col-md-3 mb-3">
                        <div class="card farmer-info" style="width: calc(100% - 10px); margin: 5px;">
                            <img src="{{ $farmerHelpfull->photo }}" width="150" height="200" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <a href="{{ route('farmerDetail.file', $farmerHelpfull) }}">
                                    <h6>{{ $farmerHelpfull->title }}</h6>
                                </a>
                                <p class="card-text">
                                    {{ strip_tags($farmerHelpfull->description) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endif

@if ($documents->isNotEmpty())
<div class="document">
    <h4 class="info-title" style="background-color: {{ $colors->nav }};"><i class="fa fa-newspaper-o" aria-hidden="true"></i> प्रकाशन</h4>
    <div class=" mt-2">
        <div class="row">
            @foreach ($documents as $document)
                <div class="col-md-3 mb-3">
                    <div class="card farmer-info" style="width: calc(100% - 10px); margin: 5px;">
                        <img src="{{ asset('images/pdf.jpeg') }}" height="280"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                           <a href="{{ route('documentDetail' ,$document) }}"> <h6>{{ $document->title }}</h6></a>
                            <p class="card-text">
                               {{ $document->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endif
