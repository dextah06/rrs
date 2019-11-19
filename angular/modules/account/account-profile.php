<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../../db.php';

session_start();

header("Content-Type: application/json");

$con = new pdo_db();

$sql = "SELECT id, CONCAT(firstname, ' ', lastname) fullname, username, user_type FROM users WHERE id = $_SESSION[id]";

$staff = $con->getData($sql);

$dir = "pictures/";
$avatar = $dir."avatar.png";

$picture = $dir.$staff[0]['id'].".jpg";
if (!file_exists("../".$picture)) $picture = $avatar;

$staff[0]['picture'] = $picture;

$_SESSION['account'] = $staff[0];

echo json_encode($staff[0]);

?>