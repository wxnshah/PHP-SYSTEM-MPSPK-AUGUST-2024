<?php
require_once("conn.php");
if ( isset($_SESSION['userData']) != "") {
	header("Location: index.php");
	exit;
}
include('sweetalerts2.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Student Management System</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/v6.6.0/all.css" />
        <link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-light.css" />
        <link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-regular.css" />
        <link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-solid.css" />
        <link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-thin.css" />
        <script src="js/jquery-3.6.4.js"></script>
        <!-- SweetAlert2 -->
        <link rel="stylesheet" type="text/css" href="assets/libs/sweetalert2/sweetalert2.min.css"/>
        <!-- End SweetAlert2 -->
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Please Insert User IC" name="login_user_ic" />
                                                <label for="inputEmail">User IC</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="login_password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary mb-2" name="Submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="d-grid">
                                            <a href="register.php" class="btn btn-danger mb-2" name="Submit">Create Account</a>
                                        </div>
                                        <div class="small">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; MUHAMAD IKHWAN <?php echo date('Y');  ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap@5.2.3/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        <!-- Sweet Alerts js ends -->
    </body>
</html>