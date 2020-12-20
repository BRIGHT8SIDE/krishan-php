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
    <title>Contact Managemnt</title>
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

</head>
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
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                        </li>

                        <li class="nav-item dropdown">
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <a class="text-white" href="log-out.php"><i class="fa fa-power-off"></i></a>
                    </ul>
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
            <div class="scroll-sidebar mt-5">
                <!-- End User profile text-->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img border border-0"><img style="width: 100px;" src="<?php echo $_SESSION["user_session"]['profile_image'] ?>" alt="user" />
                        <div class="profile-text">
                            <h5><?php echo $_SESSION["user_session"]['first_name'] ?> <?php echo $_SESSION["user_session"]['last_name'] ?></h5>
                            <a class="text-white" href="log-out.php"><i class="fa fa-power-off"></i></a>
                        </div>
                    </div>
                    <br>

                </div>
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
                    <h3>Contacts</h3>
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
                <div id="btn_main">
                    <button type="button" onclick="show_add_form()" class="btn btn-info btn-block" style="width:150px;">add contacts</button>
                </div>

                <!-- FormSection Start -->
                <div class="row" id="form1">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Manage Contact Data</h3>
                                <div>
                                    <form name="user_form" id="user_form" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="First Name">Contact Person First Name</label>
                                                <input class="form-control" name="txt_fname" placeholder="Enter first name *" type="text" id="txt_fname">
                                                <input type="hidden" name="txt_for" id="txt_for">
                                                <input type="hidden" name="txt_order_id" id="txt_order_id">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="Last Name">Contact Person Last Name</label>
                                                <input class="form-control" name="txt_lname" placeholder="enter last name *" type="text" id="txt_lname">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="Email Address">Contact Person Email Address</label>
                                                <input class="form-control" name="txt_email" placeholder="enter email *" type="text" id="txt_email">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="Contct Number">Contact Person Mobile Number</label>
                                                <input class="form-control" name="txt_contact" placeholder="enter user contact number *" type="text" id="txt_contact">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="">Contact Person Home Address</label>
                                                <input class="form-control" name="txt_address" placeholder="enter user address *" type="text" id="txt_address">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;">
                                                <label for="">Contact Person Profile Image</label>
                                                <input class="form-control" name="txt_profile" placeholder="enter profile image *" type="file" required id="txt_profile">
                                                <input type="hidden" name="txt_current_image_url" id="txt_current_image_url">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding :10px;" id="exsist_image">
                                                <label for="curior_main_logo" class="control-label col-md-2">Exsist Image</label>
                                                <img id="user_exsit_image" style="width: 100%; height:200px" id="corierUpdateImage" src="" alt="" data-default-file="">
                                            </div>
                                            <div class="col-12" style="padding :10px;">
                                                <div id="submit_div" class="contact-btn" style="padding :10px;">
                                                    <button style="text-info" class="btn btn-sqr" name="submit" type="submit">create contact</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- FormSection End -->

                <!-- Tabale start -->
                <div class="row">
                    <div class="col-12">
                        <!-- <button class="btn btn-success btn-block" style="width:150px;">Create Order</button> -->
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h3>Contact Detail Related to You</h3>
                                <!-- <h4 class="card-title">Data Export</h4> -->
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="contact23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->

            </div>
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
            $('#form1').hide();
            $('#exsist_image').hide();
            $('#txt_for').val('');
            $('#txt_fname').val('');
            $('#txt_lname').val('');
            $('#txt_email').val('');
            $('#txt_contact').val('');
            $('#txt_address').val('');
            $('#txt_profile').val('');
            $('#txt_order_id').val('');

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
                    txt_profile: {
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
                            url: 'models/edit_contacts.php',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            enctype: 'multipart/form-data',
                            contentType: false,
                            cache: false,
                            success: function(result) {
                                dt.ajax.reload();
                                dt.draw();
                                if (result.status == 200) {
                                    toastr["info"](result.message)
                                }
                                if (result.status == 500) {
                                    toastr["error"](result.message)
                                }
                                $('#txt_fname').val('');
                                $('#txt_lname').val('');
                                $('#txt_email').val('');
                                $('#txt_contact').val('');
                                $('#txt_address').val('');
                                $('#txt_profile').val('');
                                hide_add_form();
                            },
                            error: function(error) {
                                console.log("error : " + error);
                                dt.ajax.reload();
                                dt.draw();
                            }
                        });
                    }
                    if ($('#txt_for').val() === 'INSERT') {
                        $.ajax({
                            type: 'POST',
                            url: 'models/insert_new_contact.php',
                            data: formData,
                            dataType: 'json',
                            processData: false,
                            enctype: 'multipart/form-data',
                            contentType: false,
                            cache: false,
                            success: function(result) {
                                dt.ajax.reload();
                                dt.draw();
                                if (result.status == 200) {
                                    toastr["success"](result.message)

                                }
                                if (result.status == 500) {
                                    toastr["error"](result.message)

                                }
                                $('#txt_fname').val('');
                                $('#txt_lname').val('');
                                $('#txt_email').val('');
                                $('#txt_contact').val('');
                                $('#txt_address').val('');
                                $('#txt_profile').val('');
                                hide_add_form();
                            },
                            error: function(error) {
                                console.log("error : " + error);
                                dt.ajax.reload();
                                dt.draw();
                            },

                        });
                    }

                }
            });

        });
    </script>
    <script>
        ///select all data in the db 
        let dt = $('#contact23').DataTable({
            "order": [
                [0, "desc"]
            ],
            "processing": true,
            "serverSide": true,
            "initComplete": function(settings, json) {
                $('#contact23').show();
            },
            "select": true,
            "dataSrc": "tableData",
            "bFilter": false,
            "bInfo": false,
            "bPaginate": false,
            "columns": [{
                    "data": "contact_id",
                    "name": "contact_id",
                    "title": "ID"
                },
                {
                    "data": "c_profile_image",
                    "name": "c_profile_image",
                    "title": "Profile",
                    mRender: function(data) {
                        return '<div class="d-flex">' +
                            '<div style="width:50px; height:50px" class="usr-img-frame"><img alt="avatar" style="width:100%; height:100%;"  src="' + data + '"></div></div>'
                    }
                },
                {
                    "data": "master_user_id",
                    "name": "master_user_id",
                    "title": "Master ID"
                },

                {
                    "data": "c_fname",
                    "name": "c_fname",
                    "title": "First Name"
                },

                {
                    "data": "c_lname",
                    "name": "c_lname",
                    "title": "Last Name"
                },
                {
                    "data": "c_phone",
                    "name": "c_phone",
                    "title": "Contact Number"
                },

                {
                    "data": "c_email",
                    "name": "c_email",
                    "title": "Email Address"
                },
                {
                    "data": "c_adddress",
                    "name": "c_adddress",
                    "title": "Home Address"
                },
                {
                    "data": "c_status",
                    "name": "c_status",
                    "title": "Status",
                    mRender: function(data) {
                        if (data == '1') {
                            return '<span class="badge badge-info"> Active </span>'
                        }
                        if (data == 0) {
                            return '<span class="badge badge-danger"> Deactive </span>'
                        }


                    }
                },

                {
                    "data": "contact_id",
                    "title": "Actions",
                    mRender: function(data) {
                        return '<button type="button" " onclick="del(\'' + data + '\');" class="btn text-danger bg-dark"><i class="fa fa-trash"></i></button>' +
                            '<button id="editid" type="button" onclick="getUser(\'' + data + '\');" class="btn text-info bg-dark"><i class="fa fa-pencil-square-o"></i></button>'
                    }

                },

            ],
            "language": {
                "emptyTable": "No data to show.!"
            },
            "ajax": "models/feedContacts.php"
        });


        //this is for insert data 
        function show_add_form() {
            $('#form1').show();
            $('#txt_for').val('INSERT');
            $('exsist_image').hide();

            let content = '';
            content += '<button type="button" onclick="hide_add_form()" class="btn btn-sqr btn-block" style="width:150px;">Hide Form</button>';
            content += '<br>';

            $('#btn_main').html(content);
        }


        //this is for edit data 
        function show_edit_form() {
            $('#form1').show();
            $('#txt_for').val('EDIT');
            $('#exsist_image').show();

            let content = '';
            content += '<button type="button" onclick="hide_add_form()" class="btn btn-sqr btn-block" style="width:150px;">Hide Form</button>';
            content += '<br>';

            $('#btn_main').html(content);

            let content1 = '<button style="text-info" class="btn btn-sqr" name="submit" type="submit">Edit User</button>';

            $('#submit_div').html(content1);

        }

        //this is for hide form 
        function hide_add_form() {
            $('#form1').hide();
            $('#exsist_image').hide();
            $('#txt_for').val('');
            $('#txt_fname').val('');
            $('#txt_lname').val('');
            $('#txt_email').val('');
            $('#txt_contact').val('');
            $('#txt_address').val('');
            $('#txt_profile').val('');
            $('#txt_order_id').val('');

            let content = '';
            content += '<button type="button" onclick="show_add_form()" class="btn btn-success btn-block" style="width:150px;">Add contact</button>';

            $('#btn_main').html(content);
        }

        //this is for table values pass to the text fields starat
        function getUser(id) {
            $.ajax({
                type: 'POST',
                url: 'models/get_contactss_for_fields.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    show_edit_form();

                    var path = "./";

                    $('#txt_order_id').val(result.data.contact_id);
                    $('#txt_fname').val(result.data.c_fname);
                    $('#txt_lname').val(result.data.c_lname);
                    $('#txt_email').val(result.data.c_email);
                    $('#txt_contact').val(result.data.c_phone);
                    $('#txt_address').val(result.data.c_adddress);
                    $('#txt_current_image_url').val(result.data.c_profile_image);
                    $("#user_exsit_image").attr("src", path + result.data.c_profile_image);

                    dt.ajax.reload();
                    dt.draw();

                },
                error: function(error) {
                    console.log("error : " + error);

                    dt.ajax.reload();
                    dt.draw();

                }
            });
        }

        ///this is for delete function start
        function del(id) {
            // this is for sweet alert popup view for the 
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this item!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#fcb03b",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: 'POST',
                        url: 'models/removeContact.php',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(result) {
                            dt.ajax.reload();
                            dt.draw();
                            if (result.status == 200) {
                                swal("Deleted!", "Your selected User has been Blocked.", "success");
                                toastr["warning"](result.message);
                            }

                            if (result.status == 500) {
                                swal("Failed", "The operation which you perform is failed!", "error");
                                toastr["error"](result.message);
                            }


                        },
                        error: function(error) {
                            dt.ajax.reload();
                            dt.draw();
                            swal("Failed", "The operation which you perform is failed!", "error");

                        }
                    });
                } else {
                    swal("Cancelled", "Your selected record is safe :)", "error");
                }
            });


        }
    </script>


</body>

</html>