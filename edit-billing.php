<div id="wrapper">


    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    include "assets/includes/db.php";




    if (isset($_POST['submit_btn'])) {
        $iname = mysqli_real_escape_string($db_con, $iname);
        $kggs = mysqli_real_escape_string($db_con, $kggs);
        $amnt = mysqli_real_escape_string($db_con, $amnt);
        $disc = mysqli_real_escape_string($db_con, $disc);
        $incName = mysqli_real_escape_string($db_con, $incName);
        $brnch = mysqli_real_escape_string($db_con, $brnch);
        $dat = mysqli_real_escape_string($db_con, $dat);
        $id = mysqli_real_escape_string($db_con, $_GET['id']);

        $billingquery =
            mysqli_query($db_con, "UPDATE items SET ItemName='$iname', Kgs='$kggs', Amount='$amnt', Discount='$disc', InchargeName='$incName', Branch='$brnch', Date='$dat' WHERE id='$id' AND status=1");


        if ($billingquery) {
            echo '<script>alert("Data updated Successfully")</script>';
            echo '<script>window.location.href="discount.php"</script>';
        } else {
            echo '<script>alert("Failed To update")</script>';
        }
    }
    ?>




    <div class="container">

        <form method="post" enctype="multipart/form-data">
            <?php
            $id = mysqli_real_escape_string($db_con, $_GET['id']);
            $getBilling = mysqli_query($db_con, "SELECT * FROM items WHERE id='$id'");
            $data = mysqli_fetch_array($getBilling);
            ?>
            <div class="form-group">
                <div class="row">




                    <div class="col-md-6 mt-5">
                        <label class="control-label mb-2 field_txt">Item Name</label>
                        <input value="<?php echo $data['ItemName'] ?>" type="text" class="form-control field_input_bg" name="Item">

                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Kg's</label>
                        <input value="<?php echo $data['Kgs'] ?>" type="text" class="form-control field_input_bg" name="Kg">
                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Amount</label>
                        <input value="<?php echo $data['Amount'] ?>" type="number" class="form-control field_input_bg" name="amount">


                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Discount</label>
                        <input value="<?php echo $data['Discount'] ?>" type="number" class="form-control field_input_bg" name="discount">


                    </div>
                    <div class="col-md-6 mt-5">
                        <label class="control-label mb-2 field_txt">Incharge Name</label>
                        <input value="<?php echo $data['InchargeName'] ?>" type="text" class="form-control field_input_bg" name="incharge">

                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Branch</label>
                        <input value="<?php echo $data['Branch'] ?>" type="text" class="form-control field_input_bg" name="branch">
                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Date</label>
                        <input value="<?php echo $data['Date'] ?>" type="Date" class="form-control field_input_bg" name="date">
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
    include "assets/includes/footer.php";
    ?>
</div>