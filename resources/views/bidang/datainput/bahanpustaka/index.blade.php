@extends('layouts.binaan.app')
@section('title', 'Bahan Pustaka')
@section('breadcrumb', 'Bahan Pustaka')
@section('content')
    @include('binaan.datainput.bahanpustaka.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.bahanpustaka.javascript')
@endsection
