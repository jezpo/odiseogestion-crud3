@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'panel')

@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')

<div>
    <table>
        <tr>
            <th>ID Programa</th>
            <td>{{ $programa->id_programa }}</td>
        </tr>
        <tr>
            <th>Programa</th>
            <td>{{ $programa->programa }}</td>
        </tr>
        <tr>
            <th>ID Padre</th>
            <td>{{ $programa->id_padre }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $programa->estado }}</td>
        </tr>
    </table>
</div>

@endsection

@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
@endpush