@extends('layouts.inlislite.app')
@section('title', 'Data Klas')
@section('breadcrumb', 'Data Klass')
@section('content')
    @include('inlislite.koleksi.klasddc.html')
@endsection
@section('extra_javascript')
    @include('inlislite.koleksi.klasddc.javascript')
@endsection
