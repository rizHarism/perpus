@extends('layouts.inlislite.app')
@section('title', 'Data Status Pekerjaan Pemustaka')
@section('breadcrumb', 'Data Status Pekerjaan Pemustaka')
@section('content')
    @include('inlislite.pemustaka.pekerjaan.html')
@endsection
@section('extra_javascript')
    @include('inlislite.pemustaka.pekerjaan.javascript')
@endsection
