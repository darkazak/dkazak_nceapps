<?php require APPROOT . '/views/inc/header.php'; ?>
<?php

$isAdmin = ($_SESSION['admin'] == '1') ? '1' : '0';

display_workflow_page_label($data['page_title'], $data['page_subtitle']);
?>
<div class="container">
    <!-- ********** SEARCH FORM ********** -->
    <form>
        <div class="row item_search_full_form">
            <div class="col-4">
                <div class="row">
                    <!-- WILDCARDS HINTS -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7">
                                <p id="wildcards_btn" class="btn btn-secondary btn-sm text-muted prevent-select" onmouseup="toggle_visible('wildcard_hints');">
                                    WILDCARDS &downarrow;</p>
                            </div>
                            <div class="row" style="position: absolute; z-index: -1; margin-top: 45px; text-indent: -.6em;">
                                <div id="wildcard_hints" class="col-11 text-muted visually-hidden">
                                    <p class="H6 small my-1 mb-2">&rtrif;&nbsp;<span class="wilcard_label-key">&percnt;</span>
                                        for &quot;and&quot; &lpar;in any order&rpar;</p>
                                    <p class="H6 small my-1 mb-2">&rtrif;&nbsp;<span class="wilcard_label-key">&amp;</span>
                                        for &quot;and&quot; &lpar;in a specific order&rpar;</p>
                                    <p class="H6 small my-1 mb-2">&rtrif;&nbsp;<span class="wilcard_label-key">_&lbrace;underscore&rbrace;</span>
                                        &lbrace;underscore&rbrace; for any single character</p>
                                    <p class="H6 small my-1 mb-2">&rtrif;&nbsp;<span class="wilcard_label-key">space</span>
                                        works as entered and can significanly imapct the search results</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-4">
                <!-- SEARCH BOX -->
                <div class="row">
                    <div class="col-9">
                        <!-- STRICT-LOOSE SWITCH -->
                        <div style="margin-left: -1.1em;">
                            <p onclick="resetFindForm()" tabIndex="-1">
                                <label class="radio-inline mx-3"><input type="radio" id="loose-search" value="loose" name="optradio" tabIndex="-1" checked>&nbsp;Loose</label>
                                <label class="radio-inline mx-3"><input type="radio" id="strict-search" value="strict" name="optradio" tabIndex="-1">&nbsp;Strict</label>
                            </p>
                        </div>
                        <label for="searchfield">Search for Item</label>
                        <input type="text" value="" class="form-control text-uppercase mb-0" tabIndex="1" autofocus id="searchfield" size="30" onkeyup="showItemsResultPreview(this.value,optradio.value)">
                        <div class="my-2"></div>
                        <input type="button" id="reset_search_btn" value="Reset Search" tabIndex="4" class="btn btn-warning text-light" onclick="location.reload()" disabled>
                    </div>
                    <div class="col-3 mt-5">
                        <div id="counter" class="visually-hidden">
                            <span id="itemcount">0</span>&nbsp;
                            <span id="item_pronoun">items</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4 visually-hidden" id="result_preview" tabIndex="-1">
                <p class="mb-1 ps-2" id="livesearch_lable">Selection Preview</p>
                <div class="col-12 border border-info border-2 bg-info-light rounded-3 scroll-box" tabIndex="-1">
                    <table name="items-select" id="livesearch" class="col-12 text-dark mt-0 pt-0 prevent-select" tabIndex="-1"></table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <div id="list_found_btn">
                    <input type="button" class="btn btn-primary" value="List Search Results" tabIndex="2" onclick="listFoundItems(document.getElementById('searchfield').value, false)" id="list_items_btn" disabled>
                </div>
                <div class="my-4"></div>
                <div id="new_entry_btn">
                    <input type="button" class="btn btn-success text-light" value="Enter New Item" tabIndex="3" onclick="notYetAlert()" id="new_item_btn" disabled>
                </div>
            </div>
            <div class="col">
            </div>
        </div>

    </form>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <table id="result_table" class="mt-3 table table-striped table-hover visually-hidden">
                <thead>
                    <tr class="row">
                        <th scope="col" class="col-1"></th>
                        <th scope="col" class="col-3 ps-5">Name</th>
                        <!-- <th scope="col" class="col-3">Info</th> -->
                        <th scope="col" class="col-1">Minor</th>
                        <th scope="col" class="col-2 centered">VSN</th>
                        <th scope="col" class="col-1">Family</th>
                        <th scope="col" class="col-1 centered">ID</th>
                        <th scope="col" class="col-3"></th>
                    </tr>
                </thead>
                <tbody id="result_list" class="col-1">
                </tbody>
            </table>

        </div>
    </div>
</div>


<script>
    var input = document.getElementById("searchfield");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();

            document.getElementById("list_items_btn").tabIndex = "-1";
            document.getElementById("reset_search_btn").tabIndex = "-1";
            document.getElementById("new_item_btn").tabIndex = "-1";
            document.getElementById("list_items_btn").click();
        }
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>