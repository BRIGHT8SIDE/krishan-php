<?php require_once('../DB/db.php');
session_start();
$response = array();

if (isset($_POST['submit'])) {

    $contact_id = $_POST['txt_order_id'];
    $c_fname = $_POST['txt_fname'];
    $c_lname = $_POST['txt_lname'];
    $c_email = $_POST['txt_email'];
    $c_phone = $_POST['txt_contact'];
    $c_adddress  = $_POST['txt_address'];
    $c_status = '1';
    $master_user_id = '1';

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $time = time();
    $extensions = array("jpeg", "jpg", "png");

    $c_profile_image = $_FILES['txt_profile']['name'];
    $image_temp = $_FILES['txt_profile']['tmp_name'];
    $file_size = $_FILES['txt_profile']['size'];
    $target = '../ContacsImg/' . time() . basename($_FILES['txt_profile']['name']);

    if (in_array($target, $extensions) === false) {
        $response['status'] = 500;
        $response['message'] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 500000) {
        $response['status'] = 500;
        $response['message'] = 'File size must be excately 5 MB';
    }

    move_uploaded_file($image_temp, "$target");
    $db_path = "ContacsImg/" . time() . basename($_FILES['txt_profile']['name']);

    $result = $mysqli->query("UPDATE tbl_contacts SET c_fname = '$c_fname', c_lname = '$c_lname', c_email = '$c_email', c_phone = '$c_phone',c_adddress = '$c_adddress', c_profile_image = '$db_path' WHERE contact_id = $contact_id ");
    if ($result) {
        $response['message'] = 'contact data update Success.!';
        $response['status'] = 200;
    } else {
        $response['message'] = 'OOPS.contact data cannot updated!';
        $response['status'] = 500;
    }

    $mysqli->close();

    echo json_encode($response);
}
