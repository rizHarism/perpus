@extends('layouts.binaan.app')
@section('title', 'Kondisi Umum')
@section('breadcrumb', 'Kondisi Umum')
@section('content')
    @include('binaan.dataumum.kondisiumum.html')
@endsection
@section('extra_javascript')
    @include('binaan.dataumum.kondisiumum.javascript')
@endsection
