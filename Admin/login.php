

<?php require_once "../signup-data/controllerAdminData.php"; ?>
<?php include '../includes/Main-Header.php'?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form login-form">
            <form action="login.php" method="POST" autocomplete="">
                <h2 class="text-center">Admin Login</h2>
                <p class="text-center">Login with your email and password.</p>
                <?php
                if(count($errors) > 0){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="email" name="adminemail" placeholder="Email Address" required value="">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="adminpass" placeholder="Password" required>
                </div>
                <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="admin-login" value="Login">
                </div>
                <div class="link login-link text-center">Not yet a member? <a href="index.php">Signup now</a></div>
            </form>
        </div>
    </div>
</div>
</body>
</html>