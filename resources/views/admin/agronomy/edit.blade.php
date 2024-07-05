@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Agronomy </h2>
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
                                Agronomy List
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                    <h6 class="mb-25">Agronomy list</h6>

                    <form action="{{ route('admin.agronomy.update', $agronomy) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="input-style-1">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror"
                                placeholder="Title" value="{{ old('title', $agronomy->title) }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (config('default.dual_language'))
                            <div class="input-style-1">
                                <label for="title_en">Title English</label>
                                <input type="text" id="title_en" name="title_en"
                                    class="@error('title_en') is-invalid @enderror" placeholder="Title"
                                    value="{{ old('title_en', $agronomy->title_en) }}">
                                @error('title_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <div class="input-style-1">
                            <label for="quotes">Quotes</label>
                            <input type="text" id="quotes" name="quotes"
                                class="@error('quotes') is-invalid @enderror" placeholder="quotes"
                                value="{{ old('quotes', $agronomy->quotes) }}">
                            @error('quotes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-style-1">
                            <label for="quotes_en">Quotes English</label>
                            <input type="text" id="quotes_en" name="quotes_en"
                                class="@error('quotes_en') is-invalid @enderror"
                                value="{{ old('quotes', $agronomy->quotes_en) }}">
                            @error('quotes_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="input-style-1">
                            <label for="files">Photo</label>
                            <input type="file" id="url" name="photo"
                                class="@error('photo') is-invalid @enderror">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="select-style-1">
                            <div class="select-position">
                                <label for="research_unit_id">अनुसन्धान इकाई</label>
                                <select id="research_unit_id" name="research_unit_id"
                                    class="@error('research_unit_id') is-invalid @enderror">
                                    <option value="">-- Select Department --</option>
                                    @foreach ($researchUnits as $researchUnit)
                                        <option
                                            {{ $researchUnit->id === old('research_unit_id', $agronomy->research_unit_id) ? 'selected' : '' }}
                                            value="{{ $researchUnit->id }}">
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


                        <div class="select-style-1">
                            <div class="select-position">
                                <label for="scientist_id">अनुसन्धानकर्ता (वैज्ञानिक\प्रबिधिका)</label>
                                <select id="scientist_id" name="scientist_id"
                                    class="@error('scientist_id') is-invalid @enderror">
                                    <option value="">-- Select Department --</option>
                                    @foreach ($employees as $employee)
                                        <option
                                            {{ $employee->id === old('scientist_id', $agronomy->scientist_id) ? 'selected' : '' }}
                                            value="{{ $employee->id }}">
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('scientist_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="select-style-1">
                            <div class="select-position">
                                <label for="technical_officer_id">अनुसन्धानकर्ता (वैज्ञानिक\प्रबिधिका)</label>
                                <select id="technical_officer_id" name="technical_officer_id"
                                    class="@error('technical_officer_id') is-invalid @enderror">
                                    <option value="">-- Select Department --</option>
                                    @foreach ($employees as $employee)
                                        <option
                                            {{ $employee->id === old('technical_officer_id', $agronomy->technical_officer_id) ? 'selected' : '' }}
                                            value="{{ $employee->id }}">
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('technical_officer_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="ckEditor">{{ old('description', $agronomy->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label for="description_en">Description_English</label>
                                <textarea name="description_en" id="description_en" cols="30" rows="10" class="ckEditor">{{ old('description_en', $agronomy->description_en) }}</textarea>
                                @error('description_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>



                        <div class="col-12">
                            <div
                                class="
                          button-group
                          d-flex
                          justify-content-center
                          flex-wrap
                        ">
                                <button type="submit" class="main-btn w-100 primary-btn btn-hover m-2">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
                <!-- end card -->

            </div>

        </div>
        <!-- end row -->
    </div>
    @push('styles')
        <link rel="stylesheet" href="//unpkg.com/nepali-date-picker@2.0.2/dist/nepaliDatePicker.min.css">
    @endpush
    @push('script')
        <script src="//unpkg.com/nepali-date-picker@2.0.2/dist/nepaliDatePicker.min.js"></script>
        <script>
            $(".nepali-date").nepaliDatePicker({
                dateFormat: "%y-%m-%d",
                closeOnDateSelect: true,
                lang: "en"
            });
        </script>
    @endpush


    @push('script')
        <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/ckeditor/editor.js') }}"></script>
        {{-- summernote js --}}
    @endpush
@endsection
