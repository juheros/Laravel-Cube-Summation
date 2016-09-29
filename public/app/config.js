
(function() {
    'use strict';

    /*
     * cubeApp
     *
     * Configuración de la aplicación
     */
    angular
        .module('cubeApp')
        .config(cubeConfig);

    cubeConfig.$inject = ['$interpolateProvider'];

    /**
     * @function cubeConfig
     * @desc Realiza las configuraciones iniciales necesarias.
     */
    function cubeConfig($interpolateProvider) {
        // Evitar conflictos con el otros template engines
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }

})();
