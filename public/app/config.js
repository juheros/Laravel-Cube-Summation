
(function() {
    'use strict';

    /*
     * cubeApp
     *
     * Configuración de la aplicación
     */
    angular
        .module('cubeApp')
        .config(cubeConfig)
        .run(cubeRun);

    cubeConfig.$inject = ['$httpProvider', '$interpolateProvider'];
    cubeRun.$inject = ['$http', '$cookies'];

    /**
     * @function cubeConfig
     * @desc Realiza las configuraciones iniciales necesarias.
     */
    function cubeConfig($httpProvider, $interpolateProvider) {
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

        // Evitar conflictos con el otros template engines
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }

    /**
     * @name cubeRun
     * @desc Configura la cookie CSRF
     */
    function cubeRun($http, $cookies) {
        $http.defaults.headers.post['X-CSRFToken'] = $cookies.get('csrftoken');
        $http.defaults.xsrfCookieName = 'csrftoken';
        $http.defaults.xsrfHeaderName = 'X-CSRFToken';
    }

})();
