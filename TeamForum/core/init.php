<?php

//Start Session
session_start();


//Include Configuration
require_once ('config/config.php');


//Include Helper Function Files
require_once ('helpers/system_helper.php');
require_once ('helpers/format_helper.php');
require_once ('helpers/db_helper.php');


//Autoload Classes
function __autoload($class_name) //This let us create any class that we want in our libraries and as long as the file name matches the class name, we don't have to require our classes.
{
    require_once('libraries/' . $class_name . '.php');
}