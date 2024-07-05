@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Employee</h2>
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
                            <li class="breadcrumb-item"><a href="#0">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Employee
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
                    <h6 class="mb-25">Input Fields</h6>
                    <form action="{{ route('admin.employee.update', $employee) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-style-1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror"
                                placeholder="Name" value="{{ old('name', $employee->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (config('default.dual_language'))
                            <div class="input-style-1">
                                <label for="name_en">Name English</label>
                                <input type="text" id="name_en" name="name_en"
                                    class="@error('name_en') is-invalid @enderror" placeholder="Name English"
                                    value="{{ old('name_en', $employee->name_en) }}">
                                @error('name_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <div class="input-style-1">
                            <label for="photo">Photo</label>
                            <input type="file" id="photo" name="photo" class="@error('photo') is-invalid @enderror"
                                value="{{ old('photo') }}">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="select-style-2">
                            <div class="select-position">
                                <label for="designation_id">Designation</label>
                                <select id="designation_id" name="designation_id"
                                    class="@error('designation_id') is-invalid @enderror">
                                    <option value="">-- Select Designation --</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ old('designation_id', $designation->id) == $employee->designation_id ? 'selected' : '' }}>
                                            {{ $designation->title }}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="select-style-2">
                            <div class="select-position">
                                <label for="department_id">Department</label>
                                <select id="department_id" name="department_id"
                                    class="@error('department_id') is-invalid @enderror">
                                    <option value="">-- Select Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ old('department_id', $department->id) == $employee->department_id ? 'selected' : '' }}>
                                            {{ $department->title }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-style-1">
                            <label for="level">Level</label>
                            <input type="text" id="level" name="level" class="@error('level') is-invalid @enderror"
                                value="{{ old('level', $employee->level) }}">
                            @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (config('default.dual_language'))
                            <div class="input-style-1">
                                <label for="level_en">Level English</label>
                                <input type="text" id="level_en" name="level_en"
                                    class="@error('level_en', $employee->level_en) is-invalid @enderror"
                                    value="{{ old('level_en') }}">
                                @error('level_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <div class="input-style-1">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror"
                                value="{{ old('phone', $employee->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-style-1">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address"
                                class="@error('address') is-invalid @enderror"
                                value="{{ old('address', $employee->address) }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (config('default.dual_language'))
                            <div class="input-style-1">
                                <label for="address_en">Address English</label>
                                <input type="text" id="address_en" name="address_en"
                                    class="@error('address_en') is-invalid @enderror"
                                    value="{{ old('address_en', $employee->address_en) }}">
                                @error('address_en')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <div class="input-style-1">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email"
                                class="@error('email') is-invalid @enderror" placeholder="Email"
                                value="{{ old('email', $employee->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="input-style-1">
                            <label for="acedamic_qualification">Acedamic Qualification</label>
                            <textarea type="text" id="acedamic_qualification" name="acedamic_qualification"
                                class="@error('acedamic_qualification') is-invalid @enderror" placeholder="Acedamic Qualification">{{ old('acedamic_qualification', $employee->acedamic_qualification) }}</textarea>
                            @error('acedamic_qualification')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="input-style-1">
                            <label for="current_office">Current Office Address</label>
                            <input type="text" id="current_office" name="current_office"
                                class="@error('current_office') is-invalid @enderror"
                                placeholder="Current Office Address"
                                value="{{ old('current_office', $employee->current_office) }}" />
                            @error('current_office')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label for="expertise">Expertise</label>
                                <textarea name="expertise" id="expertise" cols="30" rows="10" class="ckEditor">{{ old('expertise', $employee->expertise) }}</textarea>
                                @error('expertise')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-style-1">
                                <label for="experience_n_research">Experience and Research</label>
                                <textarea name="experience_n_research" id="experience_n_research" cols="30" rows="10" class="ckEditor">{{ old('experience_n_research', $employee->experience_n_research) }}</textarea>
                                @error('experience_n_research')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-style-1">
                                    <label for="fb_url">Facebook Url</label>
                                    <input type="text" id="fb_url" name="fb_url"
                                        class="@error('fb_url') is-invalid @enderror" min="1"
                                        value="{{ old('fb_url',$employee->fb_url) }}">
                                    @error('fb_url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-style-1">
                                    <label for="insta_url">instagram Url</label>
                                    <input type="text" id="insta_url" name="insta_url"
                                        class="@error('insta_url') is-invalid @enderror" min="1"
                                        value="{{ old('insta_url',$employee->url) }}">
                                    @error('insta_url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-style-1">
                                    <label for="twitter_url">Twitter Url</label>
                                    <input type="text" id="twitter_url" name="twitter_url"
                                        class="@error('twitter_url') is-invalid @enderror" min="1"
                                        value="{{ old('twitter_url',$employee->twitter_url) }}">
                                    @error('twitter_url')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="input-style-1">
                            <label for="position">Position</label>
                            <input type="number" id="position" name="position"
                                class="@error('position') is-invalid @enderror" min="1"
                                value="{{ old('position', $employee->position) }}">
                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
    @push('script')
        <script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/backend/ckeditor/editor.js') }}"></script>
        {{-- summernote js --}}
    @endpush
@endsection
