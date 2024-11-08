@extends('Pets.Layout')
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
            <button style="width: 180px;margin: auto;" wire:click='go_login'>{{ __('messages.go_login') }}</button>
        </div>
    </div>
</div>
@endsection
