<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <p class="h1">Search for Customer</p>

    <div class="row">

        <div class="col-1">
            <div id="list_found_btn" class="mt-0 visually-hidden">
                <button type="button" onclick="listFoundCustomers()" class="btn btn-primary">List</button>
            </div>
        </div>
        <div class="col-5 mx-3">
            <form>
                <input type="text" onkeyup="showCustomersResult(this.value)" class="form-control mb-0">
                <select name="customers" id="livesearch" class="form-select mt-0 visually-hidden"></select>
                <span id="counter" class="visually-hidden">&nbsp;&nbsp;<span
                        id="itemcount">0</span><span>&nbsp;customers</span></span>
            </form>
        </div>
        <div class="col">
            <span id="new_customer_btn" class="col-4 visually-hidden">
                <a href="<?php echo URLROOT; ?>/customer/add" class="btn btn-success">Enter New Customer</a>
            </span>
        </div>


    </div>


    <div class="container">
        <table id="result_table" class="table table-striped table-hover visually-hidden">
            <thead>
                <tr class="row">
                    <th scope="col" class="col-2"></th>
                    <th scope="col" class="col-3">Name</th>
                    <th scope="col" class="col-2">Phone</th>
                    <th scope="col" class="col-3">email</th>
                    <th scope="col" class="col-2"></th>
                </tr>
            </thead>
            <tbody id="result_list">
            </tbody>
        </table>

    </div>


</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>