@extends('layouts.binaan.app')
@section('title', 'Kondisi Umum')
@section('breadcrumb', 'Kondisi Umum')
@section('content')
    @include('binaan.datainput.kondisiumum.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.kondisiumum.javascript')
@endsection
