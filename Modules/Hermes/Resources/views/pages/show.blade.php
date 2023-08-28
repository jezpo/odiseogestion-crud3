@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'panel')

@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')

    {{-- Contenido para tabla --}}
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">Lista de Documentaria</h4>
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
        <!-- begin alert
                        <div class="alert alert-success fade show">
                            <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">×</span>
                            </button>
                            KeyTable provides enhanced accessibility and navigation options for DataTables enhanced tables, by allowing Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual cells, columns, rows or all cells to allow advanced interaction options.
                        </div> -->
        <!-- end alert -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <div id="data-table-keytable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="data-table-keytable_length">
                            <label>Show
                                <select name="data-table-keytable_length" aria-controls="data-table-keytable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="data-table-keytable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                    aria-controls="data-table-keytable">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                            <input type="text" tabindex="0">
                        </div>
                        <div class="table-responsive"></div>
                        <table id="data-table-keytable"
                            class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline collapsed"
                            role="grid" aria-describedby="data-table-keytable_info"
                            style="position: relative; width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th>Id</th>
                                    <th>Cite</th>
                                    <th>Descripcion</th>
                                    <th>estado</th>
                                    <th>programa</th>
                                    <th>Documento</th>
                                    <th>id_programa</th>
                                    <th>Ultima actulizacion</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documento as $dato)
                                    <tr class="gradeX odd" role="row">
                                        <td width="10%">{{ $dato->id }}</td>
                                        <td width="10%" class="f-s-200 text-inverse sorting_1" tabindex="0">{{ $dato->cite }}</td>
                                        <td width="100%">{{ $dato->descripcion }}</td>
                                        <td width="10%">{{ $dato->estado }}</td>
                                        <td width="10%">{{ $dato->hash }}</td>
                                        <td>
                                            <img class="img-thumbnail img-fluid" with="50px" height="50px"src="{{ asset('storage') . '/' . $dato->documento }} alt=""></td>
                                        <td width="10%">{{ $dato->id_programa}}</td>
                                        <td width="10%">{{ $dato->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('edit' , ['id' => $dato->id])}}" class="btn btn-primary btn-sm" title="Editar">Editar</a>

                                            <br>
                                            <a href="{{ url('hermes/destroy/' . $dato->id) }}" class="btn btn-danger btn-sm"
                                                title="Editar">Borrar</a>
                                            {{-- <button href="{{url('documento/editar/'.$dato->id)}}" class="btn btn-primary btn-sm" title="Editar">Editar</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="data-table-keytable_info" role="status" aria-live="polite">
                            Showing 1 to 10 of 57 entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="data-table-keytable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="data-table-keytable_previous">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="0" tabindex="0"
                                        class="page-link">
                                        Previous
                                    </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="1" tabindex="0"
                                        class="page-link">
                                        1
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="2" tabindex="0"
                                        class="page-link">
                                        2
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="3" tabindex="0"
                                        class="page-link">
                                        3
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="4" tabindex="0"
                                        class="page-link">
                                        4
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="5" tabindex="0"
                                        class="page-link">
                                        5
                                    </a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="6" tabindex="0"
                                        class="page-link">
                                        6
                                    </a>
                                </li>
                                <li class="paginate_button page-item next" id="data-table-keytable_next">
                                    <a href="#" aria-controls="data-table-keytable" data-dt-idx="7" tabindex="0"
                                        class="page-link">
                                        Next
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end panel-body -->
    </div>
@endsection

@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
@endpush
