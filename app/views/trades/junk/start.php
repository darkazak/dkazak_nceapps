<?php require APPROOT . '/views/inc/header.php'; ?>

<p class="h1">Trade Ticket</p>

<?php if (!customerConfirmed()) : ?>

<a href="<?php echo URLROOT; ?>/customers/search" class="btn btn-primary">Customer Search</a>

<?php else : ?>
<p>Trade Ticket for
    <?php echo $_SESSION['customer_name'] . ' ' . $_SESSION['customer_phone'] . ' ' . $_SESSION['customer_email']; ?>
</p>


<a href="<?php echo URLROOT; ?>/trade/add" class="btn btn-primary">Add Trade Item</a>

<?php endif; ?>


<?php require APPROOT . '/views/inc/footer.php'; ?>