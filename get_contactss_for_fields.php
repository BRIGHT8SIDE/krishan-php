<?php require_once('../DB/db.php'); ?>
<?php

session_start();

//table in ajax call
$conn = new mysqli($servername, $username, $password, $dbname);
$contact_id = $_REQUEST["id"];

$response = array();

$response['status'] = '500';
$response['message'] = 'No data available for your request.!';

$result = $conn->query("SELECT * FROM tbl_contacts WHERE contact_id = $contact_id");
if ($result->num_rows > 0) {
    $response['status'] = '200';
    $response['message'] = 'data load success';
    $response['data'] = $result->fetch_assoc();
}

echo json_encode($response);

?>
