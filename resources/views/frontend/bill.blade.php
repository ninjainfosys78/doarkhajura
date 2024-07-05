@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Bill Publicity')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                    <i class="fa fa-clipboard" ></i> {{__('Bill Publicity')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>{{__('S.N')}}</th>
                            <th>{{__('Budget No.')}}</th>
                            <th>{{__('Expenditure heading')}}</th>
                            <th>{{__('Procurement process')}}</th>
                            <th>{{__('Page No.')}}</th>
                            <th>{{__('Bill Date')}}</th>
                            <th>{{__('Receipt date')}}</th>
                            <th>{{__('Cost')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Remarks')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bill->budget_no}}</td>
                            @if(request()->language=='en')
                            <td>{{$bill->expense_head_en}}</td>
                            <td>{{$bill->buying_process_en}}</td>
                            @else
                                <td>{{$bill->expense_head}}</td>
                                <td>{{$bill->buying_process}}</td>
                            @endif
                            <td>{{$bill->pan_no}}</td>
                            <td>{{$bill->bill_date ? $bill->bill_date->toDateString() : ''}}</td>
                            <td>{{$bill->receipt_date ? $bill->receipt_date->toDateString() : ''}}</td>
                            <td>रु. {{$bill->amount}}</td>
                            @if(request()->language=='en')
                            <td>{{$bill->description_en}}</td>
                                <td>{{$bill->remarks_en}}</td>
                            @else
                                <td>{{$bill->description}}</td>
                                <td>{{$bill->remarks}}</td>
                            @endif
                            <td>
                                <a href="{{asset('storage/'.$bill->bill_photo)}}" download="{{asset('storage/'.$bill->bill_photo)}}">
                                    <i class="fa fa-download"></i> Bill File
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
