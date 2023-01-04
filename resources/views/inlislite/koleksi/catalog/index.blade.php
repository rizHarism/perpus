@extends('layouts.inlislite.app')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('inlislite.koleksi.catalog.html')
@endsection
@section('extra_javascript')
    @include('inlislite.koleksi.catalog.javascript')
@endsection
