@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'Roles')

@push('css')
@endpush

@section('header-nav')

@endsection

@section('content')

    <div class="col-xl-12">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Permiso</h4>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo
                                            Permiso</button>
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
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--FINAL DE CODIGO DONDE MUESTRA LAS TABLAS -->

                                <!-- Modal de edición -->
                                <!-- Modal de edición -->
                                <div class="modal fade" id="editProcess" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Trámite</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="POST"
                                                    enctype="multipart/form-data" id="edit-form">
                                                    @csrf
                                                    @method('PUT') <!-- Agrega el método PUT -->
                                                    <input type="hidden" id="edit-tramite-id" name="id">
                                                    <div class="form-group row m-b-15">
                                                        <label class="col-md-4 col-sm-4 col-form-label"
                                                            for="edit-tramite">Trámite:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <input class="form-control" type="text" id="tramite2"
                                                                name="tramite2" placeholder="Introduzca un tramite"
                                                                data-parsley-required="true">
                                                            @error('tramite2')
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
                                                            for="edit-estado">Estado:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control" id="estado2" name="estado2"
                                                                data-parsley-required="true">
                                                                <option value="">Por favor selecciona una opcion
                                                                </option>
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                            </select>
                                                            @error('estado2')
                                                                <ul class="parsley-errors-list filled" id="parsley-id-5"
                                                                    aria-hidden="false">
                                                                    <li class="parsley-required">
                                                                        {{ 'este valor es requerido' }}</li>
                                                                </ul>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row m-b-0">
                                                        <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <button type="submit" class="btn btn-primary">Guardar
                                                                Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Modal de edición -->
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







    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo
            Permiso</button>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="permissionsTable">
                <!-- Los datos se cargan via AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Modal Crear -->
    <div class="modal" tabindex="-1" id="createModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="text" id="permissionName" placeholder="Nombre" class="form-control mb-2">
                    <input type="text" id="permissionDescription" placeholder="Descripción" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="savePermission">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar (similar al modal de crear) -->
    <!-- Modal Editar -->
    <div class="modal" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editPermissionId">
                    <input type="text" id="editPermissionName" placeholder="Nombre" class="form-control mb-2">
                    <input type="text" id="editPermissionDescription" placeholder="Descripción" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="updatePermission">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar (puedes agregar un modal de confirmación) -->
    <!-- ... -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            loadPermissions();

            $('#savePermission').click(function() {
                let name = $('#permissionName').val();
                let description = $('#permissionDescription').val();

                $.ajax({
                    url: '{{ route('permissions.store') }}',
                    method: 'POST',
                    data: {
                        name: name,
                        description: description,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        loadPermissions();
                        $('#createModal').modal('hide');
                    }
                });
            });
        });

        function loadPermissions() {
            $.ajax({
                url: '{{ route('permissions.index') }}',
                method: 'GET',
                success: function(data) {
                    let rows = '';
                    $.each(data, function(index, permission) {
                        rows += `
                        <tr>
                            <td>${permission.id}</td>
                            <td>${permission.permission_name}</td>
                            <td>${permission.description}</td>
                            <td>
                                <button class="btn btn-warning">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    });

                    $('#permissionsTable').html(rows);
                }
            });
        }
    </script>
    <script>
        // Actualizar permiso
        $('#updatePermission').click(function() {
            let id = $('#editPermissionId').val();
            let name = $('#editPermissionName').val();
            let description = $('#editPermissionDescription').val();

            $.ajax({
                url: '{{ url('hermes/permissions') }}/' + id,
                method: 'PUT',
                data: {
                    name: name,
                    description: description,
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    loadPermissions();
                    $('#editModal').modal('hide');
                }
            });
        });

        // Mostrar modal de edición con datos del permiso
        $(document).on('click', '.btn-warning', function() {
            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text();
            let name = row.find('td:eq(1)').text();
            let description = row.find('td:eq(2)').text();

            $('#editPermissionId').val(id);
            $('#editPermissionName').val(name);
            $('#editPermissionDescription').val(description);

            $('#editModal').modal('show');
        });

        // Eliminar permiso
        $(document).on('click', '.btn-danger', function() {
            let row = $(this).closest('tr');
            let id = row.find('td:eq(0)').text();

            if (confirm('¿Estás seguro de querer eliminar este permiso?')) {
                $.ajax({
                    url: '{{ url('hermes/permissions') }}/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        loadPermissions();
                    }
                });
            }
        });
    </script>
@endsection
