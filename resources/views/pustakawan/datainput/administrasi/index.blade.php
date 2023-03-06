@extends('layouts.binaan.app')
@section('title', 'Bahan Pustaka')
@section('breadcrumb', 'Bahan Pustaka')
@section('content')
    @include('binaan.datainput.administrasi.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.administrasi.javascript')
@endsection
