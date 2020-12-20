<?php require_once('../DB/db.php');

session_start();
$response = array();

$connection = new mysqli($servername, $username, $password, $dbname);

$result = $connection->query("SELECT * FROM tbl_user_data");
if ($result->num_rows > 0) {
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        $response['data'][$count] = $row;
        $count++;
    }
}

$connection->close();

echo json_encode($response);
