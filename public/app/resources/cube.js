
/**
 * cubeApp
 *
 * Recurso para consumir la API
 */
(function(){
  'use strict';

  angular.module('cubeApp')
  .factory('CubeSummation', CubeResource);

  /**
   * @function CubeResource
   *
   * Define los verbos de la API
   */
  function CubeResource($resource, API_V1_PREFIX) {
    var url = API_V1_PREFIX + 'summation/';

    return $resource(url + ':comando', {comando: '@comando'});
  }

})();
