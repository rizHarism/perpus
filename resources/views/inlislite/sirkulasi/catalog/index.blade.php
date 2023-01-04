@extends('layouts.inlislite.app')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('inlislite.sirkulasi.catalog.html')
@endsection
@section('extra_javascript')
    @include('inlislite.sirkulasi.catalog.javascript')
@endsection
