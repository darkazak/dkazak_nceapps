<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an Account</h2>
            <p>Please fill out this form to register</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>"><span class="invaild-feedback"><?php echo $data['name_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>"><span class="invaild-feedback"><?php echo $data['email_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>"><span class="invaild-feedback"><?php echo $data['password_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>"><span class="invaild-feedback"><?php echo $data['confirm_password_error']; ?></span>
                </div>

                <div class="row mt-3">
                    <div class="col container-fluid d-grid gap-2 mt-3">
                        <input type="submit" value="Register" class="btn btn-success">
                    </div>
                    <div class="col container-fluid d-grid gap-2 mt-3">
                        <a href="<?php echo URLROOT ?>/users/login" class="btn btn-secondary text-nowrap">Have an account? Log in.</a>

                    </div>
                </div>



            </form>
        </div>
    </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>