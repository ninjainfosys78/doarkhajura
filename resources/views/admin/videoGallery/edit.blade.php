@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>VideoGallery</h2>
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
                            <li class="breadcrumb-item"><a href="">VideoGallery</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>


    <div class="card-style mb-30">
        <h6 class="mb-25">Update Video Gallery</h6>
        <form action="{{ route('admin.videoGallery.update', $videoGallery) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="title">शीर्षक</label>
                        <input type="text" id="title" name="title" placeholder="शीर्षक"
                            value="{{ old('title', $videoGallery->title) }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @if (config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="title_en">शीर्षक (English)</label>
                            <input type="text" id="title_en" name="title_en" placeholder="शीर्षक English"
                                value="{{ old('title_en', $videoGallery->title_en) }}">
                            @error('title_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="url">भिडियो </label>
                        <input type="text" id="url" name="url" value="{{ old('url', $videoGallery->url) }}">
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="select-style-2">
                        <div class="select-position">
                            <label for="research_unit_id">अनुसन्धान इकाई</label>
                            <select id="research_unit_id" name="research_unit_id"
                                class="@error('research_unit_id') is-invalid @enderror">
                                <option value="">-- Select Department --</option>
                                @foreach ($researchUnits as $researchUnit)
                                    <option value="{{ $researchUnit->id }}"
                                        {{ old('research_unit_id', $videoGallery->research_unit_id) == $researchUnit->id ? 'selected' : '' }}>
                                        {{ $researchUnit->research_unit_name }}
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
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
