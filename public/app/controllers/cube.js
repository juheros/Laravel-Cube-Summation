
/**
 * cubeApp
 *
 * Controlador principal de la aplicación
 */
(function(){
    'use strict';

    angular
        .module('cubeApp')
        .controller('cubeCtrl', cubeCtrl);

    cubeCtrl.$inject = ['CubeSummation', 'CSRF_TOKEN', 'COMANDO_QUERY', 'COMANDO_UPDATE'];

    function cubeCtrl(CubeSummation, CSRF_TOKEN, COMANDO_QUERY, COMANDO_UPDATE) {
        var vm = this;

        /*
         * Contiene la configuración del cubo
         * @type {Object}
         */
        vm.configuracion = {
            '_token': CSRF_TOKEN
        };

        /*
         * Contiene los tipos de comando soportados
         * @type {Array}
         */
        vm.tipos_comando = [
            {'label': 'UPDATE', 'name': COMANDO_UPDATE},
            {'label': 'QUERY', 'name': COMANDO_QUERY}
        ];

        /*
         * Contiene la información del comando actual
         * @type {Object}
         */
        vm.comando = {
            tipo: COMANDO_UPDATE,
            comando: null,
            valores: {}
        };

        /*
         * Contiene el historial de peticiones (Estado, Mensaje)
         * @type {Array}
         */
        vm.historial = [];

        vm.pasos = {
            configurando_t: true,
            configurando_nm: false,
            comandos: false
        };

        /**
         * @function configurarT
         * @description  Realiza la petición a la API para configurar la cantidad de
         *               tests cases `T`.
         */
        vm.configurarT = function() {
            CubeSummation.save(vm.configuracion, function(respuesta) {
                var historia = {
                    'estado': 'exito',
                    'titulo': respuesta.message,
                    'mensaje': 'Valor de T agregado correctamente: ' + vm.configuracion.test_cases_num
                };

                vm.historial.unshift(historia);
                vm.pasos.configurando_t = false;
                vm.pasos.configurando_nm = true;
            }, function(respuesta) {
                var historia = {
                    'estado': 'error',
                    'titulo': 'Error',
                    'mensaje': respuesta.data.message
                };

                vm.historial.unshift(historia);
            });
        };

        /**
         * @function configurarNM
         * @description  Realiza la petición a la API para configurar la dimension del
         *               cubo `N` y la cantidad de comandos ´M´.
         */
        vm.configurarNM = function() {
            CubeSummation.save({'comando': 'test_case'}, vm.configuracion, function(respuesta) {
                var historia = {
                    'estado': 'exito',
                    'titulo': respuesta.message,
                    'mensaje': 'Valor de N y M agregados correctamente: ' + vm.configuracion.cube_size + ' y ' + vm.configuracion.querys_num
                };

                vm.historial.unshift(historia);
                vm.pasos.configurando_nm = false;
                vm.pasos.comandos = true;
            }, function(respuesta) {
                var historia = {
                    'estado': 'error',
                    'titulo': 'Error',
                    'mensaje': respuesta.data.message
                };

                vm.historial.unshift(historia);
            });
        };

        /**
         * @function procesarComando
         * @description  Evalua el comando, organiza los datos del UPDATE y realiza
         *               la petición a la API.
         */
        vm.procesarComando = function() {
            var valores = vm.comando.comando.split(" ");

            if (vm.comando.tipo === COMANDO_UPDATE && valores.length === 4) {
                vm.comando.valores.x = valores[0];
                vm.comando.valores.y = valores[1];
                vm.comando.valores.z = valores[2];
                vm.comando.valores.w = valores[3];

                comandoUpdate();
            } else if (vm.comando.tipo === COMANDO_QUERY && valores.length === 6) {
                comandoQuery();
            } else {
                var historia = {
                    'estado': 'error',
                    'titulo': 'Error',
                    'mensaje': 'Comando mal escrito'
                };

                vm.historial.unshift(historia);
            }
        };

        /**
         * @function irAConfigurarNM
         * @description Regresa a configurar los valores de N y M.
         */
        vm.irAConfigurarNM = function() {
            vm.pasos.comandos = false;
            vm.pasos.configurando_nm = true;
        };

        /**
         * @function procesarComando
         * @description  Realiza la petición a la API para el comando UPDATE.
         */
        function comandoUpdate() {
            CubeSummation.save(obtenerParametros(), vm.comando.valores, function(respuesta) {
                var historia = {
                    'estado': 'exito',
                    'titulo': respuesta.message,
                    'mensaje': 'Comando ' + COMANDO_UPDATE.toUpperCase() + ': ' + vm.comando.comando
                };

                vm.historial.unshift(historia);
                vm.comando.comando = null;
            }, function(respuesta) {
                var historia = {
                    'estado': 'error',
                    'titulo': 'Error',
                    'mensaje': respuesta.data.message
                };

                vm.historial.unshift(historia);
            });
        }

        /**
         * @function procesarComando
         * @description  Realiza la petición a la API para el comando QUERY.
         */
        function comandoQuery() {
            CubeSummation.get(obtenerParametros(), function(respuesta) {
                var historia = {
                    'estado': 'exito',
                    'titulo': respuesta.message,
                    'subtitulo': 'Summation: ' + respuesta.summation,
                    'mensaje': 'Comando ' + COMANDO_QUERY.toUpperCase() + ': ' + vm.comando.comando
                };

                vm.historial.unshift(historia);
                vm.comando.comando = null;
            }, function(respuesta) {
                var historia = {
                    'estado': 'error',
                    'titulo': 'Error',
                    'mensaje': respuesta.data.message
                };

                vm.historial.unshift(historia);
            });
        }

        /**
         * @function procesarComando
         * @description  Evalua el comando, organiza los datos del QUERY y realiza
         *               la petición a la API.
         *
         * @returns {Object} Los QueryStrings para enviar en la petición.
         */
        function obtenerParametros() {
            var params = {};

            if (!angular.isUndefined(vm.comando.tipo)) {
                params.comando = vm.comando.tipo;

                if (params.comando === COMANDO_QUERY) {
                    var valores = vm.comando.comando.split(" ");

                    params.x1 = valores[0];
                    params.y1 = valores[1];
                    params.z1 = valores[2];
                    params.x2 = valores[3];
                    params.y2 = valores[4];
                    params.z2 = valores[5];
                }
            }

            return params;
        }
    }

})();
