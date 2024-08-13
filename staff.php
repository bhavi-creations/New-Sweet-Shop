<?php
ob_start(); // Start output buffering
?>

<div id="wrapper">

    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    include "assets/includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                $targetimg = "assets/uploads/staff/";
                $imgrename = date('Ymd') . rand(1, 1000000) . '.' . 'jpg';
                $image1 = move_uploaded_file($_FILES['photo']['tmp_name'], $targetimg . $imgrename);

                $staffQuery = mysqli_query($db_con, "INSERT INTO staff (UploadPhoto, PersonName, Address, Age, AccountNo, PhoneNo, Salary, FromBranch, JoiningDate, status) VALUES ('$imgrename', '$prsn', '$add', '$age', '$acnt', '$phn', '$slry', '$brnch', '$jng', 1)");

                if ($staffQuery) {
                    echo '<script>alert("Staff Data Inserted Successfully")</script>';
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo '<script>alert("Failed To Insert Staff Data")</script>';
                }
            }
        } elseif (isset($_POST['submit_incharge_btn'])) {
            $prsn1 = mysqli_real_escape_string($db_con, $_POST['person1']);
            $add1 = mysqli_real_escape_string($db_con, $_POST['address1']);
            $age1 = mysqli_real_escape_string($db_con, $_POST['age1']);
            $acnt1 = mysqli_real_escape_string($db_con, $_POST['account1']);
            $phn1 = mysqli_real_escape_string($db_con, $_POST['phone1']);
            $slry1 = mysqli_real_escape_string($db_con, $_POST['salary1']);
            $brnch1 = mysqli_real_escape_string($db_con, $_POST['branch1']);
            $jng1 = mysqli_real_escape_string($db_con, $_POST['joining1']);
            $image = mysqli_real_escape_string($db_con, $_FILES['photo1']['name']);
            $imageFileType = pathinfo($image, PATHINFO_EXTENSION);

            if (!in_array(strtolower($imageFileType), ['jpg', 'jpeg', 'png', 'gif'])) {
                echo "<script>alert('only JPG, JPEG, PNG & GIF files are allowed.')</script>";
            } else {
                $targetimg1 = "assets/uploads/incharge/";
                $imgrename1 = date('Ymd') . rand(1, 1000000) . '.' . 'jpg';
                $image = move_uploaded_file($_FILES['photo1']['tmp_name'], $targetimg1 . $imgrename1);

                $inchargeQuery = mysqli_query($db_con, "INSERT INTO incharge (UploadPhoto, PersonName1, Address1, Age1, AccountNo1, PhoneNo1, Salary1, FromBranch1, JoiningDate1, status) VALUES ('$imgrename1', '$prsn1', '$add1', '$age1', '$acnt1', '$phn1', '$slry1', '$brnch1', '$jng1', 1)");

                if ($inchargeQuery) {
                    echo '<script>alert("Incharge Data Inserted Successfully")</script>';
                    // header('Location: ' . $_SERVER['PHP_SELF']);

                    header("Location: staff.php?upload_success=incharge");
                    exit();
                } else {
                    echo '<script>alert("Failed To Insert Incharge Data")</script>';
                }
            }
        }
    }
    ob_end_flush(); // Flush the output buffer
    ?>




    <div id="content-wrapper" class="d-flex flex-column   bg-white">


        <div id="content">





            <div class="row  ">
                <div class="col-md-2 col-lg-2 ul_border">
                    <?php
                    $activeTable = 'detailsTable';
                    $activeListItem = 'details';
                    if (isset($_GET['upload_success']) && $_GET['upload_success'] === 'incharge') {
                        $activeTable = 'inchargesTable';
                        $activeListItem = 'incharges';
                    }
                    ?>




                    <ul class="ul_style">
                        <li id="addStaff" class="add_staff_list_detils open_table">+ Add Staff</li>
                        <li id="addIncharge" class="add_incharge_list_detils open_table">+ Add Incharge</li>

                        <li id="details" class="staff_list_detils open_table <?= $activeListItem == 'details' ? 'active' : '' ?>">
                            Staff</li>
                        <!-- <li id="salaries"
                            class="staff_list_detils open_table <?= $activeListItem == 'salaries' ? 'active' : '' ?>">
                            Sta - Salaries</li> -->
                        <li id="incharges" class="staff_list_detils open_table <?= $activeListItem == 'incharges' ? 'active' : '' ?>">
                            Incharges</li>

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

                <div class="col-md-10   col-lg-10 ul_border">


                    <div id="addStaffTable" class="table-container  ">

                        <div class="container">
                            <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                <div class="">
                                    <h6 class="staff_dtls">Add Staff </h6>
                                </div>
                                <div class="">
                                    <h6 class="kkd_brnch">Kakinada Branch
                                        <svg class="kkdIcon ml-2" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 20 19" fill="none">
                                            <path d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z" fill="#202224" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        </div>


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

                    <div id="addInchargeTable" class="table-container  ">
                        <div class="container">
                            <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                <div class="">
                                    <h6 class="staff_dtls">Add Incharge </h6>
                                </div>
                                <div class="">
                                    <h6 class="kkd_brnch">Kakinada Branch
                                        <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                            <path d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z" fill="#202224" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        </div>



                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">


                                    <div class="col-md-6  mt-5">

                                        <label class="control-label mb-2 field_txt">Upload Photo</label>
                                        <input type="file" class="form-control field_input_bg" name="photo1">
                                    </div>
                                    <div class=" col-md-6   mt-5">
                                        <label class="control-label mb-2 field_txt">Person Name </label>
                                        <input type="text" class="form-control field_input_bg" name="person1">


                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <label class="control-label mb-2 field_txt">Address</label>
                                        <input type="text" class="form-control field_input_bg" name="address1">

                                    </div>
                                    <div class="col-md-6  mt-5">
                                        <label class="control-label mb-2 field_txt">Age</label>
                                        <input type="number" class="form-control field_input_bg" name="age1">
                                    </div>
                                    <div class="col-md-6  mt-5">
                                        <label class="control-label mb-2 field_txt">Account No.</label>
                                        <input type="number" class="form-control field_input_bg" name="account1">


                                    </div>
                                    <div class="col-md-6  mt-5">
                                        <label class="control-label mb-2 field_txt">Phone No.</label>
                                        <input type="phone" class="form-control field_input_bg" name="phone1">


                                    </div>

                                    <div class="col-md-6 mt-5">

                                        <label class="control-label mb-2 field_txt">Salary/Monthly</label>
                                        <input type="number" class="form-control field_input_bg" name="salary1">

                                    </div>
                                    <div class="col-md-6 mt-5">

                                        <label class="control-label mb-2 field_txt">From Branch</label>
                                        <input type="text" class="form-control field_input_bg" name="branch1">

                                    </div>
                                    <div class="col-md-6 mt-5">

                                        <label class="control-label mb-2 field_txt">Joining Date</label>
                                        <input type="date" class="form-control field_input_bg" name="joining1">

                                    </div>
                                    <div class="col-md-6 mt-5">


                                        <div class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                                            <button class="back_btn_staff">Back</button>
                                            <button class="submit_btn_staff" name="submit_incharge_btn">Submit</button>

                                        </div>

                                    </div>



                                </div>
                            </div>
                        </form>
                    </div>







                    <div id="detailsTable" class="table-container <?= $activeTable == 'detailsTable' ? 'active' : '' ?>">


                        <!-- <div class="container">
                            <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                <div class="">
                                    <h6 class="staff_dtls">Staff Details</h6>
                                </div>
                                <div class="">
                                    <h6 class="kkd_brnch">Kakinada Branch
                                        <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                            <path d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z" fill="#202224" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body"> -->

                        <h6 class="staff_dtls mt-5 mb-4">Total Staff</h6>

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
                                $getQuery = mysqli_query($db_con, "SELECT * FROM staff WHERE status = 1");
                                $no = 1;
                                while ($data = mysqli_fetch_array($getQuery)) {

                                ?>
                                    <tr class="tr_hover">
                                        <td class="td_id_num"><?php echo $no ?></td>

                                        <td class="td_id_num"><img src="assets/uploads/staff/<?php echo $data['UploadPhoto'] ?>" style="height:50px; width:50px;" /></td>
                                        <td class="td_id_num"><?php echo $data['PersonName'] ?></td>
                                        <td class="td_id_num"><?php echo $data['Address'] ?></td>
                                        <td class="td_id_num"><?php echo $data['Age'] ?></td>
                                        <td class="td_id_num"><?php echo $data['AccountNo'] ?></td>
                                        <td class="td_id_num"><?php echo $data['PhoneNo'] ?></td>
                                        <td class="td_id_num"><?php echo $data['Salary'] ?></td>
                                        <td class="td_id_num"><?php echo $data['FromBranch'] ?></td>
                                        <td class="td_id_num"><?php echo $data['JoiningDate'] ?></td>
                                        <td>
                                            <div>
                                                <a href="edit-staff.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Edit"> <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                                <a href=" delete-staff.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Delete"><button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button></a>
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
                        <!-- </div>
                                </div>
                            </div>
                        </div> -->
                    </div>



                    <div id="inchargesTable" class="table-container <?= $activeTable == 'inchargesTable' ? 'active' : '' ?>">

                        <div class="container">
                            <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                <div class="">
                                    <h6 class="staff_dtls">Incharge Detailes</h6>
                                </div>
                                <div class="">
                                    <h6 class="kkd_brnch">Kakinada Branch
                                        <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                            <path d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z" fill="#202224" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <table id="example" class="display" style="width:100%">
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

                                                            <div>
                                                                <a href="edit-incharge.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Edit"> <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                                                <a href=" delete-incharge.php?id=<?php echo $data['id'] ?>" data-toggle="tooltip" title="Delete"><button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button></a>

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
            </div>





        </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php
    include "assets/includes/footer.php";
    ?>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</div>