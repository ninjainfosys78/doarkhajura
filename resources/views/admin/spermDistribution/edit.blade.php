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
                            <li class="breadcrumb-item"><a href="#0">वितरण कार्ययोजना</a></li>
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

    <div class="form-elements-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                    <h6 class="mb-25">Input Fields</h6>
                    <form action="{{route('admin.spermDistribution.update',$spermDistribution)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="input-style-1">
                            <label for="name">नाम</label>
                            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror"
                                   placeholder="नाम" value="{{old('name',$spermDistribution->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="select-style-2">
                            <div class="select-position">
                                <label for="pedigree_caste_id">जात</label>
                                <select id="pedigree_caste_id" name="pedigree_caste_id"
                                        class="@error('pedigree_caste_id') is-invalid @enderror">
                                    <option value="">-- Select Caste --</option>
                                    @foreach($pedigreeCastes as $caste)
                                        <option
                                            value="{{$caste->id}}" {{old('pedigree_caste_id', $pedigree->pedigree_caste_id)==$caste->id ? 'selected':''}}>{{$caste->title}}</option>
                                    @endforeach
                                </select>
                                @error('pedigree_caste_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="input-style-1">
                            <label for="tag">पहिचान चिन्ह</label>
                            <input type="text" id="tag" name="tag" class="@error('tag') is-invalid @enderror"
                                   placeholder="पहिचान चिन्ह" value="{{old('tag',$spermDistribution->tag)}}">
                            @error('tag')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-style-1">
                            <label for="address">क्षेत्र वा प्रदेश</label>
                            <input type="text" id="address" name="address" class="@error('address') is-invalid @enderror"
                                   placeholder="क्षेत्र वा प्रदेश" value="{{old('address',$spermDistribution->address)}}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="input-style-1">
                            <label for="duration">अबधि</label>
                            <input type="text" placeholder="अबधि" value="{{old('duration',$spermDistribution->duration)}}" name="duration" class="form-control" id="duration">
                            @error('duration')
                            {{$message}}
                            @enderror
                        </div>


                        <div class="col-12">
                            <div class="
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

@endsection
