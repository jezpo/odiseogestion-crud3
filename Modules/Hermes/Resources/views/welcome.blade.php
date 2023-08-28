@extends('layouts.default')

@section('title', config('hermes.name').' :: '.'panel')

@push('css')
{{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')
<!-- begin breadcrumb -->
{{--
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
    <li class="breadcrumb-item active">Form Elements</li>
</ol>

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Form Elements <small>header small text goes here...</small></h1>
<!-- end page-header -->
--}}
<!-- begin row -->
<!-- end row -->
<div>
    Sistema de Correspondencia
    <button></button>
</div>
    @endsection
@push('scripts')
{{-- Aqui se coloca los JS de assets --}}
@endpush