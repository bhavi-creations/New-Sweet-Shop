<?php

function ValidateImage($path, $imgName)
{
    // echo '<script>alert("' . $path . '")</script>';
    // echo '<script>alert("' . $imgName . '")</script>';

    $allwoedExtentions = ['jpg', 'jpeg', 'png',];

    $imageFileType = strtolower(pathinfo($imgName['name'], PATHINFO_EXTENSION));

    if (in_array($imageFileType, $allwoedExtentions)) {
        $imgRename = date('Ymdhis') . rand(0, 1000000) . '.' . $imageFileType;
        if (move_uploaded_file($imgName['tmp_name'], $path . $imgRename)) {
            return $imgRename;
        } else {
            return false;
        }
    } else {
        return false;
    }
}