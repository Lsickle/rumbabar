@extends('errors::illustrated-layout')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __($exception->getMessage() ?: 'Server Error'))
@section('image')
<img src="{{url(asset('/svg/500.svg'))}}" alt="Server Error">
@endsection
