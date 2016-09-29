<?php

namespace App\Http\Controllers;

use Exception;
use InvalidArgumentException;
use Response;
use Validator;
use Illuminate\Http\Request;
use App\Cube;

class CubeSummation extends Controller
{
  /**
  * @param Request $request
  *
  * @return Response
  */
  public function start(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'test_cases_num' => 'required|integer|between:1,50'
    ]);

    $status = 500;
    $response = array('message' => 'Error desconocido.');

    if($validator->fails()){
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');
    }else {
        $test_cases_num = (int) $request->input('test_cases_num');
      $request->session()->remove('cube');
      $request->session()->put('test_cases_num', $test_cases_num);

      $status = 201;
      $response = array('message' => 'Operación exitosa.');
    }

    return Response::json($response, $status, array(), JSON_UNESCAPED_UNICODE);
  }

  /**
  * @param Request $request
  *
  * @return Response
  */
  public function startTestCase(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'cube_size' => 'required|integer|between:1,100',
        'querys_num' => 'required|integer|between:1,1000',
    ]);
    $status = 500;
    $response = array('message' => 'Error desconocido.');
    $test_cases_num = $request->session()->get('test_cases_num', 0);

    if($validator->fails()){
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');

    }else if ($test_cases_num <= 0) {
      $status = 401;
      $response = array('message' => 'Casos de prueba agotados.');

    }else{
      try {
        $cube_size = (int) $request->input('cube_size');
        $querys_num = (int) $request->input('querys_num');
        $cube = new Cube($cube_size);
        $request->session()->put('querys_num', $querys_num);
        $request->session()->put('cube', $cube);
        $request->session()->decrement('test_cases_num');
        $status = 201;
        $response = array('message' => 'Operación exitosa.');
      } catch (InvalidArgumentException $e) {
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');
      } catch (Exception $e) {
        $response = array('message' => $e->getMessage());
      }
    }

    return Response::json($response, $status, array(), JSON_UNESCAPED_UNICODE);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'x' => 'required|integer',
        'y' => 'required|integer',
        'z' => 'required|integer',
        'w' => 'required|integer',
    ]);
    $x = (int) $request->input('x');
    $y = (int) $request->input('y');
    $z = (int) $request->input('z');
    $w = (int) $request->input('w');
    $querys_num = $request->session()->get('querys_num', 0);
    $cube = $request->session()->get('cube', null);

    $status = 500;
    $response = array('message' => 'Error desconocido.');

    if($validator->fails()){
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');

    }else if ($querys_num <= 0) {
      $status = 401;
      $response = array('message' => 'Operaciones agotadas.');

    }else if ($cube) {
      try {
        $cube->update($x, $y, $z, $w);
        $request->session()->decrement('querys_num');
        $status = 200;
        $response = array('message' => 'Operación exitosa.');
      } catch (InvalidArgumentException $e) {
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');
      }
    } else {
      $status = 404;
      $response = array('message' => 'Aún no se ha iniciado el caso de prueba.');
    }

    return Response::json($response, $status, array(), JSON_UNESCAPED_UNICODE);
  }

  public function query(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'x1' => 'required|integer',
        'y1' => 'required|integer',
        'z1' => 'required|integer',
        'x2' => 'required|integer',
        'y2' => 'required|integer',
        'z2' => 'required|integer',
    ]);

    $x1 = (int) $request->input('x1');
    $y1 = (int) $request->input('y1');
    $z1 = (int) $request->input('z1');
    $x2 = (int) $request->input('x2');
    $y2 = (int) $request->input('y2');
    $z2 = (int) $request->input('z2');
    $querys_num = $request->session()->get('querys_num', 0);
    $cube = $request->session()->get('cube', null);

    $status = 500;
    $response = array('message' => 'Error desconocido.');

    if($validator->fails()){
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');

    }else if ($querys_num <= 0) {
      $status = 401;
      $response = array('message' => 'Operaciones agotadas.');

    }else if ($cube) {
      try {
        $summation = $cube->query($x1, $y1, $z1, $x2, $y2, $z2);
        $request->session()->decrement('querys_num');
        $status = 200;
        $response = array('summation' => $summation, 'message' => 'Operación exitosa.');
      } catch (InvalidArgumentException $e) {
        $status = 400;
        $response = array('message' => 'Argumentos no válidos para esta solicitud.');
      }
    } else {
      $status = 404;
      $response = array('message' => 'Aún no se ha iniciado el caso de prueba.');
    }

    return Response::json($response, $status, array(), JSON_UNESCAPED_UNICODE);
  }

}
