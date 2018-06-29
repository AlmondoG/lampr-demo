<?php

header('Access-Control-Allow-Origin: *');

$output = [
    'success' => false
];

require_once('db_connect.php');

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'];

switch($method) {
    case 'GET':
        include_once("get/$action.php");
        break;
    case 'POST':
        include_once("post/$action.php");
        break;
    case 'PUT':
        $output['msg'] = 'Put method used my dude';
        break;
    case 'PATCH':
        $_PATCH = json_decode(file_get_contents('php://input'), true);
        include_once("patch/$action.php");
        break;
    case 'DELETE':
        $output['msg'] = 'Delete method used my dude';
        break;
    default:
        $output['error'] = "Unknown request method: $method";
}


print json_encode($output);


//$data = file_get_contents('php://input');
//
////switches it to an associative array boiii
//$data = json_decode($data, true);



