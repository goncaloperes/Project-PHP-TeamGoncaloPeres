<?php include('core/init.php'); ?>

<?php

if(isset($_POST['do_login'])) //If someone clicks the Submit button
{
    //Get Variabless
    $username = $_POST['username'];
    $password = md5($_POST['password']); ///The md5 is important because we stored the pw in the DB with md5

    //Create User Object
    $user = new User;

    if($user->login($username, $password))
    {
        redirect('index.php','You have been logged in','success');
    }
    else
    {
        redirect('index.php','That login is not valid','error');
    }
}
else
{
    redirect('index.php');
}