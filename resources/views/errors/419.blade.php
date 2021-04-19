@extends('errors::illustrated-layout')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __($exception->getMessage() ?: 'Page Expired'))
@section('image')
<img src="{{url(asset('/svg/404.svg'))}}" alt="Page Expired">
@endsection
