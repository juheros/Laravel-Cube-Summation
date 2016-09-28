<?php
$base_url = 'http://localhost:8000/api/v1';

$I = new ApiTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

$I->wantTo('start start a valid cube summation process, create the valid cube and get the summation');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '4']);

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid x1 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => 'a', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid y1 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => 'a', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid z1 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => 'a', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid x2 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => 'a', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid y2 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => 'a', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with invalid z2 coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => 'a']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with x1 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '5', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with y1 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '5', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with z1 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '5', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with x2 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '1', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with y2 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '2', 'y2' => '1', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query with z2 coordinate out of range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '3', 'y2' => '3', 'z2' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call query more times than allowed');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED); // 401
$I->seeResponseIsJson();
