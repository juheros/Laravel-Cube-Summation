<?php
$base_url = 'http://localhost:8000/api/v1';

$I = new ApiTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

$I->wantTo('start a valid cube summation process');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '2']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED); // 201
$I->seeResponseIsJson();

$I->wantTo('start a cube summation process with invalid "test_cases_num" argument');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => 'a']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start a cube summation process without "test_cases_num" argument');
$I->sendPOST($base_url . '/summation');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start a cube summation process with "test_cases_num" value below of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '0']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();

$I->wantTo('start a cube summation process with "test_cases_num" value above of the valid range');
$I->sendPOST($base_url . '/summation', ['test_cases_num' => '51']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::BAD_REQUEST); // 400
$I->seeResponseIsJson();
