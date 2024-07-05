@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 ps-4">
                        <img src="{{ $employee->photo }}" class="ps-2" alt=""
                            height="200" width="200">
                    </div>
                    <div class="col-md-9 pt-2">
                        <h1>
                            {{ $employee->name }}</h1>
                        <h5>{{ $employee->designation->title }}</h5>
                        <p> <i class="fa fa-phone"></i> {{ $employee->phone }}</p>
                        <a href="{{ route('static','contactUs') }}" class="btn btn-primary btn-smx pt-2"
                            style="border-radius: 20px; font-size:12px">Contact</a>
                    </div>
                </div>
                <div class="pt-2 ps-4">
                    <P>Follow me on:</P>
                    <div class="d-flex gap-3 fs-4">
                       <a href="{{ $employee->fb_url }}"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="{{ $employee->insta_url }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                      <a href="{{ $employee->twitter_url }}">   <i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </div>
                    <div class="mt-4">
                        {!! $employee->experience_n_research !!}

                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="ed-card">
                    <h3>
                        Personal information
                    </h3>
                    <table>

                        <tbody>
                            <tr>
                                <th style="width: 30%; padding:10px;">Name:</th>
                                <td style="width: 70%;">{{ $employee->name }}</td>
                            </tr>

                            <tr>
                                <th style="width: 30%; padding:10px;">Academic Qualification:</th>
                                <td style="width: 70%;">{{ $employee->acedamic_qualification }}
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 30%; padding:10px;">Office:</th>
                                <td style="width: 70%;">{{ $employee->current_office }}</td>
                            </tr>
                            <tr>
                                <th style="width: 30%; padding:10px;">Email:</th>
                                <td style="width: 70%;">{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th style="width: 30%; padding:10px;">Phone:</th>
                                <td style="width: 70%;">{{ $employee->phone }}</td>
                            </tr>
                            <tr>
                                <th style="width: 30%; padding:10px; vertical-align: top;">Expertise:</th>
                                <td style="width: 70%;">
                                    {!! $employee->expertise !!}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
