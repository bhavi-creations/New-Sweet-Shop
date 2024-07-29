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
                                <li id="addReport" class="add_staff_list_detils open_table">+ Add Branch</li>
                                <li id="reports" class="staff_list_detils open_table active">Total Branches</li>
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
                                document.getElementById('reportsTable').classList.add('active');
                            </script>
                        </div>

                        <div class="col-md-11 col-lg-9 ul_border">
                            <!-- 
                                <?php
                                include '..\..\db.connection\db_connection.php';

                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    if (isset($_POST['branch_area']) && !empty($_POST['branch_area'])) {
                                        $branch_area = $_POST['branch_area'];

                                        $sql = "INSERT INTO branches (branch_area) VALUES (?)";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("s", $branch_area);

                                        if ($stmt->execute()) {
                                            echo "New branch added successfully";
                                            header("Location: branches.php");
                                            exit();
                                        } else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                        $stmt->close();
                                    } else {
                                        echo "Branch area cannot be empty.";
                                    }
                                }

                                ?> -->

                            <div id="addReportTable" class="table-container">
                                <div class="container">
                                    <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                        <div class="">
                                            <h6 class="staff_dtls">Add Branch</h6>
                                        </div>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 mt-5">
                                                <label class="control-label mb-2 field_txt">Branch Area</label>
                                                <input type="text" class="form-control field_input_bg" name="branch_area">
                                            </div>
                                            <div class="col-md-6 mt-5">
                                                <div class="row last_back_submit d-flex flex-row justify-content-between px-3">
                                                    <button class="back_btn_staff">Back</button>
                                                    <button type="submit" class="submit_btn_staff">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="reportsTable" class="table-container active">
                                <div class="container">
                                    <div class="row d-flex flex-row justify-content-between pt-4 pb-3">
                                        <div class="">
                                            <h6 class="staff_dtls">Total Branches</h6>
                                        </div>
                                    </div>
                                </div>

                                <table class="table_stf">
                                    <thead class="table_bg">
                                        <tr>
                                            <th class="th_names">ID</th>
                                            <th class="th_names">Branch Area</th>
                                            <th class="th_names">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                                $sql = "SELECT id, branch_area FROM branches";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr class='tr_hover'>
                                                            <td class='td_id_num'>" . $row["id"] . "</td>
                                                            <td class='td_id_num'>" . $row["branch_area"] . "</td>
                                                            <td>
                                                                <button class='edit_icon'><i class='fa-regular fa-pen-to-square'></i></button>
                                                                <button class='dlt_icon'><i class='fa-regular fa-trash-can'></i></button>
                                                            </td>
                                                          </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3'>No branches found</td></tr>";
                                                }

                                                $conn->close();
                                                ?> -->
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