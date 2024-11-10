@extends('Pets.Layout.Layout')
@section('style')
@endsection
@section('title')
    Change Password
@endsection

@section('content')
    <livewire:users.change-password :token="$token" />
@endsection
