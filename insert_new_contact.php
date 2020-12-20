<?php require_once('../DB/db.php');

session_start();
$response = array();

if (isset($_POST['submit'])) {

    $c_fname = $_POST['txt_fname'];
    $c_lname = $_POST['txt_lname'];
    $c_email = $_POST['txt_email'];
    $c_phone = $_POST['txt_contact'];
    $c_adddress  = $_POST['txt_address'];
    $c_status = '1';

    $master_user_id = $_SESSION["user_session"]['user_id'];

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


    // check if email already exsist    // check contact number already exsist

    $res = $mysqli->query("SELECT *  FROM tbl_contacts where c_email='" . $c_email . "'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $response['message'] = 'OOPS Email is already exsist in the system.. Please Check!';
        $response['status'] = 500;
    }

    $res = $mysqli->query("SELECT *  FROM tbl_contacts where c_phone='" . $c_phone . "'");
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        $response['message'] = 'OOPS Contact Number is already exsist in the system.. Please Check!';
        $response['status'] = 500;
    } else {


        $result = $mysqli->query("INSERT INTO tbl_contacts(c_fname, c_lname, c_email,c_phone,c_adddress,c_status,c_profile_image,master_user_id) VALUES 
                 ('" . $_POST['txt_fname'] . "','" . $_POST['txt_lname'] . "','" . $_POST['txt_email'] . "','" . $_POST['txt_contact'] . "','" . $_POST['txt_address'] . "','1','" . $db_path . "','" . $_SESSION["user_session"]['user_id'] . "')");

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
