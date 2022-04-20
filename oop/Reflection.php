<?php

require_once __DIR__ . '/Exception/ValidationException.php';
require_once __DIR__ . '/data/LoginRequest.php';
require_once __DIR__ . '/Helper/ValidationUtil.php';

$request = new LoginRequest();

$request->name = null;
$request->username = 'ahoktzy';
$request->password = 'asd';

//! Manual
// ValidationUtil::validate($request);

//! Pake Reflection
ValidationUtil::validateReflection($request);
