<?php require_once('../DB/db.php'); ?>

<?php
session_start();

$mysqli = new mysqli($servername, $username, $password, $dbname);

$id = $_POST["id"];
$block_status = '0';

$response = array();

$results = mysqli_query($mysqli, "UPDATE tbl_user_data SET block_status = '1' WHERE user_id = $id");

if ($results) {
    $response['message'] = 'user block successfully.!';
    $response['status'] = 200;
} else {
    $response['message'] = 'Error block.!';
    $response['status'] = 500;
}

echo json_encode($response);

?>
