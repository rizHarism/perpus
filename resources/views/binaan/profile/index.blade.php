@extends('layouts.binaan.app')
@section('title', 'Welcome')
@section('breadcrumb', 'Dashboard')
@section('content')
    @include('binaan.profile.html')
@endsection
{{-- @section('extra_javascript')
    @include('inlislite.koleksi.catalog.javascript')
@endsection --}}
