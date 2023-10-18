@extends('hermes::layout')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Nuevo Rol</button>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="rolesTable">
                <!-- Los datos se cargan via AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Puedes agregar Modals para crear, editar y eliminar roles, similar al ejemplo anterior -->
@endsection

@section('scripts')
    <!-- En la sección de head -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Antes de cerrar body o en la sección de scripts -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializa la tabla
            const table = $('.table').DataTable({
                ajax: '{{ route('roles.index') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'role_name'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                        <button class="btn btn-warning" onclick="editRole(${row.id})">Editar</button>
                        <button class="btn btn-danger" onclick="deleteRole(${row.id})">Eliminar</button>
                    `;
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        function editRole(roleId) {
            $.ajax({
                url: `roles/${roleId}/edit`,
                method: 'GET',
                success: function(data) {
                    // Carga los datos en los campos del modal de edición
                    // Mostrar el modal
                }
            });
        }

        function deleteRole(roleId) {
            if (confirm("¿Estás seguro de que deseas eliminar este rol?")) {
                $.ajax({
                    url: `roles/${roleId}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Token CSRF de Laravel
                    },
                    success: function() {
                        // Recarga la tabla para reflejar los cambios
                        table.ajax.reload();
                    }
                });
            }
        }
    </script>
@endsection
