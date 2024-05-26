<?php
if (isset($_COOKIE['PHPSESSID']))
{
    header("Location: /");
    exit();
}
require 'Views/testFeature.view.php';
