@extends('layouts.binaan.app')
@section('title', 'Layanan Perpustakaan')
@section('breadcrumb', 'Layanan Perpustakaan')
@section('content')
    @include('binaan.datainput.layanan.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.layanan.javascript')
@endsection
