<?php

if (isset($_POST['uname']) && isset($_POST['pw']) && !empty(trim($_POST['uname'])) && !empty(trim($_POST['pw'])))
{
    $uname = str_replace("\n", "", trim($_POST['uname']));
    $pw = str_replace("\n","",trim($_POST['pw']));

    $whiteList = '/^[a-zA-Z0-9]+$/';
    
    if (preg_match($whiteList, $uname) && preg_match($whiteList, $pw))
    {
        $cookie_const =(rand()%10000) . "=/" . $_POST['uname'] . "/" . $_POST['pw'];
        setcookie("PHPSESSID", base64_encode($cookie_const));
        shell_exec('export USER_' . $cookie_const);
    }
}

if (!isset($_COOKIE['PHPSESSID']) ) 
{
    header('Location: /checkCOOKIE.php');
    exit();
}

require 'function.php';
require 'Router/Router.php';