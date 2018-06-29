<?php
 header('Access-Control-Allow-Origin: *');

$output = [
    'success' => false
];

require_once('db_connect.php');

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'];

switch($method){
    case 'GET':
        $path = include_once("get/$action.php");
        // $output['msg'] = 'GET method used';
    break;
    case 'POST':
        $path = "post/$action.php";
        // $output['msg'] = 'POST method used';
    break;
    case 'PUT':
        $output['msg'] = 'PUT method used';
    break;
    case 'PATCH':
        $_PATCH = json_decode(file_get_contents('php://input'), true);
        $path = "patch/$action.php";
        // $output['msg'] = 'PATCH method used';
    break;
    case 'DELETE':
        $output['msg'] = 'delete method used';
        $path = "delete/$action.php";
        // $output['msg'] = 'DELETE method used';
    break;
    default:
        $output['error'] = "unknown request method: $method";
}

print json_encode($output);

if(is_file($path)){
    include_once($path);
} else {
    $output['error'] = "unknown action: $action";
}




//  $data = file_get_contents('php://input');
// $data = json_decode($data, true);
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// echo '<pre>';
// print_r($_SERVER['REQUEST_METHOD']);
// echo '</pre>';