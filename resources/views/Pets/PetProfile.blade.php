@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
@section('title')
    Pet Profile
@endsection
@endsection
@section('content')
<livewire:pets.profile.pet :code="$code"/>
@endsection
