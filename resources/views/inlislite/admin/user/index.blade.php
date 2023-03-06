@extends('layouts.inlislite.app')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('inlislite.admin.user.html')
@endsection
@section('extra_javascript')
    @include('inlislite.admin.user.javascript')
@endsection
