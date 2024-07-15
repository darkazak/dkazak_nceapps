<?php require APPROOT . '/views/inc/header.php'; ?>

<?php
echo "<br>";
echo "<br>";
echo "DATA: ";
echo "<br>";
print_r($data);
echo "<br>";
echo "<br>";
?>


<div class="row">
    <div class="col-5">
        <h3 class="mb-3">Edit Customer Record</h3>
    </div>
    <!-- <div class="col-3">
       <form action="<?php //echo URLROOT; 
                        ?>/customers/index" method="post">
            <button type="submit" id="return_btn" class="mt-2 btn btn-success">Return to Customer Lookup</button>
        </form>
    </div> -->
    <div class="col-7">
        &nbsp;
    </div>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <form action="<?php echo URLROOT; ?>/customers/update" method="post">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $data['first_name']; ?>" />
                                <label class="form-label" for="first_name">First Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $data['last_name']; ?>" />
                                <label class="form-label" for="last_name">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <!-- Email input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" />
                                <label class="form-label" for="email">Email Address</label>
                            </div>
                        </div>
                    </div>
                    <!-- Phone Num input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="phone_num" name="phone_num" class="form-control" value="<?php echo $data['phone_num']; ?>" />
                                <label class="form-label" for="phone_num">Phone Number</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <!-- Address input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="address_1" name="address_1" class="form-control" value="<?php echo $data['address_1']; ?>" />
                                <label class="form-label" for="address_1">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="address_2" name="address_2" class="form-control" value="<?php echo $data['address_2']; ?>" />
                                <label class="form-label" for="address_2">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-5">
                        <div class="col-7">
                            <!-- City input -->
                            <div class="form-outline">
                                <input type="text" id="city" name="city" class="form-control" value="<?php echo $data['city']; ?>" />
                                <label class="form-label" for="city">City</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <!-- State input -->
                            <div class="form-outline">
                                <input type="text" id="state" name="state" class="form-control" value="<?php echo $data['state']; ?>" />
                                <label class="form-label" for="state">State</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <!-- Zip input -->
                            <div class="form-outline">
                                <input type="text" id="zip_code" name="zip_code" class="form-control" value="<?php echo $data['zip_code']; ?>" />
                                <label class="form-label" for="zip_code">Zip Code</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-5">
                        <div class="col-12">
                            <label class="form-label" for="client_note">Client Note</label>
                            <textarea class="form-control" id="client_note" name="client_note" rows="4" wrap="soft"><?php echo $data['client_note']; ?></textarea>
                        </div>

                    </div>

                    <!-- Submit button -->
                    <div class="col-md-6 offset-md-3 my-5">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>