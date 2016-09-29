<!DOCTYPE html>
<html lang="es" ng-app="cubeApp" ng-controller="cubeCtrl as cube">
    <head>
        <title>Cube summation</title>

        <!-- AngularJS -->
        <script type="text/javascript" src="{{ URL::asset('bower_components/angular/angular.min.js') }}"></script>
        <!-- Twitter Bootstrap -->
        <link rel="stylesheet" type="text/css"
              href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}"></script>
        <!-- Estilos de la aplicación -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Cube summation <small>Julián Hernández O.</small></h1>
                    </div>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                            <!-- Configuración del cubo: T -->
                            <form ng-submit="cube.configurarT()" ng-hide="!cube.pasos.configurando_t">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="n_tests">Cantidad de tests (T)</label>
                                            <input  type="number"
                                                    class="form-control"
                                                    id="n_tests"
                                                    name="n_tests"
                                                    autofocus
                                                    ng-model="cube.configuracion.test_cases_num" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary" value="Continuar" />
                                </div>
                            </form>
                            <!-- Fin Configuración del cubo: T -->

                            <!-- Configuración del cubo: N y M -->
                            <form ng-submit="cube.configurarNM()" ng-show="cube.pasos.configurando_nm">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="n_matrix">Dimensión del cubo (N)</label>
                                            <input  type="number"
                                                    class="form-control"
                                                    id="n_matrix"
                                                    name="n_matrix"
                                                    autofocus
                                                    ng-model="cube.configuracion.cube_size">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="n_commands">Cantidad de comandos (M)</label>
                                            <input  type="number"
                                                    class="form-control"
                                                    id="n_commands"
                                                    name="n_commands"
                                                    ng-model="cube.configuracion.querys_num">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-primary" value="Continuar" />
                                </div>
                            </form>
                            <!-- Fin Configuración del cubo: N y M -->

                            <!-- Ingreso de comandos -->
                            <form ng-submit="cube.procesarComando()" ng-show="cube.pasos.comandos">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="t_command">Tipo de comando</label>
                                            <select class="form-control"
                                                    id="t_command"
                                                    name="t_command"
                                                    ng-model="cube.comando.tipo"
                                                    autofocus
                                                    ng-options="comando.name as comando.label for comando in cube.tipos_comando">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="command">Comando</label>
                                            <input  type="text"
                                                    class="form-control"
                                                    id="command"
                                                    name="command"
                                                    ng-model="cube.comando.comando">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Enviar" />
                                    <input type="button" class="btn btn-primary" value="Regresar" ng-click="cube.irAConfigurarNM()"/>
                                </div>
                            </form>
                            <!-- Fin ingreso de comandos -->
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Resultado de la operaciones</b></div>
                                <div class="panel-body">

                                    <div class="bs-callout bs-callout-[[ historia.estado ]]"
                                         ng-repeat="historia in cube.historial">
                                        <h4 class="text-capitalize">[[ historia.titulo ]]</h4>
                                        <h5 class="text-capitalize">[[ historia.subtitulo ]]</h5>
                                        <p>[[ historia.mensaje ]]</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery: Requerido por bootstrap -->
        <script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Twitter Bootstrap -->
        <script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- AngularJS: Módulos -->
        <script type="text/javascript" src="{{ URL::asset('bower_components/angular-cookies/angular-cookies.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('bower_components/angular-resource/angular-resource.min.js') }}"></script>

        <!-- AngularJS: Applicación - configuración -->
        <script type="text/javascript" src="{{ URL::asset('app/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('app/config.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('app/constantes.js') }}"></script>
        <script>
            angular
                .module("cubeApp")
                .constant("CSRF_TOKEN", '{{ csrf_token() }}');
        </script>

        <!-- AngularJS: Applicación - controladores -->
        <script type="text/javascript" src="{{ URL::asset('app/controllers/cube.js') }}"></script>

        <!-- AngularJS: Applicación - recursos -->
        <script type="text/javascript" src="{{ URL::asset('app/resources/cube.js') }}"></script>
    </body>
</html>
