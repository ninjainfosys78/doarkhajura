@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{__('Contact')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{__('Phone')}}</h2>
                                <span>{{ $header->office_phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{__('Contact Address')}}</h2>
                                <span>{{ $header->office_name }}</span>
                                <span>{{ $header->office_address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2>{{__('Email')}}</h2>
                                <span>{{ $header->office_email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row" style="padding: 5px;">
                        <div class="col-md-6 border mb-4">

                            <form method="post" action="{{route('sendMessage')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> Name </label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="Name" name="name" id="name" value="{{old('name')}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email"> Email </label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="Email" name="email" value="{{old('email')}}" id="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone"> Phone Number </label>
                                            <input type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   placeholder="Phone Number" name="phone" value="{{old('phone')}}" id="phone">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject"> Subject </label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                                   placeholder="Subject" name="subject" value="{{old('subject')}}" id="subject">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message"> Message </label>
                                            <textarea class="form-control textarea @error('message') is-invalid @enderror"
                                                      placeholder="Message" name="message" id="message">{{old('message')}}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="update">
                                    <button type="submit" class="btn btn-primary btn-round">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <iframe src="{{$header->map_iframe}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
