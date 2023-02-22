@extends('layouts.binaan.app')
@section('title', 'Koleksi Perpustakaan')
@section('breadcrumb', 'Koleksi Perpustakaan')
@section('content')
    @include('binaan.datainput.koleksi.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.koleksi.javascript')
@endsection
