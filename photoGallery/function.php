<?php
function extension($files)
{
    $valid_extensions = ['jpg', 'jpeg', 'png'];
    $result_arr = [];
    foreach ($files as $file) {
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), $valid_extensions)) {
            $result_arr[] = $file;
        }
    }
    return $result_arr;
}
