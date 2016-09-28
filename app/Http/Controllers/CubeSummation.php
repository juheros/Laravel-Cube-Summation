<?php

namespace App\Http\Controllers;

use Exception;
use InvalidArgumentException;
use Response;
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
        $test_cases_num = (int) $request->input('test_cases_num');

        $status = 500;
        $response = array('message' => 'Error desconocido.');

        if ($test_cases_num < 1 || $test_cases_num > 50) {
            $status = 400;
            $response = array('message' => 'Valor no válido para T.');
        } else {
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
        $cube_size = (int) $request->input('cube_size');
        $querys_num = (int) $request->input('querys_num');
        $test_cases_num = $request->session()->get('test_cases_num', 0);

        $status = 500;
        $response = array('message' => 'Error desconocido.');

        if ($test_cases_num <= 0) {
          $status = 401;
          $response = array('message' => 'Casos de prueba agotados.');
        }
        else if ($querys_num < 1 || $querys_num > 1000) {
            $status = 400;
            $response = array('message' => 'Valor no válido para M.');
        }else{
            try {
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

}
