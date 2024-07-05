@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>वितरण कार्ययोजना</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                वितरण कार्ययोजना
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div style="display: flex;justify-content: space-between">
                    <h6>वितरण कार्ययोजना</h6>
                    <a href="{{route('admin.spermDistribution.create')}}"
                       class="btn btn-sm btn-primary"> Add New
                    </a>
                </div>

                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><h6>#</h6></th>
                            <th><h6>नाम</h6></th>
                            <th><h6>जात</h6></th>
                            <th><h6>पहिचान चिन्ह</h6></th>
                            <th><h6>क्षेत्र वा प्रदेश</h6></th>
                            <th><h6>समय</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($spermDistributions as $spermDistribution)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td class="min-width">
                                    <p>{{$spermDistribution->name}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$spermDistribution->pedigreeCaste->title ?? ''}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$spermDistribution->tag}}</p>
                                </td>

                                <td class="min-width">
                                    <p>{{$spermDistribution->address ?? ''}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$spermDistribution->duration ?? ''}}</p>
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.spermDistribution.edit', $spermDistribution)}}" class="text-info mx-2">
                                            <button class="btn text-warning btn-sm float-left">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <form action="{{route('admin.spermDistribution.destroy',$spermDistribution)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger show_confirm btn  btn-success btn-sm" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
