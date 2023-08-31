@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Documentos')

@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')
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

                         
                                <!--DONDE MUESTRA LAS TABLAS ATRAVES DE DATA TABLES -->
                                <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                    <input type="text" tabindex="0">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="documentos-table"
                                            class="table table-striped table-bordered table-td-valign-middle">
                                            <thead>
                                                <tr role="row">

                                                    <th width="10%">Id</th>
                                                    <th width="10%">Cite</th>
                                                    <th width="10%">Descripción</th>
                                                    <th width="10%">Estado</th>
                                                    <th width="10%">Nombre del Programa</th>
                                                    <th width="20%">Programa</th>
                                                    <th width="40%">Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                                <!--FINAL DE CODIGO DONDE MUESTRA LAS TABLAS -->

                               
                            <!-- end panel-body -->
                        </div>
                    </div>
                </div>
            @endsection


            @push('scripts')
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

                <script>
                    $(document).ready(function() {
                        var documentTable = $('#documentos-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: {
                                url: "{{ route('documents.index') }}",
                            },
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'cite',
                                    name: 'cite'
                                },
                                {
                                    data: 'descripcion',
                                    name: 'descripcion'
                                },
                                {
                                    data: 'estado',
                                    name: 'estado'
                                },
                                {
                                    data: 'id_tipo_documento',
                                    name: 'id_tipo_documento'
                                },
                                {
                                    data: 'programa',
                                    name: 'programa'
                                },

                                {
                                    data: 'action',
                                    name: 'action',
                                    orderable: true,
                                    searchable: true,
                                },
                            ],
                        });
                    });
                </script>
               
            @endpush
