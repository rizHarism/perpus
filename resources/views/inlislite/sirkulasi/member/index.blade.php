@extends('layouts.inlislite.app')
@section('title', 'Data Sirkulasi Pemustaka')
@section('breadcrumb', 'Data Sirkulasi Pemustaka')
@section('content')
    @include('inlislite.sirkulasi.member.html')
@endsection
@section('extra_javascript')
    @include('inlislite.sirkulasi.member.javascript')
@endsection
