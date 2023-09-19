@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Flujo de Documentos')

@push('css')
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
    {{-- }}
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">FLUJO DE DOCUMENTOS</h4>
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
        <!-- begin alert -->

        <!-- end alert -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <div class="d-block d-lg-inline-flex">
                <div class="dt-buttons btn-group flex-wrap">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Flujo de documentos</button>
                </div>
            </div>
            <hr>

            <!-- Modal de edición -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Flujo de Documentos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('flujodocumentos.create') }}">
                                @csrf
                                
                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Id Documento</label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control" id="select-required" name="id_documento" data-parsley-required="true">
                                            @foreach ($documentos as $documento)
                                            <option value='{{$documento->id}}'>
                                                {{$documento->id}} - {{$documento->cite}}
                                            </option>
                                        @endforeach
                                        @error('id_documento')
                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                <li class="parsley-required">
                                                    {{ 'Este valor es requerido' }}</li>
                                            </ul>
                                        @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Fecha de recepcion:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="datetime-local" id="fullname" value="" name="fecha_recepcion" placeholder="fecha_recepcion" data-parsley-required="true">
                                        @error('fecha_recepcion')
                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                <li class="parsley-required">
                                                    {{ 'Este valor es requerido' }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Id de Destino:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control" id="select-required" name="id_programa" data-parsley-required="true">
                                            @foreach ($programas as $programa)
                                                <option value='{{ $programa->id_programa }}'>
                                                    {{ $programa->programa }}</option>
                                            @endforeach
                                            @error('id_programa')
                                                <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                    <li class="parsley-required">
                                                        {{ 'este valor es requerido' }}
                                                    </li>
                                                </ul>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Observacion:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="text" id="fullname" value="" name="obs" placeholder="obs" data-parsley-required="true">
                                        @error('obs')
                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                <li class="parsley-required">
                                                    {{ 'Este valor es requerido' }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="form-group row m-b-0">
                                    <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                                    <div class="col-md-8 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal de edición -->


            <div id="data-table-select_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">

                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="data-table-select_length">
                            <label>Show <select name="data-table-select_length" aria-controls="data-table-select"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                        <div class="d-block d-lg-inline-flex">
                            <div class="dt-buttons btn-group flex-wrap">
                                <button class="btn btn-secondary buttons-copy buttons-html5 btn-sm" tabindex="0"
                                    aria-controls="data-table-combine" type="button">
                                    <span>Copy</span>
                                </button>
                                <button class="btn btn-secondary buttons-csv buttons-html5 btn-sm" tabindex="0"
                                    aria-controls="data-table-combine" type="button">
                                    <span>CSV</span>
                                </button>
                                <button class="btn btn-secondary buttons-excel buttons-html5 btn-sm" tabindex="0"
                                    aria-controls="data-table-combine" type="button">
                                    <span>Excel</span>
                                </button>
                                <button class="btn btn-secondary buttons-pdf buttons-html5 btn-sm" tabindex="0"
                                    aria-controls="data-table-combine" type="button">
                                    <span>PDF</span>
                                </button>
                                <button class="btn btn-secondary buttons-print btn-sm" tabindex="0"
                                    aria-controls="data-table-combine" type="button">
                                    <span>Print</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="data-table-select_filter" class="dataTables_filter">
                            <label>Buscar:<input type="search" class="form-control form-control-sm" placeholder=""
                                    aria-controls="data-table-select"></label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data-table-select"
                            class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline collapsed"
                            role="grid" aria-describedby="data-table-select_info" style="width: auto;">
                            <thead>
                                <tr role="row">
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Id Documento</th>
                                    <th>Fecha de Repecion</th>
                                    <th>Unidad De Origen</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flujosdoc as $dato)
                                    <tr class="gradeX odd" role="row">
                                        <td width="10%">{{ $dato->id }}</td>
                                        <td width="10%">{{ $dato->id_documento }}</td>
                                        <td width="10%">{{ $dato->fecha_recepcion }}</td>
                                        <td width="10%">{{ $dato->id_programa }}</td>
                                        <td width="10%">{{ $dato->obs }}</td>
                                        <td>
                                          
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $dato->id }}"data-whatever="@mdo">Editar</button>
                                            <form action="{{ route('flujodocumentos.destroy', $dato) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>

                                        <!-- Modal de edición -->
                                        <div class="modal fade" id="exampleModal{{ $dato->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modificar Tipo Tramite
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('flujodocumentos.update', $dato->id) }}">
                                                            @csrf 
                                                            
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Id Documento</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <select class="form-control" id="select-required" name="id_documento" data-parsley-required="true">
                                                                    @foreach ($documentos as $documento)
                                                                        <option value='{{$documento->id}}'>
                                                                            
                                                                            {{$documento->id}}
                                                                        </option>
                                                                        
                                                                    @endforeach
                                                                    @error('id_documento')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                    </select>
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Fecha de recepcion:</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input class="form-control" type="datetime-local" id="fullname" value="{{$dato->fecha_recepcion}}" name="fecha_recepcion" placeholder="fecha_recepcion" data-parsley-required="true">
                                                                    @error('fecha_recepcion')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Id de Destino:</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <select class="form-control" id="select-required" name="id_programa" data-parsley-required="true">
                                                                        @foreach ($programas as $programa)
                                                                            <option value='{{ $programa->id_programa }}'>
                                                                                {{ $programa->programa }}</option>
                                                                        @endforeach
                                                                        @error('id_programa')
                                                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                                <li class="parsley-required">
                                                                                    {{ 'este valor es requerido' }}
                                                                                </li>
                                                                            </ul>
                                                                        @enderror
                                                                    </select>
                                                                </div>
                                                            </div>
                            
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Observacion:</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input class="form-control" type="text" id="fullname" value="{{$dato->obs}}" name="obs" placeholder="obs" data-parsley-required="true">
                                                                    @error('obs')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row m-b-0">
                                                                <label
                                                                    class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <button type="submit"   class="btn btn-primary">Actualizar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Modal de edición -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="data-table-select_info" role="status" aria-live="polite">
                            Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table-select_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="data-table-select_previous"><a
                                        href="#" aria-controls="data-table-select" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="2" tabindex="0"
                                        class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="3" tabindex="0"
                                        class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="4" tabindex="0"
                                        class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="5" tabindex="0"
                                        class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="6" tabindex="0"
                                        class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="data-table-select_next"><a href="#"
                                        aria-controls="data-table-select" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end panel-body -->
    </div>
    </div>

--}}


    <div class="col-xl-12 ui-sortable">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Documentos</h4>
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
                        <div class="row">
                            <div class="col-xl-12">

                                <!-- Botón para abrir el modal de creación -->
                                <div class="panel-body">
                                    <div class="d-block d-lg-inline-flex">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal" data-whatever="@mdo">Flujo de
                                                documentos</button>
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- Modal de edición -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Flujo de Documentos</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="POST"
                                                        enctype="multipart/form-data"
                                                        action="{{ route('flujodocumentos.create') }}">
                                                        @csrf

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Id Documento</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="select-required"
                                                                    name="id_documento" data-parsley-required="true">
                                                                    @foreach ($documentos as $documento)
                                                                        <option value='{{ $documento->id }}'>
                                                                            {{ $documento->id }} - {{ $documento->cite }}
                                                                        </option>
                                                                    @endforeach
                                                                    @error('id_documento')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                            aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Fecha de recepcion:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class="form-control" type="datetime-local"
                                                                    id="fullname" value="" name="fecha_recepcion"
                                                                    placeholder="fecha_recepcion"
                                                                    data-parsley-required="true">
                                                                @error('fecha_recepcion')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'Este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Id de Destino:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="select-required"
                                                                    name="id_programa" data-parsley-required="true">
                                                                    @foreach ($programas as $programa)
                                                                        <option value='{{ $programa->id_programa }}'>
                                                                            {{ $programa->programa }}</option>
                                                                    @endforeach
                                                                    @error('id_programa')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                            aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'este valor es requerido' }}
                                                                            </li>
                                                                        </ul>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Observacion:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class="form-control" type="text" id="fullname"
                                                                    value="" name="obs" placeholder="obs"
                                                                    data-parsley-required="true">
                                                                @error('obs')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'Este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="form-group row m-b-0">
                                                            <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Registrar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Modal de edición -->
                                    <!--DONDE MUESTRA LAS TABLAS ATRAVES DE DATA TABLES -->
                                    <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                        <input type="text" tabindex="0">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="flujosdoc-table"
                                                class="table table-striped table-bordered table-td-valign-middle">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Id Documento</th>
                                                        <th>Fecha de Repecion</th>
                                                        <th>Unidad De Origen</th>
                                                        <th>Observaciones</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                            </table>

                                        </div>
                                    </div>
                                    <!--FINAL DE CODIGO DONDE MUESTRA LAS TABLAS -->

                                    <!-- Modal para Ver -->
                                    <div class="modal fade" id="verDocumentoModal" tabindex="-1" role="dialog"
                                        aria-labelledby="verDocumentoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="verDocumentoModalLabel">Detalles del
                                                        Documento
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Contenido para mostrar detalles del documento -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal para Editar -->
                                    <div class="modal fade" id="editarDocumentoModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editarDocumentoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editarDocumentoModalLabel">Editar
                                                        Documento
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulario de edición -->
                                                    <form id="editDocumentoForm" method="POST">
                                                        @csrf
                                                        <!-- Dentro del formulario -->
                                                        <input type="hidden" id="txtId2" name="txtId2">
                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Cite:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class="form-control" type="text" id="cite2"
                                                                    value="" name="cite2" placeholder="cite"
                                                                    data-parsley-required="true">
                                                                @error('cite')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'Este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Descripcion:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class="form-control" type="text"
                                                                    id="descripcion2" value="" name="descripcion2"
                                                                    placeholder="descripcion"
                                                                    data-parsley-required="true">
                                                                @error('descripcion')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'Este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label">Estado:
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="estado2"
                                                                    name="estado2" data-parsley-required="true">
                                                                    <option value="">Por favor selecciona una opcion
                                                                    </option>
                                                                    <option value="A">Activo</option>
                                                                    <option value="I">Inactivo</option>
                                                                    @error('estado')
                                                                        <ul class="parsley-errors-list filled"
                                                                            id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label">Archivo:
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">

                                                                <div class="form-group">
                                                                    <input type="file" class="form-control-file"
                                                                        id="documento2" name="documento2" accept=".pdf">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label">Tipo de
                                                                documento: </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="id_tipo_documento2"
                                                                    name="id_tipo_documento2"
                                                                    data-parsley-required="true">
                                                                    <option value="">Por favor selecciona una opcion
                                                                    </option>
                                                                    <option value="1">Cata</option>
                                                                    <option value="2">Dictamen</option>
                                                                    @error('id_tipo_documento')
                                                                        <ul class="parsley-errors-list filled"
                                                                            id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label">Origen:
                                                            </label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control select2_programas"
                                                                    id="id_programa2" name="id_programa2"
                                                                    data-parsley-required="true">
                                                                    <option value="">Por favor selecciona el origen
                                                                    </option>
                                                                    @foreach ($programas as $opcion)
                                                                        <option value="{{ $opcion['id_programa'] }}">
                                                                            {{ $opcion['programa'] }}</option>
                                                                    @endforeach
                                                                    @error('id_programa')
                                                                        <ul class="parsley-errors-list filled"
                                                                            id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Agrega más campos de acuerdo a tus necesidades -->

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Actualizar</button>
                                                        </div>


                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para Eliminar -->
                                    <div class="modal fade" id="deleteDocument" tabindex="-1" role="dialog"
                                        aria-labelledby="eliminarDocumentoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="eliminarDocumentoModalLabel">Eliminar
                                                        Documento</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas eliminar este documento?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger" id="btnDelete"
                                                        name="btnDelete">Eliminar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal para el uso de de alertas -->
                                    {{--
                                <div class="panel-body">
                                <p class="lead m-b-10 text-inverse">
                                    SweetAlert for Bootstrap. A beautiful replacement for JavaScript's "alert"
                                </p>
                                <hr />
                                <p class="">
                                    Try any of those!
                                </p>
                                <a href="javascript:;" data-click="swal-primary" class="btn btn-primary">Primary</a>
                                <a href="javascript:;" data-click="swal-info" class="btn btn-info">Info</a>
                                <a href="javascript:;" data-click="swal-success" class="btn btn-success">Success</a>
                                <a href="javascript:;" data-click="swal-warning" class="btn btn-warning">Warning</a>
                                <a href="javascript:;" data-click="swal-danger" class="btn btn-danger">Danger</a>
                            </div>
                            --}}
                                </div>
                                <!-- end panel-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @push('scripts')
        {{-- Aqui se coloca los JS de assets --}}
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="../assets/css/material/app.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
        <script src="../assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-colreorder/js/dataTables.colreorder.min.js"></script>
        <script src="../assets/plugins/datatables.net-colreorder-bs4/js/colreorder.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-keytable/js/dataTables.keytable.min.js"></script>
        <script src="../assets/plugins/datatables.net-keytable-bs4/js/keytable.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-rowreorder/js/dataTables.rowreorder.min.js"></script>
        <script src="../assets/plugins/datatables.net-rowreorder-bs4/js/rowreorder.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="../assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../assets/plugins/pdfmake/build/pdfmake.min.js"></script>
        <script src="../assets/plugins/pdfmake/build/vfs_fonts.js"></script>
        <script src="../assets/plugins/jszip/dist/jszip.min.js"></script>
        <script src="../assets/js/demo/table-manage-combine.demo.js"></script>

        <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
        <script src="../assets/js/demo/ui-modal-notification.demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <script>
            $(function() {
                $('#flujosdoc-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('flujodedocumento.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'id_documento',
                            name: 'id_documento'
                        },
                        {
                            data: 'fecha_recepcion',
                            name: 'fecha_recepcion'
                        },
                        {
                            data: 'id_programa',
                            name: 'id_programa'
                        },
                        {
                            data: 'obs',
                            name: 'obs'
                        },
                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Manejar el envío del formulario por AJAX
                $('#form-create-flujo').on('submit', function(event) {
                    event.preventDefault(); // Prevenir el envío del formulario por defecto

                    // Obtener los datos del formulario
                    var formData = new FormData(this);

                    // Realizar la solicitud AJAX
                    $.ajax({
                        url: "{{ route('flujodocumentos.create') }}",
                        method: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);

                            // Mostrar SweetAlert en lugar de una alerta estándar
                            Swal.fire({
                                icon: 'success',
                                title: 'Registro creado con éxito',
                                text: 'El flujo de documentos se ha creado correctamente.',
                            }).then((result) => {
                                // Cerrar el modal después de mostrar SweetAlert
                                if (result.isConfirmed) {
                                    $('#exampleModal').modal('hide');
                                }
                            });

                            // Puedes realizar cualquier otra acción necesaria, como actualizar la tabla de datos
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);

                            // Mostrar SweetAlert en caso de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Ocurrió un error al crear el flujo de documentos.',
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
