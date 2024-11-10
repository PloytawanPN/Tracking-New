@extends('Pets.Layout.Layout')
@section('style')
@endsection
@section('title')
   404 Not Found
@endsection

@section('content')
<div class="card-form">
    <label class="header">{{ __('messages.not_found') }}</label>
    <p class="comgrate-p">{{ __('messages.not_found_message') }}</p>
</div>
@endsection
