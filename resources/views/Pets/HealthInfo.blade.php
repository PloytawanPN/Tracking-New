@extends('Pets.Layout.LayoutProfile')
@section('style')
    <link href="{{ asset('assets/css/custom/health-info.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('title')
    Heslth Information
@endsection
@section('content')
    <div style="margin-bottom: 50px">
        <livewire:pets.health-info :code="$code" />
    </div>
@endsection
