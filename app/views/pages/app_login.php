<?php
require APPROOT . '/views/inc/app-login-header.php';

echo "<br>";
echo "POST:<br>";
print_r($_POST);
echo "<br>";

if($_POST['session_secure']){
    $_SESSION['session_secure'] = true;
    echo "<br>";
    echo "********************************";
    echo "<br>";
    echo "session is secure, move on to the target page";
    echo "<br>";

} else{

    echo "<br>";
    echo "********************************";
    echo "<br>";
    echo "session is not secure, reload the login page";
    echo "<br>";

}
?>


<div class="container justify-content-center align-items-center">
    <div class="row">
        <!-- SPECIAL HEADER -->
        <div class="col p-5 text-center bg-secondary bg-opacity-25">
            <div class="mb-3 display-1"><?php echo $data['title']; ?></div>
            <div class="mb-3 display-6"><?php echo $data['description']; ?></div>
            <div>the temporary keycode is: <span class="lead text-primaary">123</span> for the Trade Intake App</div>
            <div>the temporary keycode is: <span class="lead text-primaary">321</span> for the Trade Listing App</div>
            <div>the temporary keycode is: <span class="lead text-primaary">456</span> for the Photofinishing App</div>
            <div>the temporary keycode is: <span class="lead text-primaary">654</span> for the Lab Processing App</div>
            <div>the temporary keycode is: <span class="lead text-primaary">***</span> for the Admin Functions in the Apps</div>
            <div class="container">
                <div class="row border border-info border-2 my-5 py-4">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-4 justify-content-center align-items-center">
                            <label class="form-label" for="secure_app_pasword">Password</label>
                            <input tabIndex="1" type="password" name="secure_app_pasword" id="secure_app_pasword" class="form-control mb-5" value="" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <form id="app_login_form" method="post" action="<?php echo URLROOT . "/systools/secure_session" ?>" target="_self">
                                <input type="button" id="secure_app_check_btn" name="secure_app_check_btn" class="btn btn-success width-200" value="Start App" >
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

const input = document.getElementById("secure_app_password");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("secure_app_check_btn").click();
  }
}
</script>

<?php require APPROOT . '/views/inc/app-login-footer.php'; ?>