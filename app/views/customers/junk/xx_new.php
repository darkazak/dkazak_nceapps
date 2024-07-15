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
    <div class="col-4">
        <h1 class="mb-3 h1">Add New Customer</h1>
    </div>
    <div class="col-3">
        <form action="<?php echo URLROOT; ?>/customers/index" method="post">
            <input type="hidden" name="dupe_last_name" value="<?php echo $data['dupe_last_name']; ?>">

            <button type="submit" id="return_btn" class="mt-2 btn btn-success <?php echo ($data['dup_found'] == "yes") ?  ('') : ('visually-hidden'); ?>">Return
                to Customer Lookup</button>
        </form>
    </div>
    <div class="col-5">
        &nbsp;
    </div>

    <div class="container">
        <div class="row">
            <div class="col-7 border">
                <form action="<?php echo URLROOT; ?>/customers/new" method="post">

                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="first_name" name="first_name" class="form-control <?php echo (!empty($data['first_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>" />
                                <label class="form-label" for="first_name">First Name</label>
                                <div class="invalid-feedback"><?php echo $data['first_name_error']; ?></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="last_name" name="last_name" class="form-control <?php echo (!empty($data['last_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>" />
                                <label class="form-label" for="last_name">Last Name</label>
                                <div class="invalid-feedback"><?php echo $data['last_name_error']; ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="row mb-4">
                        <?php if (!empty($data['email_error'])) : ?>
                            <div class="col-8">
                            <?php else : ?>
                                <div class="col">
                                <?php endif; ?>
                                <div class="form-outline">
                                    <input type="email" id="email" name="email" class="form-control  <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" />
                                    <label class="form-label" for="email">Email Address</label>
                                    <div class="invalid-feedback"><?php echo $data['email_error']; ?></div>
                                </div>
                                </div>
                                <?php if (!empty($data['email_error'])) : ?>
                                    <div class="form-check col-4">
                                        <label class="form-check-label" style="color: rgb(220, 76, 100);">
                                            <input class="form-check-input is-invalid" type="checkbox" name="email_dup_override" <?php echo ($data['email_dup_override'] == 'on') ? 'checked' : ''; ?>> override email
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="form-check col visually-hidden">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="email_dup_override" <?php echo ($data['email_dup_override'] == 'on') ? 'checked' : ''; ?>> override dup email
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Phone Num input -->
                            <div class="row mb-4">
                                <?php if (!empty($data['phone_num_error'])) : ?>
                                    <div class="col-8">
                                    <?php else : ?>
                                        <div class="col">
                                        <?php endif; ?>
                                        <div class="form-outline">
                                            <input type="text" id="phone_num" name="phone_num" class="form-control  <?php echo (!empty($data['phone_num_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone_num']; ?>" />
                                            <label class="form-label" for="phone_num">Phone Number</label>
                                            <div class="invalid-feedback"><?php echo $data['phone_num_error']; ?></div>
                                        </div>
                                        </div>
                                        <?php if (!empty($data['phone_num_error'])) : ?>
                                            <div class="form-check col-4">
                                                <label class="form-check-label" style="color: rgb(220, 76, 100);">
                                                    <input class="form-check-input is-invalid" type="checkbox" name="phone_num_dup_override" <?php echo ($data['phone_num_dup_override'] == 'on') ? 'checked' : ''; ?>> override phone
                                                </label>
                                            </div>
                                        <?php else : ?>
                                            <div class="form-check col visually-hidden">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="phone_num_dup_override" <?php echo ($data['phone_num_dup_override'] == 'on') ? 'checked' : ''; ?>> override dup phone
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <hr />
                                    <!-- Address input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" id="address_1" name="address_1" class="form-control" value="<?php echo $data['address_1']; ?>" />
                                                <label class="form-label" for="address_1">Address</label>
                                                <div class="invalid-feedback"><?php echo $data['address_1_error']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" id="address_2" name="address_2" class="form-control" value="<?php echo $data['address_2']; ?>" />
                                                <label class="form-label" for="address_2">Address</label>
                                                <div class="invalid-feedback"><?php echo $data['address_2_error']; ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" row mb-5">
                                        <div class="col-7">
                                            <!-- City input -->
                                            <div class="form-outline">
                                                <input type="text" id="city" name="city" class="form-control" value="<?php echo $data['city']; ?>" />
                                                <label class="form-label" for="city">City</label>
                                                <div class="invalid-feedback"><?php echo $data['city_error']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- State input -->
                                            <div class="form-outline">
                                                <input type="text" id="state" name="state" class="form-control" value="<?php echo $data['state']; ?>" />
                                                <label class="form-label" for="state">State</label>
                                                <div class="invalid-feedback"><?php echo $data['state_error']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <!-- Zip input -->
                                            <div class="form-outline">
                                                <input type="text" id="zip_code" name="zip_code" class="form-control" value="<?php echo $data['zip_code']; ?>" />
                                                <label class="form-label" for="zip_code">Zip Code</label>
                                                <div class="invalid-feedback"><?php echo $data['zip_code_error']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <label class="form-label" for="client_note">Client Note</label>
                                            <textarea class="form-control" id="client_note" name="client_note" rows="4" wrap="soft"></textarea>
                                        </div>

                                    </div>



                                    <!-- Submit button -->
                                    <div class="col-md-6 offset-md-3 my-5">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>

                                    <!-- <input type="hidden" id="dup_found" name="dup_found" value="no"> -->

                </form>



            </div>
        </div>
    </div>



    <?php
    // $data['client_Id']
    //     $data['fmName']
    //     $data['phoneNum']
    //     $data['email']; 


    ?>


    <?php require APPROOT . '/views/inc/footer.php'; ?>