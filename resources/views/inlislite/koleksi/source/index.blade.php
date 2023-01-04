@extends('layouts.inlislite.app')
@section('title', 'Data Sirkulasi')
@section('breadcrumb', 'Data Sirkulasi')
@section('content')
    @include('inlislite.koleksi.source.html')
@endsection
@section('extra_javascript')
    @include('inlislite.koleksi.source.javascript')
@endsection
