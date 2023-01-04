@extends('layouts.inlislite.app')
@section('title', 'Data Klas')
@section('breadcrumb', 'Data Klass')
@section('content')
    @include('inlislite.sirkulasi.usia.html')
@endsection
@section('extra_javascript')
    @include('inlislite.sirkulasi.usia.javascript')
@endsection
