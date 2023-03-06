@extends('layouts.binaan.app')
@section('title', 'Tenaga Pustakawan')
@section('breadcrumb', 'Tenaga Pustakawan')
@section('content')
    @include('binaan.datainput.tenagapustaka.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.tenagapustaka.javascript')
@endsection
