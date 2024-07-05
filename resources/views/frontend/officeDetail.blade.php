@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if(request()->language=='en')
                    {{$officeDetail->title_en}}
                    @else
                        {{$officeDetail->title}}
                    @endif
                </li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                    <i class="fa fa-clipboard" ></i> @if(request()->language=='en'){{$officeDetail->title_en}} @else {{$officeDetail->title}} @endif
                </div>
                <p class="pad">
                    @if(request()->language=='en')
                   {!! $officeDetail->description_en !!}
                    @else
                        {!! $officeDetail->description !!}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection

