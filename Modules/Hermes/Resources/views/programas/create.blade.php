@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'panel')

@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')

<div>
    <form method="POST" action="{{ route('programas.store') }}">
        @csrf
        <div>
            <label for="id_programa">ID Programa:</label>
            <input type="text" name="id_programa" id="id_programa">
        </div>
        <div>
            <label for="programa">Programa:</label>
            <input type="text" name="programa" id="programa">
        </div>
        <div>
            <label for="id_padre">ID Padre:</label>
            <input type="text" name="id_padre" id="id_padre">
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado">
        </div>
        <button type="submit">Crear Programa</button>
    </form>
</div>

@endsection

@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
@endpush