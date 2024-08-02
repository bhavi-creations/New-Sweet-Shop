 


<?php
include "../assets/includes/db.php";

$delId = $_GET['id'];
 
$del = mysqli_query($db_con, "UPDATE staff SET status=0 where id='" . $_GET['id'] . "'");

if ($del) {
    echo '<script>alert("Deletd Successfully")</script>';
    echo '<script>window.location.href="../staff.php?active=details"</script>';
} else {
    echo '<script>alert("Failed to Delete")</script>';
}
?>