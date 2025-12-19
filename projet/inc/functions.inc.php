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

function add_to_cart()
{

}