@extends('Pets.Layout.Layout')
@section('style')
@endsection
@section('title')
   Token Error
@endsection

@section('content')
<div class="card-form">
    <label class="header">{{ __('messages.link_or_token_expired') }}</label>
    <p class="comgrate-p">{{ __('messages.link_or_token_expired_message') }}</p>
    <div class="button-class-2">
        <a href="{{route('login.user')}}" style="width: 180px;margin: auto;">{{ __('messages.go_login') }}</button>
    </div>
</div>
@endsection
