<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h2>Search for a Customer</h2>
        </div>
    </div>


    <div class="row">


        <div class="col-4 my-2">
            <form>
                <input id="text_input" type="text" onkeyup="showCustomersFoundCount(this.value)" class="form-control text-uppercase mb-0" tabindex="0" value="" autofocus>
                <!-- <input type="text" autofocus onkeyup="showCustomersResult(this.value)" class="form-control mb-0" value=""> -->
                <!-- <select name="customers" id="livesearch" class="form-select text-light bg-info border border-2 border-info rounded-2 mt-0 visually-hidden" tabindex="-1"></select> -->
                <span id="counter" class="visually-hidden">&nbsp;&nbsp;
                    <span id="itemcount">0</span>&nbsp;
                    <span id="count_noun">customers found</span>
                </span>
            </form>
        </div>

        <div class="col-2 ps-3">
            <div id="list_found_customer_set" class="ms-5 mt-0">
                <input type="button" class="btn btn-primary" value="List" tabindex="0" onclick="listFoundCustomers(text_input.value);" id="list_customers_btn" name="list_customers_btn" disabled>
            </div>
        </div>

        <div class="col-3">
            <span id="new_customer_set" class="col-4">
                <input type="button" class="btn btn-success text-light" value="Enter New Customer" tabindex="0" onclick="pageLoad('<?php echo URLROOT . '/customers/new'  ?>')" id="make_new_customer_btn" name="make_new_customer_btn" disabled>

            </span>
        </div>

        <div class="col-3">
            <span id="reset_customer_search_set" class="col-4">
                <input type="button" class="btn btn-warning text-light" value="Reset Search" tabindex="0" onclick="location.reload();" id="reset_customer_search_btn" name="reset_customer_search_btn" disabled>
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

<script>
    const input01 = document.getElementById("text_input");
    input01.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("list_customers_btn").tabindex = "-1";
            document.getElementById("make_new_customer_btn").tabindex = "-1";
            document.getElementById("reset_customer_search_btn").tabindex = "-1";
            document.getElementById("list_customers_btn").click();

        }
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>