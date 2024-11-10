@extends('Pets.Layout.Layout')
@section('style')
@endsection
@section('title')
   Change Success
@endsection

@section('content')
<div class="card-form">
    <label class="header">{{ __('messages.password_change_success') }}</label>
    <p class="comgrate-p">{{ __('messages.password_change_message') }}</p>
    <div class="button-class-2">
        <a href="{{route('login.user')}}" style="width: 180px;margin: auto;">{{ __('messages.go_login') }}</button>
    </div>
</div>
@endsection
