@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('image')
<img src="{{url(asset('/svg/403.svg'))}}" alt="Forbidden">
@endsection
