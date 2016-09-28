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
}
