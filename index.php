<?php session_start(); ?>

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
    <title>sign-in</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
   
     <![endif]-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>



</head>

<style>
    .error {
        color: #08fc;
        font-weight: 400;
        display: block;
        padding: 6px 0;
        font-size: 14px;
    }

    .form-control.error {
        border-color: #08fc;
        padding: .375rem .75rem;
    }
</style>

<body>
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
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(./assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body bg-dark">
                <form class="form-horizontal form-material mt-5" id="loginform" method="POST" action="login_authentication.php" name="contact-form">
                    <div class="mt-5"></div>
                    <div class="mt-5"></div>
                    <div class="mt-5"></div>
                    <a href="javascript:void(0)" class="text-center db">
                        <h2 class="text-primary">Sign In</h2>
                    </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" id="txt_email" name="txt_email" type="text" placeholder="Username">
                            <input type="hidden" name="txt_user_id" id="txt_user_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="txt_password" id="txt_password" type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">

                        <div>

                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">Log In</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>

    <!-- jqueery validation start -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <!-- jqueery validation end -->
    <!-- include the script -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.11/jquery.validate.unobtrusive.min.js"></script>


    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <!-- jqueery validation end -->


    <!-- default js part for form validations -->
    <script>
        $(document).ready(function() {
            // swal("Faild!", "please Fill required fields for login", "Error");
            <?php if (isset($_SESSION["response"])) { ?>
                console.log("<?php echo $_SESSION["response"]["message"]; ?>");
                swal("Faild!", "<?php echo $_SESSION["response"]["message"]; ?>", "Error");
                <?php unset($_SESSION["response"]); ?>
            <?php } ?>
        });
    </script>



    <script>
        $(function() {
            // alert("dsdsd")';'
            $("#loginform").validate({
                // Define validation rules
                rules: {
                    txt_password: "required",
                    txt_email: {
                        required: true,
                        email: true
                    }
                },
                // Specify validation error messages
                messages: {
                    txt_email: {
                        required: "Please enter your email",

                    },
                    txt_password: {
                        required: "Please provide a password. for sign-in",

                    }
                },


            });
        });

        //this is for table values pass to the text fields starat
    </script>


</body>

</html>