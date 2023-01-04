@extends('layouts.inlislite.app')
@section('title', 'Data Usia Pemustaka')
@section('breadcrumb', 'Data Usia Pemustaka')
@section('content')
    @include('inlislite.pemustaka.usia.html')
@endsection
@section('extra_javascript')
    @include('inlislite.pemustaka.usia.javascript')
@endsection
