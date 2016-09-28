<?php
$base_url = 'http://localhost:8000/api/v1';

$I = new ApiTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->wantTo('test the valid hackerrank scenarios');
$I->wantTo('start a cube summation process with a 2 test cases');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->wantTo('start the first test case with a size cube of 4 and 5 operations allowed');
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '4', 'querys_num' => '5']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->wantTo('send the following command "UPDATE 2 2 2 4"');
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->wantTo('send the following command "QUERY 1 1 1 3 3 3"');
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '4']);
$I->wantTo('send the following command "UPDATE 1 1 1 23"');
$I->sendPOST($base_url . '/summation/update', ['x' => '1', 'y' => '1', 'z' => '1', 'w' => '23']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->wantTo('send the following command "QUERY 2 2 2 4 4 4"');
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '4', 'y2' => '4', 'z2' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '4']);
$I->wantTo('send the following command "QUERY 1 1 1 3 3 3"');
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '3', 'y2' => '3', 'z2' => '3']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '27']);
$I->wantTo('start the first test case with a size cube of 2 and 4 operations allowed');
$I->sendPOST($base_url . '/summation/test_case', ['cube_size' => '2', 'querys_num' => '4']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();
$I->wantTo('send the following command "UPDATE 2 2 2 1"');
$I->sendPOST($base_url . '/summation/update', ['x' => '2', 'y' => '2', 'z' => '2', 'w' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->wantTo('send the following command "QUERY 1 1 1 1 1 1"');
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '1', 'y2' => '1', 'z2' => '1']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '0']);
$I->wantTo('send the following command "QUERY 1 1 1 2 2 2"');
$I->sendGET($base_url . '/summation/query', ['x1' => '1', 'y1' => '1', 'z1' => '1', 'x2' => '2', 'y2' => '2', 'z2' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '1']);
$I->wantTo('send the following command "QUERY 2 2 2 2 2 2"');
$I->sendGET($base_url . '/summation/query', ['x1' => '2', 'y1' => '2', 'z1' => '2', 'x2' => '2', 'y2' => '2', 'z2' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContainsJson(['summation' => '1']);
