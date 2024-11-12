@extends('Pets.Layout.Layout')
@section('style')

@section('title')
    Register Pet
@endsection
@endsection
@section('content')
<div>
    <div class="card-form">
        <label class="header">{{ __('messages.error') }}</label>
        <p class="comgrate-p">{{ __('messages.code_not_found_or_registered') }}</p>
        <div class="button-class-2">
            <a style="width: 180px;margin: auto;" href="{{route('login.user')}}">{{ __('messages.go_login') }}</a>
        </div>
    </div>
</div>
@endsection
