<!DOCTYPE html>
<html lang="es" ng-app="cubeApp" ng-controller="cubeCtrl as cube">
    <head>
        <title>Cube summation</title>

        <!-- AngularJS -->
        <script type="text/javascript" src="{{ URL::asset('bower_components/angular/angular.min.js') }}"></script>
        <!-- Twitter Bootstrap -->
        <link rel="stylesheet" type="text/css"
              href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Cube summation <small>Julián Hernández O.</small></h1>
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

        <!-- AngularJS: Applicación - controladores -->
        <script type="text/javascript" src="{{ URL::asset('app/controllers/cube.js') }}"></script>

        <!-- AngularJS: Applicación - recursos -->
        <script type="text/javascript" src="{{ URL::asset('app/resources/cube.js') }}"></script>
    </body>
</html>
