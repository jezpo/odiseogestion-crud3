@extends('layouts.default')

@section('title', config('hermes.name') . ' :: ' . 'panel')

@push('css')
    {{-- Aqui se coloca los CSS de assets --}}
@endpush

@section('header-nav')

@endsection

@section('content')

<div class="panel panel-inverse" data-sortable-id="ui-modal-notification-2">
    <div class="panel-heading ui-sortable-handle">
        <h4 class="panel-title">Modal</h4>
        
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            
        </div>
    </div>
    <div class="panel-body">
      <div class="card-body">
        <table class="table table-bordered" id="products">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- boostrap product model -->
<div class="modal fade" id="product-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ProductModal"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="ProductForm" name="ProductForm" class="form-horizontal"
                    method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Product name" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                placeholder="Quantity of product" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
@endsection


@push('scripts')

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
   
   
    <script>
       
        </script>
@endpush