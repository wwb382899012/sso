<?php


//ini_set('session.cookie_path', '/');
//ini_set('session.cookie_domain', '.test.com');
//ini_set('session.cookie_lifetime', '1800');
//这句可以替代前面三句，作用一致
session_set_cookie_params(1800, '/', '.test.com');
session_start();

$_SESSION['user'] = 'xiaoming';
print_r($_SESSION);