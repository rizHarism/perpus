@extends('layouts.inlislite.app')
@section('title', 'Data Klas')
@section('breadcrumb', 'Data Klass')
@section('content')
    @include('inlislite.sirkulasi.klasddc.html')
@endsection
@section('extra_javascript')
    @include('inlislite.sirkulasi.klasddc.javascript')
@endsection
