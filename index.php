

<?php require_once "./signup-data/controllerUserData.php"; ?>
<?php include './includes/Main-Header.php'?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 form">
            <form action="index.php" method="POST" autocomplete="" enctype="multipart/form-data">
                <h2 class="text-center">SignUp</h2>
                <?php
                if(count($errors) == 1){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    <?php
                }elseif(count($errors) > 1){
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach($errors as $showerror){
                            ?>
                            <li><?php echo $showerror; ?></li>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Full Name" required value="">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="file" name="pro-img" placeholder="Confirm password" required>
                </div>
                <div class="form-group d-flex">
                    <input class="button" type="submit" name="user-signup" value="Signup">
                </div>
                <div class="link login-link text-center">Already a member? <a href="login.php">Login here</a></div>
            </form>
        </div>
    </div>
</div>

</body>
</html>