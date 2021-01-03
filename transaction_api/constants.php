<?php

// Security
define('SECRET_KEY', 'test123');

// Data type
define('BOOLEAN', '1');
define('INTEGER', '2');
define('STRING', '3');

// Error codes
define('REQUEST_METHOD_NOT_VALID',      100);
define('REQUEST_CONTETTYPE_NOT_VALID',  101);
define('REQUEST_NOT_VALID',             102);
define('VALIDATE_PARAMETER_REQUIRED',   103);
define('VALIDATE_PARAMETER_DATATYPE',   104);
define('API_NAME_REQUIRED',             105);
define('API_PARAM_REQUIRED',            106);
define('API_DOES_NOT_EXIST',            107);
define('INVALID_USER_PASS',             108);

define('SUCCESS_RESPONSE',              200);

// Server errors
define('AUTHORIZATION_HEADER_NOT_FOUND',300);
define('ACCESS_TOKEN_ERRORS',           301);
?>
