<?php require_once('../DB/db.php');
session_start();
$response = array();

if (isset($_POST['submit'])) {


    $user_id = $_POST['txt_order_id'];

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $user_password = mysqli_real_escape_string($connection, $_POST['txt_password']);
    $hashed_password = hash('sha256', $user_password);

    $result = mysqli_query($mysqli, "UPDATE `tbl_user_data` SET user_password = '$hashed_password' WHERE user_id = $user_id");

    // var_dump($result);

    if ($result) {
        $response['message'] = 'password change success.!';
        $response['status'] = 200;
    } else {
        $response['message'] = 'Error...! password cannot change.!';
        $response['status'] = 500;
    }

    $mysqli->close();

    echo json_encode($response);
}
