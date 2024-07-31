<?php
include "assets/includes/db.php";

$delId = $_GET['id'];

////////////////// Soft Delete;///////////////

$del = mysqli_query($db_con, "UPDATE staff SET status=0 where id='" . $_GET['id'] . "'");

if ($del) {


    echo '<script>alert("Deleted Successfully")</script>';
    echo '<script>window.location.href="staff.php"</script>';
} else {
    echo '<script>alert("Failed to Delete")</script>';
}
