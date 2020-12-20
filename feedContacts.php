<?php require_once('../DB/db.php');

session_start();
$response = array();

$master_user_id = $_SESSION["user_session"]['user_id'];

$connection = new mysqli($servername, $username, $password, $dbname);

// $result = $connection->query("SELECT * FROM tbl_contacts WHERE {$_SESSION["ID"]}");
$result = $connection->query("SELECT * FROM tbl_contacts WHERE master_user_id = $master_user_id");
if ($result->num_rows > 0) {
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        $response['data'][$count] = $row;
        $count++;
    }
}

$connection->close();

echo json_encode($response);
