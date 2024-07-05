@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Farmer Helpfull Material</h2>
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
                                Farmer Helpfull Material
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
                    <h6 class="mb-10">Farmer Helpfull Materiala</h6>
                    <a href="{{route('admin.farmerHelpfull.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><h6>#</h6></th>
                            <th><h6>Title</h6></th>
                            <th><h6>slug</h6></th>
                            <th><h6>Photo</h6></th>
                            <th><h6>Description</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($famerHelpfulls as $farmerHelpfull)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td class="min-width">
                                    <p>{{$farmerHelpfull->title}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$farmerHelpfull->slug}}</p>
                                </td>
                                <td class="min-width">
                                    <img src="{{$farmerHelpfull->photo}}" alt="{{$farmerHelpfull->title}}" width="100">
                                </td>
                                <td class="min-width">
                                    <p>{{ Str::words(strip_tags($farmerHelpfull->description), 10) }}</p>
                                </td>

                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.farmerHelpfull.edit', $farmerHelpfull)}}" class="text-info">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{route('admin.farmerHelpfull.destroy',$farmerHelpfull)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger show_confirm" type="submit">
                                                <i class="lni lni-trash-can"></i>
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
