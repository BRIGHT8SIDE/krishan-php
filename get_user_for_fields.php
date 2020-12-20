<?php require_once('../DB/db.php'); ?>
<?php

session_start();

//table in ajax call
$conn = new mysqli($servername, $username, $password, $dbname);
$user_id = $_SESSION["user_session"]['user_id'];

$response = array();

$result = $conn->query("SELECT * FROM tbl_user_data WHERE user_id = $user_id");
if ($result->num_rows > 0) {
    $response['status'] = '200';
    $response['message'] = 'data load success';
    $response['data'] = $result->fetch_assoc();
} else {
    $response['status'] = '500';
    $response['message'] = 'No data available for your request.!';
}

echo json_encode($response);

?>
