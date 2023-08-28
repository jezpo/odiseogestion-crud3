@extends('layouts.default')

@section('title', config('hermes.name').' :: '.'panel')

@push('css')
{{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')

{{--Contenido para tabla--}}
<h1>Editar documento</h1>

<div class="col-xl-12 ui-sortable">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-dropzone-1">
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">Crear registro</h4>
            
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
        </div>
        <div class="panel-body">

            <div>
                <h2 class="text-center">{!! config('hermes.name') !!}</h2>
               
            </div>
            {{--data-parsley-validate="true" name="demo-form" novalidate=""--}}
            <form method="POST" action="{{ route('hermes.update', ['id' => $documento->id])}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="fullname" >Cite:</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="fullname" name="cite" placeholder="cite" data-parsley-required="true" value="{{ $documento->cite }}">
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="message">Descripcion: (20 palabras minimo, 200 maximo) :</label>
                    <div class="col-md-8 col-sm-8">
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" data-parsley-range="[20,200]" placeholder="Range from 20 - 200">{{  $documento->descripcion }}</textarea>
                    </div>
                </div>
                
                <div class="form-group row m-b-15" >
                    <label class="col-md-4 col-sm-4 col-form-label" for="exampleFormControlFile1">Subir</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="file" class="form-control-file" id="documento" name="documento" >
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label">Tipo De Documento :</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="form-control" id="select-required" name="id_tipo_documento" data-parsley-required="true">
                            <option value="">Por favor selecciona una opcion</option>
                            <option value="1">Foo</option>
                            <option value="2">Bar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label">Programa :</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="form-control" id="select-required" name="id_programa" data-parsley-required="true">
                            <option value="">Por favor selecciona una opcion</option>
                            <option value="foo">Foo</option>
                            <option value="bar">Bar</option>
                        </select>
                    </div>
                </div>
            
                <div class="col-md-8 col-sm-8">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    
                </div>
            </form>
           
        </div>
    </div>
    <!-- end panel -->
    </div>
{{--}}    
<form action="{{ route('hermes::pages.update', ['id' => $documento->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cite">Cite</label>
            <input type="text" class="form-control" id="cite" name="cite" value="{{ $documento->cite }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $documento->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ $documento->estado }}">
        </div>
        <div class="form-group">
            <label for="hash">Hash</label>
            <input type="text" class="form-control" id="hash" name="hash" value="{{ $documento->hash }}">
        </div>
        <div class="form-group">
            <label for="id_tipo_documento">Tipo de documento</label>
            <input type="text" class="form-control" id="id_tipo_documento" name="id_tipo_documento" value="{{ $documento->id_tipo_documento }}">
        </div>
        <div class="form-group">
            <label for="documento">Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" value="{{ $documento->documento }}">
        </div>
        <div class="form-group">
            <label for="id_programa">Programa</label>
            <input type="text" class="form-control" id="id_programa" name="id_programa" value="{{ $documento->id_programa }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
    --}}
@endsection

@push('scripts')
{{-- Aqui se coloca los JS de assets --}}
@endpush