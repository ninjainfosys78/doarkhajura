@extends('layouts.master')
@section('content')

    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(request()->language=='en') {{$documentCategory->title_en}} @else {{$documentCategory->title}} @endif</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-newspaper-o"></i> @if(request()->language=='en') {{$documentCategory->title_en}} @else {{$documentCategory->title}} @endif
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>{{__('S.N')}}</th>
                <th>{{__('Title')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Published Date')}}</th>
                <th>{{__('Publisher')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @forelse($documentCategory->documents as $document)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        @if(request()->language=='en')
                        <td>{{$document->title_en}}</td>
                        @else
                            <td>{{$document->title}}</td>
                        @endif
                        @if(request()->language=='en')
                        <td>{{$document->documentCategory->title_en ?? ''}}</td>
                        @else
                            <td>{{$document->documentCategory->title ?? ''}}</td>
                        @endif
                        <td>
                            {{$document->published_date }}
                        </td>
                        @if(request()->language=='en')
                        <td>{{$document->publisher_en}}</td>
                        @else
                            <td>{{$document->publisher}}</td>
                        @endif
                        <td>
                            <a href="{{route('documentDetail',[$document->slug,'language'=>$language])}}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>{{__('View Details')}}
                            </a>
                        </td>
                    </tr>
                @empty
                    @foreach($documentCategory->mainDocuments as $mainDocument)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        @if(request()->language=='en')
                        <td>{{$mainDocument->title_en}}</td>
                        @else
                            <td>{{$mainDocument->title}}</td>
                        @endif
                        @if(request()->language=='en')
                        <td>{{$mainDocument->mainDocumentCategory->title_en ?? ''}}</td>
                        @else
                            <td>{{$mainDocument->mainDocumentCategory->title ?? ''}}</td>
                        @endif
                        <td>
                            {{$mainDocument->published_date }}
                        </td>
                        @if(request()->language=='en')
                            <td>{{$mainDocument->publisher_en}}</td>
                        @else
                            <td>{{$mainDocument->publisher}}</td>
                        @endif

                        <td>
                            <a href="{{route('documentDetail',[$mainDocument->slug,'language'=>$language])}}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> {{__('View Details')}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
@endsection
