<?php require_once('../DB/db.php');
session_start();
$response = array();

if (isset($_POST['submit'])) {

    $first_name = $_POST['txt_fname'];
    $last_name = $_POST['txt_lname'];
    $email = $_POST['txt_email'];
    $user_contact = $_POST['txt_contact'];
    $user_address  = $_POST['txt_address'];
    $active_status = '1';
    $block_status = '0';
    $user_password = $_POST['txt_password'];

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


    // check if email already exsist    // check contact number already exsist

    $res = $mysqli->query("SELECT *  FROM tbl_user_data where email='" . $email . "'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $response['message'] = 'OOPS Email is already exsist in the system.. Please Check!';
        $response['status'] = 500;
    }

    $res = $mysqli->query("SELECT *  FROM tbl_user_data where user_contact='" . $user_contact . "'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $response['message'] = 'OOPS Contact Number is already exsist in the system.. Please Check!';
        $response['status'] = 500;
    } else {

        //password convert to sha 256 and trim data
        $email = mysqli_real_escape_string($connection, $_POST['txt_email']);
        $user_password = mysqli_real_escape_string($connection, $_POST['txt_password']);
        $hashed_password = hash('sha256', $user_password);


        $result = $mysqli->query("INSERT INTO tbl_user_data(first_name, last_name, email,profile_image,user_contact,user_address,active_status,block_status,user_password) VALUES 
                 ('" . $_POST['txt_fname'] . "','" . $_POST['txt_lname'] . "','" . $_POST['txt_email'] . "','" . $db_path . "','" . $_POST['txt_contact'] . "','" . $_POST['txt_address'] . "','1','0','" . $hashed_password . "')");

        if ($result) {
            $response['message'] = 'User Record Save Success.!';
            $response['status'] = 200;
        } else {
            $response['message'] = 'User Record Cannot Save.!';
            $response['status'] = 500;
        }
    }

    $mysqli->close();

    echo json_encode($response);
}
