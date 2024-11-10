@extends('Pets.Layout.Layout')
@section('style')
@endsection
@section('title')
   Send Success
@endsection

@section('content')
<div class="card-form">
    <label class="header">{{ __('messages.email_sent_success') }}</label>
    <p class="comgrate-p">{{ __('messages.email_sent_message') }}</p>
    <div class="button-class-2">
        <a href="{{route('login.user')}}" style="width: 180px;margin: auto;">{{ __('messages.go_login') }}</button>
    </div>
</div>
@endsection
