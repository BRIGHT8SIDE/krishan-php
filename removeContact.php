<?php require_once('../DB/db.php'); ?>

<?php

session_start();
$mysqli = new mysqli($servername, $username, $password, $dbname);

$id = $_POST["id"];
$response = array();

$results = mysqli_query($mysqli, "DELETE FROM `tbl_contacts` WHERE contact_id = $id");

if ($results) {
    $response['message'] = 'contact person deleted successfully.!';
    $response['status'] = 200;
} else {
    $response['message'] = 'Error delete contact person.!';
    $response['status'] = 500;
}

echo json_encode($response);

?>
