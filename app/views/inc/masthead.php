<div class="my-5">

</div>
<hr />
<div class="my-5 d-flex justify-content-end">
    <?php if ($_SESSION['showSessionResetButton']) : ?>


    <input type="button" class="btn btn-warning" value="Reset Session"
        onclick="setAlertButton('/pages/new_session','Are you sure you want to reset the session?<br>The application will remain running and secure.','Yes','No');"
        style="border-color:maroon; border-style: dotted;
  border-width: 1px;" tabindex="-1">
    <span class="mx-4"></span>
    <!-- <button class="btn btn-warning me-5"
        onclick="setAlertButton('/pages/new_session','Are you sure you want to reset the session?<br>The application will remain running and secure.','Yes','No');"
        style="border-color:maroon; border-style: dotted;
  border-width: 1px;">Reset Session</button> -->
    <?php endif; ?>

    <input type="button" class="btn btn-warning" value="Shut Down Application"
        onclick="setAlertButton('/pages/close_application','Are you sure you want to completely quit the application?<br>All Data and application security will be cleared.','Yes','No');"
        style="border-color:maroon; border-style: dotted;
  border-width: 1px;" tabindex="-1">
    <span class="mx-4"></span>
    <!-- <button class="btn btn-warning me-5"
        onclick="setAlertButton('/pages/close_application','Are you sure you want to completely quit the application?<br>All Data and application security will be cleared.','Yes','No');"
        style="border-color:maroon; border-style: dotted;
  border-width: 1px;">Shut Down Application</button> -->
</div>