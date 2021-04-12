@extends('errors::illustrated-layout')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __($exception->getMessage() ?: 'Unauthorized'))
@section('image')
<img src="{{url(asset('/svg/403.svg'))}}" alt="Unauthorized">
@endsection
