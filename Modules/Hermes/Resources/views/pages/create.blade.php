@extends('layouts.default')
@section('title', config('hermes.name') . ' :: ' . 'panel')
@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush
@section('header-nav')
@endsection
@section('content')
    {{-- Contenido para tabla --}}
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-dropzone-1">
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Ingresar Registro</h4>
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
            <div class="panel-body">
                <div>
                    <h2 class="text-center">{!! config('hermes.name') !!}</h2>
                </div>
                {{-- data-parsley-validate="true" name="demo-form" novalidate="" action="{{ route('store') }}" --}}
                <form class="form-horizontal"  method="POST" action="{{ route('store') }}">
                    @csrf
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Cite:</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="fullname" name="cite" placeholder="cite" data-parsley-required="true">
                            @error('cite')
                                <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                    <li class="parsley-required">{{ 'Este valor es requerido' }}</li>
                                </ul>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="message">Descripcion: (20 palabras minimo, 200 maximo) :</label>
                        <div class="col-md-8 col-sm-8">
                            <textarea class="form-control" id="message" name="descripcion" rows="3" data-parsley-range="[20,100]" placeholder="Range from 20 - 200"></textarea>
                            @error('descripcion')
                                <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                    <li class="parsley-required">{{ 'este valor es requerido' }}</li>
                                </ul>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="exampleFormControlFile1">Subir</label>
                        <div class="col-md-8 col-sm-8">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="documento">
                            @error('documento')
                                <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                    <li class="parsley-required">{{ 'este valor es requerido' }}</li>
                                </ul>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Tipo De Documento :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="select-required" name="id_tipo_documento"
                                data-parsley-required="true">
                                <option value="">Por favor selecciona una opcion</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                @error('id_tipo_documento')
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">{{ 'este valor es requerido' }}</li>
                                    </ul>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label">Programa :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" id="select-required" name="id_programa"
                                data-parsley-required="true">
                                <option value="">Por favor selecciona una opcion</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                @error('id_programa')
                                    <ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false">
                                        <li class="parsley-required">{{ 'este valor es requerido' }}</li>
                                    </ul>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                        <div class="col-md-8 col-sm-8">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
@endsection
@push('scripts')
    {{-- Aqui se coloca los JS de assets --}}
@endpush
