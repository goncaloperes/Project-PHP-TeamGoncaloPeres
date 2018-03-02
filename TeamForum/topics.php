<?php require ('core/init.php'); ?>

<?php

//Create Topics Object
$topic = new TheTopic;


//Create User Object
$user = new User;


//Get Category from the URL
$category = isset($_GET['category']) ? $_GET['category'] : null;


//Get User from the URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;


//Get Template & Assign Variables
$template = new Template('templates/topics.php');


//Assign Template Variables
if (isset($category))
{
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts In "'. $topic->getCategory($category)->name.'"';
}


//Check for User Filter
if (isset($user_id))
{
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts By "'. $topic->getUser($user_id)->username.'"';
}


//Assign Variables
if (!isset($category) && (!isset($user_id)))
{
$template->topics          = $topic->getAllTopics();
}

$template->totalTopics     = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers      = $user->getTotalUsers();


//Display Template
echo $template;

