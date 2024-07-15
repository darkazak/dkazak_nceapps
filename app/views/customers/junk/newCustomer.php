<?php require APPROOT . '/views/inc/header.php'; ?>


<h1 class="mb-3 h1">Test New Customer</h1>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="<?php echo URLROOT; ?>/customers/newCustomer" method="post">



                <label class="form-label" for="lname">Last Name<sup>*</sup></label>
                <input type="text" name="lname" id="lname" class="form-control" value="">

                <label class="form-label" for="fname">First Name<sup>*</sup></label>
                <input type="text" name="fname" id="fname" class="form-control" value="">


                <div class="my-3">
                    <input type="submit" value="Enter" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>