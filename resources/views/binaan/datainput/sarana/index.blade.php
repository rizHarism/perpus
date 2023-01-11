@extends('layouts.binaan.app')
@section('title', 'Sarana/Prasarana Perpustakaan')
@section('breadcrumb', 'Sarana/Prasarana Perpustakaan')
@section('content')
    @include('binaan.datainput.sarana.html')
@endsection
@section('extra_javascript')
    @include('binaan.datainput.sarana.javascript')
@endsection
