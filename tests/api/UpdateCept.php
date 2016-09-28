<?php
$base_url = 'http://localhost:8000/api/v1';

$I = new ApiTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

$I->wantTo('start start a valid cube summation process, create the valid cube and update the value of valid block');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and update the value of block out range in X');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '5', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and update the value of block out range in Y');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '5', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and update the value of block out range in Z');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '5', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

// $I->wantTo('start start a valid cube summation process, create the valid cube and set invalid value to valid block');
// $I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
// $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
// $I->seeResponseIsJson();
// $I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
// $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
// $I->seeResponseIsJson();
// $I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => 'a']);
// $I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
// $I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call update with invalid x coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => 'a', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call update with invalid y coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => 'a', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call update with invalid z coordinate');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => 'a', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start start a valid cube summation process, create the valid cube and call update more times than allowed');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '2', 'querys_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '1', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 400
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '1', 'y' => '1', 'z' => '1', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 400
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/update', ['x' => '1', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED); // 401
$I->seeResponseIsJson();
