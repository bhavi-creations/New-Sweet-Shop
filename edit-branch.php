<div id="wrapper">


    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    ?>
    <div class="container">

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <label class="control-label mb-2 field_txt">Branch Area</label>
                        <input type="text" class="form-control field_input_bg" name="brancharea">
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="row last_back_submit d-flex flex-row justify-content-between px-3">
                            <button class="back_btn_staff">Back</button>
                            <button type="submit" class="submit_btn_staff" name="submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php
    include "assets/includes/footer.php";
    ?>
</div>