<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <a href="<?php echo URLROOT; ?>" class="btn btn-light"> <i class="bi bi-rewind-fill">&nbsp;</i>Back</a>
        <div class="card card-body bg-light mt-5">
            <h2>Edit Post</h2>
            <p>Edit the post here</p>
            <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">

                <div class="form-group">
                    <label for="title">Title:</label><sup>*</sup></label>
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>"><span class="invaild-feedback"><?php echo $data['title_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Body:<sup>*</sup></label>
                    <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"> <?php echo $data['body']; ?></textarea>

                    <span class="invaild-feedback"><?php echo $data['body_error']; ?></span>
                </div>

                <div class="row mt-3">
                    <div class="col mt-3">
                        <input type="submit" value="Submit" class="btn btn-success px-4">
                    </div>
                </div>


            </form>
        </div>
    </div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>