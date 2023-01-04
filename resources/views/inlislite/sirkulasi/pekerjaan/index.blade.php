@extends('layouts.inlislite.app')
@section('title', 'Data Sirkulasi Pekerjaan')
@section('breadcrumb', 'Data Sirkulasi Pekerjaan')
@section('content')
    @include('inlislite.sirkulasi.pekerjaan.html')
@endsection
@section('extra_javascript')
    @include('inlislite.sirkulasi.pekerjaan.javascript')
@endsection
