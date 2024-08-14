<?php
ob_start(); // Start output buffering
?>

<div id="wrapper">

    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    include "assets/includes/db.php";


    if (isset($_POST['submit-btn'])) {
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

        if (!in_array(strtolower($imageFileType), ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<script>alert('only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        } else {
            $targetimg = "assets/uploads/incharge/";
            $imgrename = date('Ymd') . rand(1, 1000000) . '.' . 'jpg';
            $image1 = move_uploaded_file($_FILES['photo']['tmp_name'], $targetimg . $imgrename);

            $inchargeQuery = mysqli_query($db_con, "INSERT INTO incharge (UploadPhoto, PersonName, Address, Age, AccountNo, PhoneNo, Salary, FromBranch, JoiningDate, status) VALUES ('$imgrename', '$prsn', '$add', '$age', '$acnt', '$phn', '$slry', '$brnch', '$jng', 1)");

            if ($inchargeQuery) {
                echo '<script>alert("Data Inserted Successfully")</script>';
                echo '<script>window.location.href="#"</script>';
            } else {
                echo '<script>alert("Failed To Inserted")</script>';
            }
        }
    }

    ob_end_flush(); // Flush the output buffer
    ?>




    <div id="content-wrapper" class="d-flex flex-column   bg-white">


        <div id="content">



            <div class="container branch_container">


                <div class="row  ">
                    <div class="col-md-4 col-lg-2 ul_border mb-4">
                        <?php
                        $activeTable = 'detailsTable';
                        $activeListItem = 'details';
                        if (isset($_GET['upload_success']) && $_GET['upload_success'] === 'incharge') {
                            $activeTable = 'inchargesTable';
                            $activeListItem = 'incharges';
                        }
                        ?>




                        <ul class="ul_style">
                            <li id="addStaff" class="add_staff_list_detils open_table">+ Add Incharge</li>

                            <li id="details" class="staff_list_detils open_table <?= $activeListItem == 'details' ? 'active' : '' ?>">
                                Incharge</li>

                        </ul>

                        <script>
                            const listItems = document.querySelectorAll('.open_table');
                            const tableContainers = document.querySelectorAll('.table-container');

                            listItems.forEach(item => {
                                item.addEventListener('click', function() {
                                    listItems.forEach(i => i.classList.remove('active'));
                                    this.classList.add('active');
                                    updateTable(this.id);
                                });
                            });

                            function updateTable(id) {
                                tableContainers.forEach(container => container.classList.remove('active'));
                                document.querySelectorAll('.table-container').forEach(container => container
                                    .classList.remove('active'));
                                document.getElementById(id + 'Table').classList.add('active');
                            }

                            // Initially show the details table
                            document.getElementById('detailsTable').classList.add('active');
                        </script>
                    </div>

                    <div class="col-md-11   col-lg-12 ul_border ">


                        <div id="addStaffTable" class="table-container  ">

                            <div class="container">
                                <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                    <div class="">
                                        <h6 class="staff_dtls">Add Incharge </h6>
                                    </div>

                                </div>
                            </div>


                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">


                                        <div class="col-md-6  mt-5">

                                            <label class="control-label mb-2 field_txt">Upload Photo</label>
                                            <input type="file" class="form-control field_input_bg" name="photo" id="IMGg">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class=" col-md-6   mt-5">
                                            <label class="control-label mb-2 field_txt">Person Name </label>
                                            <input type="text" class="form-control field_input_bg" name="person" id="Pname">
                                            <p id="errText" class="errText"></p>



                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <label class="control-label mb-2 field_txt">Address</label>
                                            <input type="text" class="form-control field_input_bg" name="address" id="ADdress">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Age</label>
                                            <input type="number" class="form-control field_input_bg" name="age" id="AGee">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Account No.</label>
                                            <input type="number" class="form-control field_input_bg" name="account" id="AnUm">
                                            <p id="errText" class="errText"></p>



                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Phone No.</label>
                                            <input type="phone" class="form-control field_input_bg" name="phone" id="PNum">
                                            <p id="errText" class="errText"></p>



                                        </div>

                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">Salary/Monthly</label>
                                            <input type="number" class="form-control field_input_bg" name="salary" id="Salar">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">From Branch</label>
                                            <input type="text" class="form-control field_input_bg" name="branch" id="FBranch">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">Joining Date</label>
                                            <input type="date" class="form-control field_input_bg" name="joining">

                                        </div>
                                        <div class="col-md-6 mt-5">


                                            <div class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                                                <button class="back_btn_staff">Back</button>
                                                <!-- <button class="submit_btn_staff" name="submit-btn">Submit</button> -->
                                                <button type="button" id="add-billing" class="btn btn-success text-white text-center">
                                                    Submit</button>
                                                <button name="submit-btn" type="submit" id="submit-billing" class="btn btn-success text-white text-center">
                                                    Submit</button>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="addInchargeTable" class="table-container  ">
                            <div class="container">
                                <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                    <div class="">
                                        <h6 class="staff_dtls">Add Incharge </h6>
                                    </div>

                                </div>
                            </div>



                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">


                                        <div class="col-md-6  mt-5">

                                            <label class="control-label mb-2 field_txt">Upload Photo</label>
                                            <input type="file" class="form-control field_input_bg" name="photo" id="IMGg1">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class=" col-md-6   mt-5">
                                            <label class="control-label mb-2 field_txt">Person Name </label>
                                            <input type="text" class="form-control field_input_bg" name="person" id="Pname1">
                                            <p id="errText" class="errText"></p>



                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <label class="control-label mb-2 field_txt">Address</label>
                                            <input type="text" class="form-control field_input_bg" name="address" id="ADdress1">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Age</label>
                                            <input type="number" class="form-control field_input_bg" name="age" id="AGee1">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Account No.</label>
                                            <input type="number" class="form-control field_input_bg" name="account" id="AnUm1">
                                            <p id="errText" class="errText"></p>



                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Phone No.</label>
                                            <input type="phone" class="form-control field_input_bg" name="phone" id="PNum1">
                                            <p id="errText" class="errText"></p>



                                        </div>

                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">Salary/Monthly</label>
                                            <input type="number" class="form-control field_input_bg" name="salary" id="Salar1">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">From Branch</label>
                                            <input type="text" class="form-control field_input_bg" name="branch" id="FBranch1">
                                            <p id="errText" class="errText"></p>


                                        </div>
                                        <div class="col-md-6 mt-5">

                                            <label class="control-label mb-2 field_txt">Joining Date</label>
                                            <input type="date" class="form-control field_input_bg" name="joining">

                                        </div>
                                        <div class="col-md-6 mt-5">


                                            <div class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                                                <button class="back_btn_staff">Back</button>
                                                <!-- <button class="submit_btn_staff" name="submit-btn">Submit</button> -->
                                                <button type="button" id="add-in" class="btn btn-success text-white text-center">
                                                    Submit</button>
                                                <button name="submit-btn" type="submit" id="submit-in" class="btn btn-success text-white text-center">
                                                    Submit</button>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>



                        <div id="detailsTable" class="table-container <?= $activeTable == 'detailsTable' ? 'active' : '' ?>">



                            <h6 class="staff_dtls mt-5 mb-4">Staff Details</h6>

                            <table id="example" class="display mb-4" style="width:100%">
                                <thead class="table_bg">
                                    <tr>
                                        <th class="th_names">ID</th>
                                        <th class="th_names">Upload Photo</th>
                                        <th class="th_names">Person Name</th>
                                        <th class="th_names">Address</th>
                                        <th class="th_names">Age</th>
                                        <th class="th_names">Account No</th>
                                        <th class="th_names">Phone No</th>
                                        <th class="th_names">Salary</th>
                                        <th class="th_names">From Branch</th>
                                        <th class="th_names">Joining Date</th>
                                        <th class="th_names">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getQuery = mysqli_query($db_con, "SELECT * FROM incharge WHERE status = 1");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($getQuery)) {

                                    ?>
                                        <tr class="tr_hover">
                                            <td class="td_id_num"><?php echo $no ?></td>

                                            <td class="td_id_num"><img src="./assets/uploads/incharge/<?php echo $data['UploadPhoto'] ?>" style="height:50px; width:50px;" /></td>

                                            <td class="td_id_num"><?php echo $data['PersonName'] ?></td>
                                            <td class="td_id_num"><?php echo $data['Address'] ?></td>
                                            <td class="td_id_num"><?php echo $data['Age'] ?></td>
                                            <td class="td_id_num"><?php echo $data['AccountNo'] ?></td>
                                            <td class="td_id_num"><?php echo $data['PhoneNo'] ?></td>
                                            <td class="td_id_num"><?php echo $data['Salary'] ?></td>
                                            <td class="td_id_num"><?php echo $data['FromBranch'] ?></td>
                                            <td class="td_id_num"><?php echo $data['JoiningDate'] ?></td>

                                            <td>

                                                <div class="d-flex">

                                                    <a href="edit-staff.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Edit"> <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button></a>



                                                    <a href="delete-staff.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Delete">
                                                        <button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button>
                                                    </a>
                                                </div>





                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>





                    </div>
                </div>


            </div>



        </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php
    include "assets/includes/footer.php";
    ?>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="./assets/api/inchargeApi.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <script>
        new DataTable('#example1');
    </script>

</div>