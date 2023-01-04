@extends('layouts.binaan.app')
@section('title', 'Bahan Pustaka')
@section('breadcrumb', 'Bahan Pustaka')
@section('content')
    @include('binaan.dataumum.administrasi.html')
@endsection
@section('extra_javascript')
    @include('binaan.dataumum.administrasi.javascript')
@endsection
