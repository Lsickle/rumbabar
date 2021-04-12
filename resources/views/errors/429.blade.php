@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __($exception->getMessage() ?: 'Too Many Requests'))
@section('image')
<img src="{{url(asset('/svg/404.svg'))}}" alt="Too Many Requests">
@endsection
