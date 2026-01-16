<?php 

function user_is_connect() 
{
    if(!empty($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function user_is_admin() 
{
    // ...
}

function check_files($file, $format = ['jpg', 'jpeg', 'png', 'gif', 'webp'])
{
    // ...
}

function displayMsg($type = 'error') {
    global $msg;
    $display = '';

    $class = 'alert alert-danger';
    if($type == 'success') {
        $class = 'alert alert-success';
    }

    if(!empty($msg)) {
        $display .= '<div class="' . $class . '">';
        foreach($msg AS $ligne) {
            $display .= $ligne . '<br>';
        }
        $display .= '</div>';
    }
    $msg = [];
    return $display;
}

function selectedStatus($taskStatus, $status) {
    if($taskStatus == $status) {
        return ' selected ';
    }
}