@extends('layouts.inlislite.app')
@section('title', 'Data Lokasi')
@section('breadcrumb', 'Data Lokasi')
@section('content')
    @include('inlislite.koleksi.location.html')
@endsection
@section('extra_javascript')
    @include('inlislite.koleksi.location.javascript')
@endsection
