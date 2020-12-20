<?php require_once('./DB/db.php'); ?>
<?php
session_start();

if (!isset($_SESSION["user_session"])) {
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>User Management</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        .error {
            color: red;
            font-weight: 400;
            display: block;
            padding: 6px 0;
            font-size: 14px;
        }

        .form-control.error {
            border-color: red;
            padding: .375rem .75rem;
        }
    </style>

</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">

                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img border border-0"><img style="width: 100px;" src="<?php echo $_SESSION["user_session"]['profile_image'] ?>" alt="user" />
                        <div class="profile-text">
                            <h5><?php echo $_SESSION["user_session"]['first_name'] ?> <?php echo $_SESSION["user_session"]['last_name'] ?></h5>
                            <a class="text-white" href="log-out.php"><i class="fa fa-power-off"></i></a>
                        </div>
                    </div>

                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">Dashboard</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="manage_users.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Manage Admin</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="manage_contacts.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Manage Contacts</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="my_profile.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">My Profile</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Admin Profile</h3>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo $_SESSION["user_session"]['profile_image'] ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $_SESSION["user_session"]['first_name'] ?> <?php echo $_SESSION["user_session"]['last_name'] ?></h4>

                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $_SESSION["user_session"]['email'] ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $_SESSION["user_session"]['user_contact'] ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $_SESSION["user_session"]['user_address'] ?></h6>
                                <small class="text-muted p-t-30 db">Joined Date</small>
                                <h6><?php echo $_SESSION["user_session"]['record_inserted_date'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Edit Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Password Change</a> </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <form name="user_form" id="user_form" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="First Name">First Name</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['first_name'] ?>" class="form-control" name="txt_fname" type="text" id="txt_fname">
                                                    <input type="hidden" name="txt_for" id="txt_for">
                                                    <input type="hidden" name="txt_order_id" id="txt_order_id">

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="Last Name">Last Name</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['last_name'] ?>" class="form-control" name="txt_lname" placeholder="enter last name *" type="text" id="txt_lname">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding :10px;">
                                                    <label for="Email Address">Email Address</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['email'] ?>" class="form-control" name="txt_email" placeholder="enter email *" type="text" id="txt_email">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="Contct Number">Contct Number</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['user_contact'] ?>" class="form-control" name="txt_contact" placeholder="enter user contact number *" type="text" id="txt_contact">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="">Home Address</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['user_address'] ?>" class="form-control" name="txt_address" placeholder="enter user address *" type="text" id="txt_address">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding :10px;">
                                                    <label for="">Profile Image</label>
                                                    <input value="<?php echo $_SESSION["user_session"]['profile_image'] ?>" class="form-control" name="txt_profile_image" placeholder="enter profile image *" type="file" required id="txt_profile_image">
                                                    <input type="hidden" name="txt_current_image_url" id="txt_current_image_url">
                                                </div>

                                                <div class="col-12" style="padding :10px;">
                                                    <div id="submit_div" class="contact-btn" style="padding :10px;">
                                                        <button style="text-info" class="btn btn-success btn-block" name="submit" type="submit">Update Profile</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">

                                        <form name="password_form" id="password_form" method="POST" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="password ">Password</label>
                                                    <input type="hidden" name="txt_order_id" id="txt_order_id">
                                                    <input type="hidden" name="txt_for" id="txt_for">
                                                    <input class="form-control" name="txt_password" placeholder="enter password *" type="password" id="txt_password">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                    <label for="c password">Confirm Password</label>
                                                    <input class="form-control" name="txt_confirm_password" placeholder="enter Confirm password *" type="password" id="txt_confirm_password">
                                                </div>


                                                <div class="col-12" style="padding :10px;">
                                                    <div id="submit_div" class="contact-btn" style="padding :10px;">
                                                        <button style="text-info" class="btn btn-info btn-block" name="submit" type="submit">Update Profile</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->

                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <!-- <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script> -->
    <!-- <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script> -->
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <!-- jqueery validation end -->
    <!-- include the script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.min.js"></script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- form hide and view script -->


    <script>
        $(document).ready(function() {
            $('#txt_for').val('EDIT');
            viewUser();
            $('#user_form').validate({
                rules: {
                    txt_fname: {
                        required: true,
                    },

                    txt_lname: {
                        required: true,

                    },
                    txt_email: {
                        required: true,
                        email: true
                    },
                    txt_profile_image: {
                        required: true,
                    },
                    txt_contact: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    txt_address: {
                        required: true,
                    }


                },
                messages: {
                    txt_fname: "First Name is Required.",
                    txt_email: {
                        required: "Email Address is Required",
                        minlength: "Please enter a valid email address"
                    },
                    txt_lname: "Last name is Required",
                    txt_profile_image: {
                        required: "User profile Image",
                    },
                    txt_contact: {
                        required: "User contact number is required",
                        minlength: "contact number must be min 10 characters long",
                        maxlength: "contact number must not be more than 10 characters long"
                    },
                    txt_address: {
                        required: "user home address is Required",
                    }

                },
                submitHandler: function(form) {
                    let formData = new FormData(form);
                    if ($('#txt_for').val() === 'EDIT') {
                        $.ajax({
                            type: 'POST',
                            url: 'models/edit_user.php',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            enctype: 'multipart/form-data',
                            contentType: false,
                            cache: false,
                            success: function(result) {

                                if (result.status == 200) {
                                    toastr["info"](result.message)
                                }
                                if (result.status == 500) {
                                    toastr["error"](result.message)
                                }

                            },
                            error: function(error) {
                                console.log("error : " + error);

                            }
                        });
                    }

                }
            });

        });

        // load data
        //this is for table values pass to the text fields starat
        function viewUser() {
            $.ajax({
                type: 'POST',
                url: 'models/get_user_for_fields.php',
                data: {
                    format: 'json'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.status === 200) {
                        toastr["success"](result.message);

                        var path = "./";
                        $('#txt_order_id').val(result.data[0].user_id);
                        $('#txt_fname').val(result.data[0].first_name);
                        $('#txt_lname').val(result.data[0].last_name);
                        $('#txt_email').val(result.data[0].email);
                        $('#txt_contact').val(result.data[0].user_contact);
                        $('#txt_address').val(result.data[0].user_address);
                        $('#txt_current_image_url').val(result.data[0].profile_image);
                        $("#user_exsit_image").attr("src", path + result.data[0].profile_image);
                    }
                    if (result.status == 500) {

                        toastr["error"](result.message);
                    }

                },
                error: function(error) {
                    console.log("error : " + error);

                }
            });
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#txt_for').val('EDIT');

            $('#password_form').validate({
                rules: {
                    txt_password: {
                        required: true,
                    },

                    txt_confirm_password: {
                        required: true,
                        equalTo: '#txt_password'
                    }

                },
                messages: {
                    txt_password: "provide password.",
                    txt_confirm_password: {
                        required: "provid confirm password",
                        equalTo: "Password and confirm password is not matching!."
                    }

                },
                submitHandler: function(form) {
                    let formData = new FormData(form);
                    if ($('#txt_for').val() === 'EDIT') {
                        $.ajax({
                            type: 'POST',
                            url: 'models/change_user_password.php',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            enctype: 'multipart/form-data',
                            contentType: false,
                            cache: false,
                            success: function(result) {

                                if (result.status == 200) {
                                    swal("SUCCESS!", "Your password has been changed.", "success");
                                    toastr["warning"](result.message);
                                }

                                if (result.status == 500) {
                                    swal("Failed", "The operation which you perform is failed!", "error");
                                    toastr["error"](result.message);
                                }

                            },
                            error: function(error) {
                                console.log("error : " + error);

                            }
                        });
                    }

                }
            });

        });
    </script>

</body>

</html>