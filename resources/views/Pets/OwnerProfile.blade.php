@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/profile.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Owner Profile
@endsection

@section('content')
    <livewire:pets.profile.owner :code="$code" />
@endsection
