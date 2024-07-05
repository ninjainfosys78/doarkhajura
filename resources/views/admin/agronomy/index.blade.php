@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Agronomy</h2>
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
                                Agronomy
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
                    <h6 class="mb-10">Agronomy</h6>

                    <a href="{{route('admin.agronomy.create')}}" class="btn btn-sm btn-primary">Add New</a>

                </div>
                <div class=" table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Research Unit</th>
                            <th>Employee(वैज्ञानिक\प्रविधिका )</th>
                            <th>Employee(वैज्ञानिक\प्रविधिका)</th>
                            <th>Action</th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                         @forelse($agronomies as $agronomy)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>{{ $agronomy->title }}</td>
                                <td><img src="{{ $agronomy->photo }}" alt="" width="100" height="100"></td>
                                {{-- <td>{{ strip_tags($agronomy->description),10 }}</td> --}}
                                <td>{{ $agronomy->researchUnit->research_unit_name }}</td>
                                <td>{{ $agronomy->Scientist?->name }}</td>
                                <td>{{ $agronomy->TechnicalOfficer?->name  }}</td>

                                <td>
                                    <div class="action">

                                        <a href="{{route('admin.agronomy.edit',$agronomy)}}" class="text-info">
                                            <i class="lni lni-pencil"></i>
                                        </a>

                                        {{-- <a href="{{route('admin.documentCategory.document.show', [$documentCategory,$document])}}" class="text-info">
                                            <i class="lni lni-list"></i>
                                        </a> --}}
                                        <form action="{{route('admin.agronomy.destroy',$agronomy)}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('document_delete')
                                            <button class="text-danger show_confirm">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                            @endcan
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No Result Found</td>
                            </tr>
                        @endforelse

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
