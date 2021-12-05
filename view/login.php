<!DOCTYPE html>
<html lang="en">

<?php include '../common/include_head.php' ?>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="../images/logo.png" class="login-logo"/>
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                <div class="alert alert-danger" role="alert" id="error" style="display: <?php echo (isset($_REQUEST['msg'])) ? 'block' : 'none'?>">
                                    <?php
                                    //If there is an error
                                    if (isset($_REQUEST['msg'])) {
                                        echo base64_decode($_REQUEST['msg']);
                                    }
                                    ?>
                                </div>
                                <form class="user" action="../controller/logincontroller.php" method="post">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control"
                                               aria-describedby="emailHelp"
                                               placeholder="Enter Email Address..."/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" />
                                    </div>
                                    <input type="submit" name="login" value="Login" class="btn btn-success btn-block"/>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include '../common/include_scripts.php'; ?>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').submit(function() {
            var email = $('#email').val();
            var pass = $('#pass').val();
            var errorMessage = $('#error');
            //To check both email and password
            if (email == "" && pass == "") {
                errorMessage.show();
                errorMessage.text("Please enter your email and password");
                return false;
            }
            //To check empty email
            if (email == "") {
                errorMessage.show();
                errorMessage.text("Please enter your Email address");
                return false;
            }
            //To check empty password
            if (pass == "") {
                errorMessage.show();
                errorMessage.text("Please enter your password");
                return false;
            }

        });
    });
</script>

</html>