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
                                                <label class="control-label mb-2 field_txt">Item Name</label>
                                                <input type="text" class="form-control field_input_bg" name="Item">

                                            </div>
                                            <div class="col-md-6  mt-5">
                                                <label class="control-label mb-2 field_txt">Kg's</label>
                                                <input type="text" class="form-control field_input_bg" name="Kg">
                                            </div>
                                            <div class="col-md-6  mt-5">
                                                <label class="control-label mb-2 field_txt">Amount</label>
                                                <input type="number" class="form-control field_input_bg" name="amount">


                                            </div>
                                            <div class="col-md-6  mt-5">
                                                <label class="control-label mb-2 field_txt">Discount</label>
                                                <input type="number" class="form-control field_input_bg"
                                                    name="discount">


                                            </div>
                                            <div class="col-md-6 mt-5">
                                                <label class="control-label mb-2 field_txt">Incharge Name</label>
                                                <input type="text" class="form-control field_input_bg" name="incharge">

                                            </div>
                                            <div class="col-md-6  mt-5">
                                                <label class="control-label mb-2 field_txt">Branch</label>
                                                <input type="text" class="form-control field_input_bg" name="branch">
                                            </div>
                                            <div class="col-md-6  mt-5">
                                                <label class="control-label mb-2 field_txt">Date</label>
                                                <input type="Date" class="form-control field_input_bg" name="date">
                                            </div>

                                            <div class="col-md-6 mt-5">


                                                <div
                                                    class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                                                    <button class="back_btn_staff">Back</button>
                                                    <button class="submit_btn_staff" name="submit-btn">Submit</button>

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