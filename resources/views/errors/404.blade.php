@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Not Found'))
@section('image')
<img src="{{url(asset('/svg/404.svg'))}}" alt="Not Found">
@endsection
