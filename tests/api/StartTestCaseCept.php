<?php
$base_url = 'http://localhost:8000/api/v1';

$I = new ApiTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

$I->wantTo('start a valid test case');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();

$I->wantTo('start a test case without arguments');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case without "cube_size" argument');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case',  ['querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case without "querys_num" argument');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case',  ['cube_size' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with invalid "cube_size" and "querys_num" arguments');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => 'a', 'querys_num' => 'a']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with invalid "cube_size" argument');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => 'a', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with "cube_size" value below of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '0', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with "cube_size" value above of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '101', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with invalid "querys_num" argument');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => 'a']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with "querys_num" value below of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '2', 'querys_num' => '0']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start a test case with "querys_num" value above of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '2', 'querys_num' => '1001']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 401
$I->seeResponseIsJson();

$I->wantTo('start two test cases with "test_cases_num" value set to 1');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::UNAUTHORIZED); // 401
$I->seeResponseIsJson();
