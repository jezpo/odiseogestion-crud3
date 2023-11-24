<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Registro|UATF</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="../assets/css/material/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <div class="material-loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                    stroke-miterlimit="10"></circle>
            </svg>
            <div class="message">Cargado...</div>
        </div>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg-15.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Correspondencia</b> UATF</h4>
                    <p>

                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin register-header -->
                <h1 class="register-header">
                    Registrarse
                    <small>Ingresa tus datos para el registro</small>
                </h1>
                <!-- end register-header -->
                <!-- begin register-content -->
                <div class="register-content">
                    <form action="{{ route('register') }}" method="POST" class="margin-bottom-0" id="handleAjax">
                        @csrf
                        <label class="control-label">Nombres <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="nombres" class="form-control" placeholder="Nombres"
                                    value="{{ old('nombres') }}" required />
                                @error('nombres')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="control-label">Apellido Paterno<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="apellido_paterno" class="form-control"
                                    placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}" required />
                                @error('apellido_paterno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="control-label">Apellido Materno<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="apellido_paterno" class="form-control"
                                    placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}" required />
                                @error('apellido_paterno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="control-label">Cedula de identidad<span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="text" name="ci" class="form-control" placeholder="CI"
                                    value="{{ old('ci') }}" required />
                                @error('ci')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label class="control-label">Foto</label>
                            <div class="row m-b-15">
                                <div class="col-md-12">
                                    <input type="file" name="foto" class="form-control" />
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        

                        <label class="control-label">Contraseña</label> <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                    required />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <label class="control-label">Confirma tu contraseña <span class="text-danger">*</span></label>
                        <div class="row m-b-15">
                            <div class="col-md-12">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirma tu Contraseña" required />
                            </div>
                        </div>

                        <div class="register-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Registrarse</button>
                        </div>

                        <div class="m-t-30 m-b-30 p-b-30">
                            Ya estas Registrado ingresa a <a href="{{ route('login') }}">Aqui</a> Para ingresar.
                        </div>

                        <hr />

                        <p class="text-center mb-0">
                            &copy; Uatf Right Reserved 2023
                        </p>
                    </form>

                </div>
                <!-- end register-content -->
            </div>
            <!-- end right-content -->
        </div>
        <!-- end register -->

        <!-- begin theme-panel -->
        <div class="theme-panel theme-panel-lg">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i
                    class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5>App Settings</h5>
                <ul class="theme-list clearfix">
                    <li><a href="javascript:;" class="bg-red" data-theme="red"
                            data-theme-file="../assets/css/material/theme/red.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-pink" data-theme="pink"
                            data-theme-file="../assets/css/material/theme/pink.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Pink">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange"
                            data-theme-file="../assets/css/material/theme/orange.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-yellow" data-theme="yellow"
                            data-theme-file="../assets/css/material/theme/yellow.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Yellow">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-lime" data-theme="lime"
                            data-theme-file="../assets/css/material/theme/lime.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Lime">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green"
                            data-theme-file="../assets/css/material/theme/green.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-teal" data-theme="teal"
                            data-theme-file="../assets/css/material/theme/teal.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Teal">&nbsp;</a></li>
                    <li class="active"><a href="javascript:;" class="bg-aqua" data-theme="default"
                            data-theme-file="" data-click="theme-selector" data-toggle="tooltip"
                            data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue"
                            data-theme-file="../assets/css/material/theme/blue.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple"
                            data-theme-file="../assets/css/material/theme/purple.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-indigo" data-theme="indigo"
                            data-theme-file="../assets/css/material/theme/indigo.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Indigo">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black"
                            data-theme-file="../assets/css/material/theme/black.min.css" data-click="theme-selector"
                            data-toggle="tooltip" data-trigger="hover" data-container="body"
                            data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
                    <div class="col-6 d-flex">
                        <div class="custom-control custom-switch ml-auto">
                            <input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed"
                                value="1" checked />
                            <label class="custom-control-label" for="headerFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
                    <div class="col-6 d-flex">
                        <div class="custom-control custom-switch ml-auto">
                            <input type="checkbox" class="custom-control-input" name="header-inverse"
                                id="headerInverse" value="1" />
                            <label class="custom-control-label" for="headerInverse">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
                    <div class="col-6 d-flex">
                        <div class="custom-control custom-switch ml-auto">
                            <input type="checkbox" class="custom-control-input" name="sidebar-fixed"
                                id="sidebarFixed" value="1" checked />
                            <label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
                    <div class="col-6 d-flex">
                        <div class="custom-control custom-switch ml-auto">
                            <input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid"
                                value="1" />
                            <label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
                    <div class="col-md-6 d-flex">
                        <div class="custom-control custom-switch ml-auto">
                            <input type="checkbox" class="custom-control-input" name="sidebar-gradient"
                                id="sidebarGradient" value="1" />
                            <label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <h5>Admin Design (5)</h5>
                <div class="theme-version">
                    <a href="../template_html/index_v2.html">
                        <span style="background-image: url(../assets/img/theme/default.jpg);"></span>
                    </a>
                    <a href="../template_transparent/index_v2.html">
                        <span style="background-image: url(../assets/img/theme/transparent.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../template_apple/index_v2.html">
                        <span style="background-image: url(../assets/img/theme/apple.jpg);"></span>
                    </a>
                    <a href="../template_material/index_v2.html" class="active">
                        <span style="background-image: url(../assets/img/theme/material.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../template_facebook/index_v2.html">
                        <span style="background-image: url(../assets/img/theme/facebook.jpg);"></span>
                    </a>
                    <a href="../template_google/index_v2.html">
                        <span style="background-image: url(../assets/img/theme/google.jpg);"></span>
                    </a>
                </div>
                <div class="divider"></div>
                <h5>Language Version (7)</h5>
                <div class="theme-version">
                    <a href="../template_html/index_v2.html" class="active">
                        <span style="background-image: url(../assets/img/version/html.jpg);"></span>
                    </a>
                    <a href="../template_ajax/index_v2.html">
                        <span style="background-image: url(../assets/img/version/ajax.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../template_angularjs/index_v2.html">
                        <span style="background-image: url(../assets/img/version/angular1x.jpg);"></span>
                    </a>
                    <a href="../template_angularjs8/index_v2.html">
                        <span style="background-image: url(../assets/img/version/angular8x.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../template_laravel/index_v2.html">
                        <span style="background-image: url(../assets/img/version/laravel.jpg);"></span>
                    </a>
                    <a href="../template_vuejs/index_v2.html">
                        <span style="background-image: url(../assets/img/version/vuejs.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../template_reactjs/index_v2.html">
                        <span style="background-image: url(../assets/img/version/reactjs.jpg);"></span>
                    </a>
                </div>
                <div class="divider"></div>
                <h5>Frontend Design (4)</h5>
                <div class="theme-version">
                    <a href="../../../frontend/template/template_one_page_parallax/index.html">
                        <span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"></span>
                    </a>
                    <a href="../../../frontend/template/template_e_commerce/index.html">
                        <span style="background-image: url(../assets/img/theme/e-commerce.jpg);"></span>
                    </a>
                </div>
                <div class="theme-version">
                    <a href="../../../frontend/template/template_blog/index.html">
                        <span style="background-image: url(../assets/img/theme/blog.jpg);"></span>
                    </a>
                    <a href="../../../frontend/template/template_forum/index.html">
                        <span style="background-image: url(../assets/img/theme/forum.jpg);"></span>
                    </a>
                </div>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="https://seantheme.com/color-admin/documentation/"
                            class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
                        <a href="javascript:;" class="btn btn-default btn-block btn-rounded"
                            data-click="reset-local-storage"><b>Reset Local Storage</b></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/js/theme/material.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <script type="text/javascript">
  
        $(function() {
            $(document).on("submit", "#handleAjax", function() {
                var e = this;
        
                $(this).find("[type='submit']").html("Register...");
        
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
        
                      $(e).find("[type='submit']").html("Register");
                        
                      if (data.status) {
                          window.location = data.redirect;
                      }else{
        
                          $(".alert").remove();
                          $.each(data.errors, function (key, val) {
                              $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                          });
                      }
                   
                    }
                });
        
                return false;
            });
        
          });
        
      </script>
</body>

</html>
