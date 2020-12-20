<?php require_once('../DB/db.php');
session_start();
$response = array();

if (isset($_POST['submit'])) {

    $user_id = $_POST['txt_order_id'];
    $first_name = $_POST['txt_fname'];
    $last_name = $_POST['txt_lname'];
    $email = $_POST['txt_email'];
    $user_contact = $_POST['txt_contact'];
    $user_address  = $_POST['txt_address'];
    $active_status = '1';
    $block_status = '0';

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $time = time();
    $extensions = array("jpeg", "jpg", "png");

    $profile_image = $_FILES['txt_profile_image']['name'];
    $image_temp = $_FILES['txt_profile_image']['tmp_name'];
    $file_size = $_FILES['txt_profile_image']['size'];
    $target = '../Images/' . time() . basename($_FILES['txt_profile_image']['name']);

    if (in_array($target, $extensions) === false) {
        $response['status'] = 500;
        $response['message'] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 500000) {
        $response['status'] = 500;
        $response['message'] = 'File size must be excately 5 MB';
    }

    move_uploaded_file($image_temp, "$target");
    $db_path = "Images/" . time() . basename($_FILES['txt_profile_image']['name']);

    $result = $mysqli->query("UPDATE tbl_user_data SET first_name = '$first_name', last_name = '$last_name', email = '$email', user_contact = '$user_contact',user_address = '$user_address', profile_image = '$db_path' WHERE user_id = $user_id ");
    if ($result) {
        $response['message'] = 'Data Update Success.!';
        $response['status'] = 200;
    } else {
        $response['message'] = 'OOPS. Data Cannot Updated!';
        $response['status'] = 500;
    }

    $mysqli->close();

    echo json_encode($response);
}
