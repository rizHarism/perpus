@extends('layouts.binaan.app')
@section('title', 'Statistik layanan')
@section('breadcrumb', 'Statistik Layanan')
@section('content')
    @include('binaan.statistik.layanan.html')
@endsection
@section('extra_javascript')
    @include('binaan.statistik.layanan.javascript')
@endsection
