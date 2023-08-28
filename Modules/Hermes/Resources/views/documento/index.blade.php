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

                                <!-- Botón para abrir el modal de creación -->
                                <div>
                                    <a id="abrirDocumentoModal" href="#modal-dialog" class="btn btn-sm btn btn-primary"
                                        data-toggle="modal">Crear Nuevo</a>

                                </div>
                                <br>
                                <!-- Modal para Nuevo -->
                                <div class="modal fade" class="modal fade" id="modal-dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <h5 class="modal-title" id="nuevoDocumentoModalLabel">Nuevo Documento</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario de creación -->
                                                <form id="crearNuevoDocumentoForm" class="form-horizontal" method="PUT"
                                                    enctype="multipart/form-data" action="{{ route('documentos.store') }}">
                                                    @csrf
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label"
                                                            for="fullname">Cite:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <input class="form-control" type="text" id="cite"
                                                                value="" name="cite" placeholder="cite"
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
                                                            <input class="form-control" type="text" id="descripcion"
                                                                value="" name="descripcion" placeholder="descripcion"
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
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label">Archivo:
                                                        </label>
                                                        <div class="col-md-8 col-sm-8">

                                                            <div class="form-group">

                                                                <input type="file" class="form-control-file"
                                                                    id="docummento" name="documento" accept=".pdf">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label">Tipo de
                                                            documento: </label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control" id="select-required"
                                                                name="id_tipo_documento" data-parsley-required="true">
                                                                <option value="">Por favor selecciona una opcion
                                                                </option>
                                                                <option value="1">Cata</option>
                                                                <option value="2">Dictamen</option>
                                                                @error('id_tipo_documento')
                                                                    <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                        aria-hidden="false">
                                                                        <li class="parsley-required">
                                                                            {{ 'este valor es requerido' }}</li>
                                                                    </ul>
                                                                @enderror
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label">Origen: </label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control select2_programas" id="id_programa" name="id_programa" data-parsley-required="true">
                                                                <option value="">Por favor selecciona el origen</option>
                                                                @foreach ($programas as $opcion)
                                                                    <option value="{{ $opcion['id_programa'] }}">
                                                                        {{ $opcion['programa'] }}</option>
                                                                @endforeach
                                                                @error('id_programa')
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
                                                            <button type="submit"
                                                                class="btn btn-primary">Registrar</button>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                                <!-- Modal para Ver -->
                                <div class="modal fade" id="verDocumentoModal" tabindex="-1" role="dialog"
                                    aria-labelledby="verDocumentoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verDocumentoModalLabel">Detalles del Documento
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
                                                <h5 class="modal-title" id="editarDocumentoModalLabel">Editar Documento
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario de edición -->
                                                <form id="editarDocumentoForm" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Cite</label>
                                                        <input type="text" class="form-control" id="cite"
                                                            name="cite">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="descripcion">Descripción</label>
                                                        <input type="text" class="form-control" id="descripcion"
                                                            name="descripcion">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="estado">Estado</label>
                                                        <select class="form-control" id="estado" name="estado">
                                                            <option value="1">Aceptado</option>
                                                            <option value="2">Rechazado</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id_tipo_documento">Tipo De Documento</label>
                                                        <select class="form-control" id="id_tipo_documento"
                                                            name="id_tipo_documento">
                                                            <option value="1">Carta</option>
                                                            <option value="2">Resolucion</option>
                                                            <option value="3">Dicatamen</option>
                                                            <option value="4">Circular</option>
                                                            <option value="5">Nota</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="id_programa">Unidad o Carrera</label>
                                                        <select class="form-control" id="id_programa" name="id_programa">
                                                            @foreach ($programas as $programa)
                                                                <option value="{{ $programa->id }}">{{ $programa->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Agrega más campos de acuerdo a tus necesidades -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>

                                                    <!-- Dentro del formulario -->
                                                    <input type="hidden" id="documentoIdEditar"
                                                        name="documentoIdEditar">
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
                            </div>
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
                <link
                    href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"rel="stylesheet" />
                <link href="../assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
                    rel="stylesheet" />
                <link href="../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css"
                    rel="stylesheet" />
                <link
                    href="../assets/plugins/datatables.net-colreorder-bs4/css/colreorder.bootstrap4.min.css"rel="stylesheet" />
                <link href="../assets/plugins/datatables.net-keytable-bs4/css/keytable.bootstrap4.min.css"
                    rel="stylesheet" />
                <link href="../assets/plugins/datatables.net-rowreorder-bs4/css/rowreorder.bootstrap4.min.css"
                    rel="stylesheet" />
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
                                url: "{{ route('documentos.index') }}",
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
                <script>
                    //ingresar un nuevo documento
                    $(function() {
                        $('#abrirDocumentoModal').click(function() {
                            // Limpia los mensajes de error y campos del formulario
                            $('.parsley-errors-list').empty();
                            $('#crearNuevoDocumentoForm input, #crearNuevoDocumentoForm textarea, #crearNuevoDocumentoForm select')
                                .val('');
                            // Agregar evento para enviar el formulario
                            $('#crearNuevoDocumentoForm').on('submit', function(e) {
                                e.preventDefault();
                                var formData = new FormData(this);
                                formData.append('_token', '{{ csrf_token() }}');
                                $.ajax({
                                    url: "{{ route('documentos.store') }}", // Ruta para almacenar el nuevo documento
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        // Cerrar el modal
                                        $('#modal-dialog').modal('hide');
                                        // Recargar la tabla DataTables para mostrar el nuevo registro
                                        $('#documentos-table').DataTable().ajax
                                            .reload();
                                    },
                                    error: function(xhr) {
                                        if (xhr.responseJSON.errors) {
                                            // Mostrar mensajes de error de validación en el formulario
                                            $.each(xhr.responseJSON.errors, function(
                                                key, value) {
                                                var errorElement = $('#' + key)
                                                    .closest(
                                                        '.form-group').find(
                                                        '.parsley-errors-list');
                                                errorElement.empty().append(
                                                    '<li class="parsley-required">' +
                                                    value + '</li>');
                                            });
                                        }
                                    }
                                });
                            });
                        });
                    });
                </script>



                <script>
                    // Definir la variable global 'doc_id' que almacenará el ID del documento a eliminar
                    var doc_id;

                    // Función que será llamada cuando se haga clic en el botón "Eliminar"
                    function deleteDocument(docId) {
                        doc_id = docId;
                        console.log("doc_id establecido como: ", doc_id);  // Para depuración
                        $('#deleteDocument').modal('show');  // Mostrar el modal de confirmación
                    }

                    // Manejador para el botón dentro del modal que confirma la eliminación
                    $('#btnDelete').click(function(){
                        if(doc_id) {  // Solo procede si doc_id está establecido
                            $.ajax({
                                url:"documentos/destroy/" + doc_id,
                                beforeSend:function(){
                                    $('#btnDelete').text('Eliminando...');
                                },
                                success:function(data){
                                    setTimeout(function(){
                                        $('#deleteDocument').modal('hide');
                                        // Usar alert en lugar de toastr
                                        alert('El registro fue eliminado correctamente');
                                        // Asumiendo que tienes DataTable y quieres recargar los datos
                                        $('#documentos-table').DataTable().ajax.reload();
                                    }, 2000);
                                },
                                error:function(xhr, status, error) {
                                    console.error("Error: ", xhr, status, error);  // Para depuración
                                }
                            });
                        } else {
                            console.error("doc_id no está establecido.");  // Para depuración
                        }
                    });
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.select2_programas').select2({
                            placeholder: "Por favor selecciona el origen", // placeholder
                        });
                    });
                </script>
            @endpush
