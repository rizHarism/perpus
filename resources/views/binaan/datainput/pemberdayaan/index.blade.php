@extends('layouts.binaan.app')
@section('title', 'Pemberdayaan Perpustakaan')
@section('breadcrumb', 'Pemberdayaan Perpustakaan')
@section('content')
    @include('binaan.datainput.pemberdayaan.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.pemberdayaan.javascript')
@endsection
