<div id="wrapper">


    <?php
    include "../assets/includes/sidebar.php";
    include "../assets/includes/header.php";
    include "../assets/includes/db.php";
   

    if (isset($_POST['edit_btn'])) {



        $prsn = mysqli_real_escape_string($db_con, $_POST['person']);
        $add = mysqli_real_escape_string($db_con, $_POST['address']);
        $age = mysqli_real_escape_string($db_con, $_POST['age']);
        $acnt = mysqli_real_escape_string($db_con, $_POST['account']);
        $phn = mysqli_real_escape_string($db_con, $_POST['phone']);
        $slry = mysqli_real_escape_string($db_con, $_POST['salary']);
        $brnch = mysqli_real_escape_string($db_con, $_POST['branch']);
        $jng = mysqli_real_escape_string($db_con, $_POST['joining']);
        $image = mysqli_real_escape_string($db_con, $_FILES['photo']['name']);
        $imageFileType = pathinfo($image, PATHINFO_EXTENSION);
        $getId = mysqli_real_escape_string($db_con, $_GET['id']);


        $staffQuery = mysqli_query($db_con, "UPDATE   staff  SET  PersonName='" . $prsn . "',  Address='" . $add . "',Age='" . $age . "', Account='" . $acnt ."',Phone='" . $phn . "',Salary='" . $slry . "',Branch='" . $brnch . "',Joining='" . $jng . "',Image='" . $image . "',status=1 where id='" . $getId . "'");
        

        if ($query) {
            echo '<script>alert("Data updated Successfully")</script>';
            echo '<script>window.location.href="../staff.php"</script>';
        } else {
            echo '<script>alert("Failed To update")</script>';
        }
    }

    ?>
 
    <div class="container">
   <?php
        $getStaff = mysqli_query($db_con, "SELECT * FROM staff WHERE id= '" . $_GET['id'] . "' && status=1");
        $result = mysqli_fetch_array($getStaff);
        ?>


        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">


                    <div class="col-md-6  mt-5">

                        <label class="control-label mb-2 field_txt">Upload Photo</label>
                        <input  value="<?php echo $result['Image'] ?>" type="file" class="form-control field_input_bg" name="photo">

                    </div>
                    <div class=" col-md-6   mt-5">
                        <label class="control-label mb-2 field_txt">Person Name </label>
                        <input   value="<?php echo $result['PersonName'] ?>" type="text" class="form-control field_input_bg" name="person">


                    </div>
                    <div class="col-md-6 mt-5">
                        <label class="control-label mb-2 field_txt">Address</label>
                        <input  value="<?php echo $result['Address'] ?>" type="text" class="form-control field_input_bg" name="address">

                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Age</label>
                        <input  value="<?php echo $result['Age'] ?>" type="number" class="form-control field_input_bg" name="age">
                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Account No.</label>
                        <input  value="<?php echo $result['Account'] ?>" type="number" class="form-control field_input_bg" name="account">


                    </div>
                    <div class="col-md-6  mt-5">
                        <label class="control-label mb-2 field_txt">Phone No.</label>
                        <input  value="<?php echo $result['Phone'] ?>" type="phone" class="form-control field_input_bg" name="phone">


                    </div>

                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">Salary/Monthly</label>
                        <input  value="<?php echo $result['Salary'] ?>" type="number" class="form-control field_input_bg" name="salary">

                    </div>
                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">From Branch</label>
                        <input  value="<?php echo $result['Branch'] ?>" type="text" class="form-control field_input_bg" name="branch">

                    </div>
                    <div class="col-md-6 mt-5">

                        <label class="control-label mb-2 field_txt">Joining Date</label>
                        <input   value="<?php echo $result['Joining'] ?>" type="date" class="form-control field_input_bg" name="joining">

                    </div>
                    <div class="col-md-6 mt-5">


                    <div class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                            <button class="back_btn_staff">Back</button>
                            <button class="submit_btn_staff" name="edit_btn">Submit</button>

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