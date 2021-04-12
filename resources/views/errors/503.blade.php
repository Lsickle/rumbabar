@extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
@section('image')
<img src="{{url(asset('/svg/503.svg'))}}" alt="Service Unavailable">
@endsection
