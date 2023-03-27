<?php
defined('BASEPATH') or exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;


$db['default'] = array(
    'dsn'    => '',
    'hostname' => 'localhost',
    //	'username' => 'u504334565_doctrace',
    'username' => 'root',
    // 	'password' => '~]unPAFSc5',@wAGhQ9T
    //	'password' => '@wAGhQ9T',
    'password' => '',
    // u504334565_doctrace
    // 'database' => 'u504334565_doctrace',  
    'database' => 'doctracer1',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
