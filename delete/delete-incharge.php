<?php
include "../assets/includes/db.php";

$delId = $_GET['id'];
 
$del = mysqli_query($db_con, "UPDATE incharge SET status=0 where id='" . $_GET['id'] . "'");

if ($del) {
    echo '<script>alert("Deleted Successfully")</script>';
    echo '<script>window.location.href="../staff.php?active=incharges"</script>';
} else {
    echo '<script>alert("Failed to Delete")</script>';
}
?>