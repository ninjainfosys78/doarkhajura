@extends('layouts.master')
@section('content')
<div class=" container-fluid mt-4">
    <a href="{{ route('farmerUsefulMaterials.index') }}"><i class="fa fa-home"></i></a> > {{ $farmerHelpfull->title }}
 </div>
<div class="container">
    <h3 class="mt-4">{{ $farmerHelpfull->title }}</h3>
    <img src="{{ $farmerHelpfull->photo }}" alt="{{ $farmerHelpfull->title }}" style="max-width: 100%; height: auto;">
    <p style="font-size: 16px;">{!! $farmerHelpfull->description !!}</p>

</div>
@endsection
