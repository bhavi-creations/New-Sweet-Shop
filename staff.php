<div id="wrapper">


    <?php
    include "assets/includes/sidebar.php";
    include "assets/includes/header.php";
    ?>


    <div id="content-wrapper" class="d-flex flex-column   bg-white">


        <div id="content">



        <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-2 ul_border">
                                <ul class="ul_style">
                                    <li id="addStaff" class="add_staff_list_detils open_table">+ Add Staff</li>
                                    <li id="addIncharge" class="add_incharge_list_detils open_table">+ Add Incharge</li>

                                    <li id="details" class="staff_list_detils open_table active">Staff</li>
                                    <li id="salaries" class="staff_list_detils open_table">Sta - Salaries</li>
                                    <li id="incharges" class="staff_list_detils open_table">Incharges</li>
                                    <li id="otherSalaries" class="staff_list_detils open_table">Inc - Salaries</li>
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

                            <div class="col-md-11   col-lg-9 ul_border">


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
                                                    <input type="file" class="form-control field_input_bg" name="file">
                                                </div>
                                                <div class=" col-md-6   mt-5">
                                                    <label class="control-label mb-2 field_txt">Person Name </label>
                                                    <input type="text" class="form-control field_input_bg" name="name">


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
                                                        <button class="submit_btn_staff">Submit</button>

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
                                                    <input type="file" class="form-control field_input_bg" name="file">
                                                </div>
                                                <div class=" col-md-6   mt-5">
                                                    <label class="control-label mb-2 field_txt">Person Name </label>
                                                    <input type="text" class="form-control field_input_bg" name="name">


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
                                                        <button class="submit_btn_staff">Submit</button>

                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div id="detailsTable" class="table-container active">


                                    <div class="container">
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
                                    </div>

                                    <table class="table_stf">
                                        <thead class="table_bg">
                                            <tr>
                                                <th class="th_names">ID</th>
                                                <th class="th_names">Staff Names</th>
                                                <th class="th_names">Phone Number</th>
                                                <th class="th_names">Address</th>
                                                <th class="th_names">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr_hover">
                                                <td class="td_id_num">1</td>
                                                <td class="td_id_num">
                                                    <img src="img/profile (1).png" alt="John Doe" class="td_profile_pic">
                                                    John Doe
                                                </td>
                                                <td class="td_id_mob">123-456-7890</td>
                                                <td class="td_id_num">123 Main St, City, Country</td>
                                                <td>
                                                    <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                                    <button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                                <div id="salariesTable" class="table-container">

                                    <div class="container">
                                        <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                            <div class="">
                                                <h6 class="staff_dtls">Staff Salaries</h6>
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




                                    <table class="table_stf">
                                        <thead class="table_bg">
                                            <tr>
                                                <th class="th_names">ID</th>
                                                <th class="th_names">Staff Names</th>
                                                <th class="th_names">Salary</th>
                                                <th class="th_names">Account No.</th>

                                                <th class="th_names">Status</th>
                                                <th class="th_names">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr_hover">
                                                <td class="td_id_num">1</td>
                                                <td class="td_id_num">
                                                    <img src="img/profile (3).png" alt="John Smith" class="td_profile_pic">
                                                    John Smith
                                                </td>
                                                <td class="td_id_mob">$5000</td>
                                                <td class="td_id_num">352354262454525</td>

                                                <td class="td_id_num">Pending</td>
                                                <td>
                                                    <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                                    <button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                                <div id="inchargesTable" class="table-container">

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


                                    <table class="table_stf">
                                        <thead class="table_bg">
                                            <tr>
                                                <th class="th_names">ID</th>
                                                <th class="th_names">Incharges Names</th>
                                                <th class="th_names">Phone Number</th>
                                                <th class="th_names">Address</th>
                                                <th class="th_names">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr_hover">
                                                <td class="td_id_num">1</td>
                                                <td class="td_id_num">
                                                    <img src="img/profile (2).png" alt="Jane Doe" class="td_profile_pic">
                                                    Jane Doe
                                                </td>
                                                <td class="td_id_mob">987-654-3210</td>
                                                <td class="td_id_num">456 Main St, City, Country</td>
                                                <td>
                                                    <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                                    <button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                                <div id="otherSalariesTable" class="table-container">
                                    <div class="container">
                                        <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                            <div class="">
                                                <h6 class="staff_dtls">Incharge Salaries</h6>
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




                                    <table class="table_stf">
                                        <thead class="table_bg">
                                            <tr>
                                                <th class="th_names">ID</th>
                                                <th class="th_names">Incharge Names</th>
                                                <th class="th_names"> Salary</th>
                                                <th class="th_names"> Account No.</th>

                                                <th class="th_names">Status</th>
                                                <th class="th_names">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr_hover">
                                                <td class="td_id_num">1</td>
                                                <td class="td_id_num">
                                                    <img src="img/profile (4).png" alt="Emily Davis" class="td_profile_pic">
                                                    Emily Davis
                                                </td>
                                                <td class="td_id_mob">$3000</td>
                                                <td class="td_id_num">76573767365</td>

                                                <td class="td_id_num">pending</td>

                                                <td>
                                                    <button class="edit_icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                                    <button class="dlt_icon"><i class="fa-regular fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>



        </div>


    </div>


    <?php
    include "assets/includes/footer.php";
    ?>
</div>