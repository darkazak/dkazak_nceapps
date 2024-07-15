<?php
$_SESSION['showSessionResetButton'] = false;
$_SESSION['tradeInProcess'] = false;
require APPROOT . '/views/inc/header.php';
?>

<div class="container d-flex justify-content-center align-items-center">
    <div>
        <h2>Login</h2>
        <p>Please enter your employee number to continue</p>
        <form id="login_search" name="login_search" action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="row mb-4 mx-3 ms-0">
                <div class="col-12">
                    <label class="form-label" for="emp_num_entry">Employee Number<sup>*</sup></label>
                    <input autofocus tabIndex="1" type="text" name="emp_num_entry" id="emp_num_entry" class="form-control" value="<?php echo $data['emp_num']; ?>">
                </div>
            </div>

            <div class="row mb-4 mx-3 ms-0">
                <div class="col-12">
                    <label class="form-label mb-0 p-0" for="password">Password: <span class="text-secondary nce-subtitle">(optional)</span></label><br>
                    <input type="password" name="password" class="form-control mt-0 <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" tabIndex="3"><span class="invaild-feedback"><?php echo $data['password_error']; ?></span>
                    <p class="form-label text-secondary nce-subtitle">for admin features</p>
                </div>
            </div>
            <div class="row my-5 mx-3 ms-0">
                <div class="col-12">
                    <input id="enter_button" type="submit" value="Enter" class="btn btn-success px-5" tabIndex="2">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var input = document.getElementById("login_search");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("enter_button").click();
        }
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>