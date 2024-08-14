<div id="wrapper">


    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    include "assets/includes/db.php";
    if (isset($_POST['submit-btn'])) {

        $Area = mysqli_real_escape_string($db_con, $_POST['Area']);
        $inc = mysqli_real_escape_string($db_con, $_POST['incharge']);
        $erng = mysqli_real_escape_string($db_con, $_POST['earnimngs']);
        $exp = mysqli_real_escape_string($db_con, $_POST['expenses']);


        $reportQuery = mysqli_query($db_con, "INSERT INTO report SET BranchArea	='" . $Area . "',InchargeName='" . $inc . "',Earnings='" . $erng . "',Monthlyexpenses='" . $exp . "',status=1");
        if ($reportQuery) {
            echo '<script>alert("Data Inserted Successfully")</script>';
            echo '<script>window.location.href="#"</script>';
        } else {
            echo '<script>alert("Failed To Inserted")</script>';
        }
    }
    ?>


    <div id="content-wrapper" class="d-flex flex-column   bg-white">


        <div id="content">


            <section>
                <div class="container branch_container">
                    <!-- <div class="row"> -->
                    <div class="p-2 branch_border">
                        <ul class="ul_style">
                            <li id="addReport" class="add_staff_list_detils open_table">+ Add Report</li>
                            <li id="reports" class="staff_list_detils open_table active"> Reports</li>
                            <!-- <li id="totalBranch" class="staff_list_detils open_table">Total Reports</li> -->
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
                            document.querySelectorAll('.table-container').forEach(container => container.classList
                                .remove('active'));
                            document.getElementById(id + 'Table').classList.add('active');
                        }

                        // Initially show the details table
                        document.getElementById('detailsTable').classList.add('active');
                        </script>
                    </div>

                    <div class="p-2 branch_border">


                        <div id="addReportTable" class="table-container  ">

                            <div class="container">
                                <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                    <div class="">
                                        <h6 class="staff_dtls">Add Report </h6>
                                    </div>
                                    <div class="">
                                        <h6 class="kkd_brnch">Kakinada Branch
                                            <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="19" viewBox="0 0 20 19" fill="none">
                                                <path
                                                    d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z"
                                                    fill="#202224" />
                                            </svg>
                                        </h6>
                                    </div>
                                </div>
                            </div>


                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">




                                        <div class="col-md-6 mt-5">
                                            <label class="control-label mb-2 field_txt">Branch Area</label>
                                            <input type="text" class="form-control field_input_bg" name="Area"
                                                id="BArea">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Incharge Area</label>
                                            <input type="text" class="form-control field_input_bg" name="incharge"
                                                id="IName">
                                            <p id="errText" class="errText"></p>

                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Earnings</label>
                                            <input type="number" class="form-control field_input_bg" name="earnimngs"
                                                id="Erng">
                                            <p id="errText" class="errText"></p>



                                        </div>
                                        <div class="col-md-6  mt-5">
                                            <label class="control-label mb-2 field_txt">Monthly expenses</label>
                                            <input type="number" class="form-control field_input_bg" name="expenses"
                                                id="MNex">
                                            <p id="errText" class="errText"></p>



                                        </div>



                                        <div class="col-md-12 mt-5">


                                            <div
                                                class="row last_back_submit  d-flex flex-row justify-content-between  px-3">
                                                <button class="back_btn_staff">Back</button>
                                                <!-- <button class="submit_btn_staff" name="submit-btn">Submit</button> -->
                                                <button type="button" id="add-billing"
                                                    class="btn btn-success text-white text-center">
                                                    Submit</button>
                                                <button name="submit-btn" type="submit" id="submit-billing"
                                                    class="btn btn-success text-white text-center">
                                                    Submit</button>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="reportsTable" class="table-container active">


                            <!-- <div class="container">
                                    <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                        <div class="">
                                            <h6 class="staff_dtls">Reports</h6>
                                        </div>
                                        <div class="">
                                            <h6 class="kkd_brnch">Kakinada Branch
                                                <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="19" viewBox="0 0 20 19" fill="none">
                                                    <path
                                                        d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z"
                                                        fill="#202224" />
                                                </svg>
                                            </h6>
                                        </div>
                                    </div>
                                </div> -->

                            <h6 class="staff_dtls mt-5 mb-4">Total Reports</h6>

                            <table id="example" class="display mb-4" style="width:100%">
                                <thead class="table_bg">
                                    <tr>
                                        <th class="th_names">ID</th>
                                        <th class="th_names">Branch Area</th>
                                        <th class="th_names">Incharge names</th>
                                        <th class="th_names">Earnings</th>
                                        <th class="th_names">Monthly expenses</th>
                                        <th class="th_names">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getQuery = mysqli_query($db_con, "SELECT * FROM report WHERE status = 1");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($getQuery)) {
                                    ?>
                                    <tr class="tr_hover">
                                        <td class="td_id_num"><?php echo $no ?></td>
                                        <td class="td_id_num"><?php echo $data['BranchArea'] ?></td>
                                        <td class="td_id_num"><?php echo $data['InchargeName'] ?></td>
                                        <td class="td_id_num"><?php echo $data['Earnings'] ?></td>
                                        <td class="td_id_num"><?php echo $data['Monthlyexpenses'] ?></td>

                                        <td>


                                            <div>
                                                <a href="edit-report.php?id=<?php echo $data['id'] ?>"
                                                    data-toggle="tooltip" title="Edit"> <button class="edit_icon"><i
                                                            class="fa-regular fa-pen-to-square"></i></button></a>
                                                <a href=" delete-report.php?id=<?php echo $data['id'] ?>"
                                                    data-toggle="tooltip" title="Delete"><button class="dlt_icon"><i
                                                            class="fa-regular fa-trash-can"></i></button></a>

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

                        <div id="totalBranchTable" class="table-container">


                            <div class="container">
                                <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                    <div class="">
                                        <h6 class="staff_dtls">Total Branches</h6>
                                    </div>
                                    <div class="">
                                        <h6 class="kkd_brnch">Kakinada Branch
                                            <svg class="kkdIcon ml-3" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="19" viewBox="0 0 20 19" fill="none">
                                                <path
                                                    d="M17.7178 4.96555L10 12.1861L2.28216 4.96555C1.67358 4.33767 1.06501 4.32459 0.456432 4.9263C-0.152144 5.52802 -0.152144 6.11665 0.456432 6.6922L9.08714 14.8546C9.30844 15.1162 9.61272 15.247 10 15.247C10.3873 15.247 10.6916 15.1162 10.9129 14.8546L19.5436 6.6922C20.1521 6.11665 20.1521 5.52802 19.5436 4.9263C18.935 4.32459 18.3264 4.33767 17.7178 4.96555Z"
                                                    fill="#202224" />
                                            </svg>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-5 strip text-center">About</h4>
                                            <table id="example" class="display" style="width:100%">
                                                <thead class="table_bg">
                                                    <tr>
                                                        <th class="th_names">ID</th>
                                                        <th class="th_names">Branch Area</th>
                                                        <th class="th_names">Incharge names</th>
                                                        <th class="th_names">Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="tr_hover">
                                                        <td class="td_id_num">1</td>
                                                        <td class="td_id_mob">Kakinada</td>

                                                        <td class="td_id_num">
                                                            <img src="img/profile (1).png" alt="John Doe"
                                                                class="td_profile_pic">
                                                            John Doe
                                                        </td>

                                                        <td>
                                                            <button class="edit_icon"><i
                                                                    class="fa-regular fa-pen-to-square"></i></button>
                                                            <button class="dlt_icon"><i
                                                                    class="fa-regular fa-trash-can"></i></button>
                                                        </td>
                                                    </tr>
                                                    <!-- Add more rows as needed -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- </div> -->
                </div>
            </section>








        </div>


    </div>


    <?php
    include "assets/includes/footer.php";
    ?>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="./assets/api/reportApi.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
    new DataTable('#example');
    </script>
</div>