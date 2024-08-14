<?php

function showToast($heading, $message, $icon)
{
    echo "<script>swal.fire('$heading','$message','$icon')</script>";
}
