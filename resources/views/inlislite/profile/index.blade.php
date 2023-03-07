@extends('layouts.binaan.app')
@section('title', 'Welcome')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('inlislite.profile.html')
@endsection
@section('extra_javascript')
    @include('inlislite.profile.javascript')
@endsection
