@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Flujo de Documentos')

@push('css')
@endpush

@section('header-nav')

@endsection

@section('content')
    <div class="col-xl-12 ui-sortable">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle d-flex justify-content-between align-items-center">
                <!-- Título a la izquierda -->
                <!-- Botones en la esquina superior derecha -->
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                            class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div id="data-table-combine_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class="dataTables_wrapper dt-bootstrap">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-xl-12">
                                    <h2>este es un ejemplo</h2>
                                       
                                </div>
                               <!-- end panel-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

@endpush
