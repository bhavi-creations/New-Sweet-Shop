<div id="wrapper">


    <?php
    include "../assets/includes/sidebar.php";
    include "../assets/includes/header.php";
    include "../assets/includes/db.php";    

    ?>
    <div class="container">


        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">


                    <div class="col-md-6  mt-5">

                        <label class="control-label mb-2 field_txt">Upload Photo</label>
                        <input type="file" class="form-control field_input_bg" name="photo">
                    </div>
                    <div class=" col-md-6   mt-5">
                        <label class="control-label mb-2 field_txt">Person Name </label>
                        <input type="text" class="form-control field_input_bg" name="person">


                    </div>
                    <div class="col-md-6 mt-5">
                        <label class="control-label mb-2 field_txt">Address</label>
                        <input type="text" class="form-control field_input_bg" name="address">

                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Age</label>
                        <input type="number" class="form-control field_input_bg" name="age">
                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Account No.</label>
                        <input type="number" class="form-control field_input_bg" name="account">


                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Phone No.</label>
                        <input type="phone" class="form-control field_input_bg" name="phone">


                    </div>

                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">Salary/Monthly</label>
                        <input type="number" class="form-control field_input_bg" name="salary">

                    </div>
                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">From Branch</label>
                        <input type="text" class="form-control field_input_bg" name="branch">

                    </div>
                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">Joining Date</label>
                        <input type="date" class="form-control field_input_bg" name="joining">

                    </div>
                    <div class="col-md-6 mt-5">


                        <div class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                            <button class="back_btn_staff">Back</button>
                            <button class="submit_btn_staff" name="submit-btn">Submit</button>

                        </div>

                    </div>



                </div>
            </div>
        </form>

        
    </div>


    <?php
    include "../assets/includes/footer.php";
    ?>
</div>