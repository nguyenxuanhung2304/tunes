<?php
$path = realpath(__DIR__);
include_once $path.'/../models/Database.php';
?>

<?php

class UserController
{
    private Database $database;
}
