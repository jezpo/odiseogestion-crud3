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
                                            {{--<!--<a href="{{ route('documentos.show', $dato->id) }}" class="btn btn-info">Ver</a> -->--}}
                                            <!--<a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $dato->id }}" class="btn btn-sm btn-warning">Editar</a> -->
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


@endsection
@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
@endpush
