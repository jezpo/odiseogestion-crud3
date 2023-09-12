@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Tipo Tramite')

@push('css')
@endpush

@section('header-nav')

@endsection

@section('content')
    {{-- }}
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">Listar Tramites</h4>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo Tramite</button>
                </div>
            </div>
            <hr>

            <!-- Modal de edición -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Tramite</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('tipotramite.create') }}">
                                @csrf
                               
                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Tramite:</label>
                                    <div class="col-md-8 col-sm-8">
                                        <input class="form-control" type="text" id="fullname" value="" name="tramite" placeholder="Introduzca un tramite " data-parsley-required="true">
                                        @error('fecha_recepcion')
                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                <li class="parsley-required">
                                                    {{ 'Este valor es requerido' }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-md-4 col-sm-4 col-form-label">Estado: </label>
                                    <div class="col-md-8 col-sm-8">
                                        <select class="form-control" id="select-required" name="estado"
                                            data-parsley-required="true">
                                            <option value="">Por favor selecciona una opcion</option>
                                            <option value="A">Activo</option>
                                            <option value="I">Inactivo</option>
                                            @error('estado')
                                                <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                    <li class="parsley-required">
                                                        {{ 'este valor es requerido' }}</li>
                                                </ul>
                                            @enderror
                                        </select>
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
                                    <th>Tramite</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipotramite as $dato)
                                    <tr class="gradeX odd" role="row">
                                        <td width="10%">{{ $dato->id }}</td>
                                        <td width="10%">{{ $dato->tramite }}</td>
                                        <td width="10%">{{ $dato->estado }}</td>

                                        <td>
                                            <!--<a href="{{ route('documentos.show', $dato->id) }}" class="btn btn-info">Ver</a> -->
                                            <!--<a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $dato->id }}" class="btn btn-sm btn-warning">Editar</a> -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $dato->id }}"data-whatever="@mdo">Editar</button>
                                            <form action="{{ route('tipotramite.destroy', $dato) }}" method="POST" class="d-inline">
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
                                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('tipotramite.update', $dato->id) }}">
                                                            @csrf
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label">Tipo Tramite: </label>                                                          
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input class="form-control" type="text" id="fullname" value="{{ $dato->tramite }}" name="tramite" placeholder="Ingrese el registro de cite" data-parsley-required="true">
                                                                    @error('cite')
                                                                        <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
                                                                        </ul>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row m-b-15">
                                                                <label class="col-md-4 col-sm-4 col-form-label">Estado: </label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <select class="form-control" id="select-required" name="estado"
                                                                        data-parsley-required="true">
                                                                        <option value="">Por favor selecciona una opcion</option>
                                                                        <option value="A">Activo</option>
                                                                        <option value="I">Inactivo</option>
                                                                        @error('estado')
                                                                            <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                                                                <li class="parsley-required">
                                                                                    {{ 'este valor es requerido' }}</li>
                                                                            </ul>
                                                                        @enderror
                                                                    </select>
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
    <!-- begin col-10 -->
    <div class="col-xl-12">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Tipo Tramite</h4>
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
                                <div class="d-block d-lg-inline-flex">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal" data-whatever="@mdo">Nuevo Tramite</button>
                                    </div>
                                </div>
                                <hr>

                                <!-- Modal de edición -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Tramite</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                                    id="create-form">
                                                    @csrf

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label"
                                                            for="fullname">Tramite:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <input class="form-control" type="text" id="tramite"
                                                                value="" name="tramite"
                                                                placeholder="Introduzca un tramite "
                                                                data-parsley-required="true">
                                                            @error('tramite')
                                                                <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                    aria-hidden="false">
                                                                    <li class="parsley-required">
                                                                        {{ 'Este valor es requerido' }}</li>
                                                                </ul>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label">Estado: </label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control" id="estado" name="estado"
                                                                data-parsley-required="true">
                                                                <option value="">Por favor selecciona una opcion
                                                                </option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                                @error('estado')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </select>
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
                                        <table id="programa-table"
                                            class="table table-striped table-bordered table-td-valign-middle">
                                            <thead>
                                                <tr role="row">
                                                    <th width="10%">Id</th>
                                                    <th width="10%">tramite</th>
                                                    <th width="10%">Estado</th>
                                                    <th width="40%">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--FINAL DE CODIGO DONDE MUESTRA LAS TABLAS -->

                                <!-- Modal de edición -->
                                <div class="modal fade" id="editProcess" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Tramite</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST"
                                                    enctype="multipart/form-data" id="edit-form">
                                                    @csrf

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label"
                                                            for="fullname">Tramite:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <input class="form-control" type="text" id="tramite"
                                                                value="" name="tramite"
                                                                placeholder="Introduzca un tramite "
                                                                data-parsley-required="true">
                                                            @error('tramite')
                                                                <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                    aria-hidden="false">
                                                                    <li class="parsley-required">
                                                                        {{ 'Este valor es requerido' }}</li>
                                                                </ul>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label">Estado: </label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control" id="estado" name="estado"
                                                                data-parsley-required="true">
                                                                <option value="">Por favor selecciona una opcion
                                                                </option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                                @error('estado')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </select>
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
                                <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog"
                                    aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel">Vista previa del PDF</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdfFrame" style="width:100%; height:500px;"
                                                    frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end panel-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end panel-body -->
        </div>

    </div>
    <!-- end col-10 -->



@endsection
@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
    {{-- Aqui se coloca los JS de assets --}}
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="../assets/css/material/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/js/theme/material.min.js"></script>
    <!-- ================== END BASE JS ================== -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="../assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="../assets/js/demo/ui-modal-notification.demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            var documentTable = $('#programa-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('tipotramite.index') }}",
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'tramite',
                        name: 'tramite'
                    },
                    {
                        data: 'estado',
                        name: 'estado'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
    <script>
        $(document).on('submit', '#create-form', function(e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            $.ajax({
                url: '{{ route('tipotramite.create') }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        // Show success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Trámite creado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // Reload table data
                        $('#programa-table').DataTable().ajax.reload();
                        // Close modal
                        $('#exampleModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    } else {
                        // Show error message using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un error al crear el trámite',
                            text: response.message.tramite ? response.message.tramite[0] : '',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(response) {
                    // Handle error response
                }
            });
        });
    </script>
    <script>
        function editProcess(id) {
            $.ajax({
                url: "{{ route('tipotramite.edit', '') }}/" + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        // Populate form fields with record data
                        $('#editProcess input[name="tramite"]').val(response.data.tramite);
                        $('#editProcess select[name="estado"]').val(response.data.estado);
                        // Show modal
                        $('#editProcess').modal('show');
                    } else {
                        // Show error message using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un error al obtener el trámite',
                            text: response.message,
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(response) {
                    // Handle error response
                }
            });
        }

        $(document).on('submit', '#edit-form', function(e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            var id = $('#edit-tramite-id').val();
            var tramite = $('#edit-tramite').val();
            var estado = $('#edit-estado').val();
            $.ajax({
                url: '/tipotramite/' + id,
                type: 'PUT',
                data: {
                    _token: $('input[name="_token"]').val(),
                    tramite: tramite,
                    estado: estado
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#editProcess').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Trámite actualizado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#programa-table').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ocurrió un error al actualizar el trámite',
                            text: response.message,
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("Error de AJAX: " + textStatus + ' : ' + errorThrown);
                }
            });
        });
    </script>
    <script>
        var doc_id;

        function deleteProcess(id) {
            doc_id = id;
            Swal.fire({
                icon: 'warning',
                title: '¿Está seguro de eliminar este trámite?',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '{{ route('tipotramite.destroy', '') }}/' + doc_id,
                        type: 'DELETE', // Utiliza el método DELETE para eliminar el registro
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                // Show success message using SweetAlert
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Trámite eliminado correctamente',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                // Reload table data
                                $('#programa-table').DataTable().ajax.reload();
                            } else {
                                // Show error message using SweetAlert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ocurrió un error al eliminar el trámite',
                                    text: response.message,
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        },
                        error: function(response) {
                            // Handle error response
                        }
                    });
                }
            });
        }
    </script>
@endpush
