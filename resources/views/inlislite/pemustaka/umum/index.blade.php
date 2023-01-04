@extends('layouts.inlislite.app')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('inlislite.pemustaka.umum.html')
@endsection
@section('extra_javascript')
    @include('inlislite.pemustaka.umum.javascript')
@endsection
