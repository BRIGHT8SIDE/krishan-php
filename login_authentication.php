<?php require_once('./DB/db.php'); ?>
<?php

session_start();

$data = array();

if (isset($_POST['submit']) and isset($_POST['txt_password'])) {

    // check if the username and password has been entered
    if (!isset($_POST['txt_email']) || strlen(trim($_POST['txt_email'])) < 1) {
        $data['message'] = "Oops.Invalid credentials!";
        $data['state'] = 500;

        $_SESSION["response"] = $data;
    }

    if (!isset($_POST['txt_password']) || strlen(trim($_POST['txt_password'])) < 1) {
        $data['message'] = "Oops.Invalid credentials!";
        $data['state'] = 500;

        $_SESSION["response"] = $data;
    }

    if (empty($data)) {

        // save username and password into variables
        $user_id = mysqli_real_escape_string($connection, $_POST['txt_user_id']);
        $email = mysqli_real_escape_string($connection, $_POST['txt_email']);
        $user_password = mysqli_real_escape_string($connection, $_POST['txt_password']);
        $hashed_password = hash('sha256', $user_password);

        $sql = "SELECT * FROM tbl_user_data WHERE email=? AND user_password=? "; // SQL with parameters
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password);

        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result


        if ($row = $result->fetch_assoc()) {

            $data['message'] = 'Login Success';
            $data['state'] = 200;

            $_SESSION["user_session"] = $row;

            header("location:manage_users.php");
        } else {
            $data = array();
            $data['message'] = 'Invalid credentials!';
            $data['state'] = 500;

            $_SESSION["response"] = $data;

            header("location:index.php");
        }
    }
}

$connection->close();


?>