@extends('layouts.binaan.app')
@section('title', 'Statistik Koleksi')
@section('breadcrumb', 'Statistik Koleksi')
@section('content')
    @include('binaan.statistik.koleksi.html')
@endsection
@section('extra_javascript')
    @include('binaan.statistik.koleksi.javascript')
@endsection
