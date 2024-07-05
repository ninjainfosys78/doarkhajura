@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Frequently Asked Questions')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $key=>$faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$key}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$key}}" aria-expanded="true"
                                        aria-controls="collapse{{$key}}">
                                    @if(request()->language=='en')
                                    {{$faq->question_en}}
                                    @else
                                        {{$faq->question}}
                                    @endif
                                </button>
                            </h2>
                            <div id="collapse{{$key}}" class="accordion-collapse collapse show"
                                 aria-labelledby="heading{{$key}}"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if(request()->language=='en')
                                    {{$faq->answer_en}}
                                    @else
                                        {{$faq->answer}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
