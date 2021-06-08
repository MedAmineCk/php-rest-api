<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/employees.php';

$database = new Database();
$db = $database->getConnection();

$item = new Employee($db);

// employee values
$item->id = isset($_GET['id']) ? $_GET['id'] : die('you need to specify ID!');
$item->name = isset($_GET['name']) ? $_GET['name'] : null;
$item->email = isset($_GET['email']) ? $_GET['email'] : '';
$item->age = isset($_GET['age']) ? $_GET['age'] : '';
$item->designation = isset($_GET['designation']) ? $_GET['designation'] : '';
$item->created = date('Y-m-d H:i:s');

if ($item->updateEmployee()) {
    echo json_encode("Employee data updated.");
} else {
    echo json_encode("Data could not be updated");
}
