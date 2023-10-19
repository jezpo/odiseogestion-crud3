@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Flujo de Tramite')

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
                <!-- Botón "Nuevo" alineado a la izquierda -->
                <div class="d-block">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">
                        <i class="fas fa-plus"></i> <b>Nuevo Flujo Tramite</b>
                    </button>
                </div>
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

                                    <!-- Modal de edición -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Flujo Tramite</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" method="POST"
                                                        enctype="multipart/form-data"
                                                        action="{{ route('flujotramite.store') }}">
                                                        @csrf
                                                        <div class="form-group row m-b-15">
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">Tramite:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="id_tipo_tramite"
                                                                    name="id_tipo_tramite" data-parsley-required="true">
                                                                    @foreach ($tipotramite as $tipo)
                                                                        <option value="{{ $tipo->id }}">
                                                                            {{ $tipo->id }} - {{ $tipo->tramite }}
                                                                        </option>
                                                                    @endforeach
                                                                    @error('id_tipo_tramite')
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
                                                                for="fullname">Orden:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="orden" name="orden"
                                                                    data-parsley-required="true">
                                                                    <option value="0">En espera</option>
                                                                    <option value="1">En proceso</option>
                                                                    <option value="2">Enviado</option>
                                                                </select>
                                                                @error('orden')
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
                                                                for="fullname">Tiempo:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class="form-control" type="time" id="fullname"
                                                                    value="" name="tiempo"
                                                                    placeholder="Tiempo en espera"
                                                                    data-parsley-required="true">
                                                                @error('tiempo')
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
                                                                <select class="form-control" id="select-required"
                                                                    name="estado" data-parsley-required="true">
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
                                                            <label class="col-md-4 col-sm-4 col-form-label"
                                                                for="fullname">unidad de origen:</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <select class="form-control" id="select-required"
                                                                    name="id_programa" data-parsley-required="true">
                                                                    @foreach ($programas as $programa)
                                                                        <option value='{{ $programa->id_programa }}'
                                                                            {{ $programa->id == old('programa', $programa->id_programa) ? 'selected' : '' }}>
                                                                            {{ $programa->programa }}
                                                                        </option>
                                                                    @endforeach
                                                                    @error('id_programa')
                                                                        <ul class="parsley-errors-list filled"
                                                                            id="parsley-id-5" aria-hidden="false">
                                                                            <li class="parsley-required">
                                                                                {{ 'Este valor es requerido' }}</li>
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

                                    <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                        <input type="text" tabindex="0">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="flujostra-table"
                                                class="table table-striped table-bordered table-td-valign-middle">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Id</th>
                                                        <th>Tipo De Tramite</th>
                                                        <th>Orden</th>
                                                        <th>Tiempo</th>
                                                        <th>Estado</th>
                                                        <th>id_programa</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                            </table>

                                        </div>
                                    </div>
                                    <!--FINAL DE CODIGO DONDE MUESTRA LAS TABLAS -->


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
            $(document).ready(function() {
                $('#flujostra-table').DataTable({
                    "processing": true,
                    "serverSide": true, // Habilita el procesamiento en el servidor
                    "ajax": "{{ route('flujotramite.index') }}", // Ruta que devuelve los datos JSON
                    "columns": [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'id_tipo_tramite',
                            name: 'id_tipo_tramite'
                        }, // Asegúrate de que coincida con el nombre real de la columna
                        {
                            data: 'orden',
                            name: 'orden'
                        },
                        {
                            data: 'tiempo',
                            name: 'tiempo'
                        },
                        {
                            data: 'estado',
                            name: 'estado'
                        },
                        {
                            data: 'id_programa',
                            name: 'id_programa'
                        }, // Asegúrate de que coincida con el nombre real de la columna
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    language: {
                        url: '/assets/plugins/datatables.net/Spanish.json'
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#tramiteForm').on('submit', function(e) {
                    e.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

                    var formData = new FormData(this);

                    $.ajax({
                        url: "{{ route('flujotramite.store') }}", // Corrección de la ruta aquí
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

        <script>
            function editTramite(id) {
                $.get('flujotramite/edit/' + id, function(data) {
                    // Llenar el formulario de edición con los datos recibidos
                    $('#id_documento2').val(data.flujo.id_documento);
                    $('#fecha_recepcion2').val(data.flujo.fecha_recepcion);
                    $('#id_programa2').val(data.flujo.id_programa);
                    $('#obs2').val(data.flujo.obs);
                    // Mostrar el modal de edición
                    $('#editFlujoForm').modal('show');
                });
            }
            $('#editFlujoForm').submit(function(e) {
                e.preventDefault();
                var id = $('#id_documento2').val();
                var fecha_recepcion = $('#fecha_recepcion2').val();
                var id_programa = $('#id_programa2').val();
                var obs = $('#obs2').val();
                var _token = $("input[name=_token]").val();
                var formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('id_documento', id); // Cambiado 'id' a 'id_documento'
                formData.append('fecha_recepcion', fecha_recepcion);
                formData.append('id_programa', id_programa);
                formData.append('obs', obs);
                formData.append('_token', _token);
                $.ajax({
                    url: "flujotramite/update/" + id, // Ruta actualizada
                    type: 'PUT',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response) {
                            $('#editFlujoForm').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: '¡Registro actualizado!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // Aquí, si deseas, puedes recargar la tabla de flujo de documentos.
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("Error de AJAX: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        </script>
        <script>
            function deleteTramite(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "El trámite será eliminado permanentemente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('flujotramite.destroy', '') }}/' + id,
                            type: 'POST',
                            data: {
                                _token: $('input[name="_token"]').val(),
                                _method: 'DELETE'
                            },
                            success: function(response) {
                                if (response.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Trámite eliminado correctamente',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('#flujostra-table').DataTable().ajax.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Ocurrió un error al eliminar el trámite',
                                        text: response.message,
                                        confirmButtonText: 'Aceptar'
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("Error de AJAX: " + textStatus + ' : ' + errorThrown);
                            }
                        });
                    }
                });
            }
        </script>
    @endpush
