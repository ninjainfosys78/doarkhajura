@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Research Units</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Research Units
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="card-style mb-30">
        <div style="display: flex;justify-content: space-between">
            <h6 class="mb-10">Research Units</h6>
            <a href="{{route('admin.researchUnit.index')}}" class="btn btn-sm btn-primary">List</a>
        </div>
        <form action="{{ route('admin.researchUnit.update',$researchUnit) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="select-style-2">
                        <div class="select-position">
                            <label for="research_unit_id">मुख्य अनुसन्धान इकाई</label>
                            <select id="research_unit_id" name="research_unit_id" class="@error('research_unit_id') is-invalid @enderror">
                                <option value="">-- Select Department --</option>
                                @foreach ($mainResearchUnits as $mainResearchUnit)
                                    <option value="{{ $mainResearchUnit->id }}"
                                        {{ $mainResearchUnit->id == old('research_unit_id',$researchUnit->research_unit_id) ? 'selected' : '' }}>
                                        {{ $mainResearchUnit->research_unit_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('research_unit_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                @if (config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="research_unit_name">अनुसन्धान इकाई नाम</label>
                            <input type="text" id="research_unit_name" name="research_unit_name"
                                placeholder="शीर्षक English"
                                value="{{ old('research_unit_name', $researchUnit->research_unit_name) }}">
                            @error('research_unit_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="research_unit_name_en">अनुसन्धान इकाई नाम English</label>
                        <input type="text" id="research_unit_name_en" name="research_unit_name_en"
                            placeholder="शीर्षक English"
                            value="{{ old('research_unit_name_en', $researchUnit->research_unit_name_en) }}">
                        @error('research_unit_name_en')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
