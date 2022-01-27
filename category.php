<?php 
require_once("includes/header.php");

if(!isset($_GET["id"])) {
    ErrorMessage::show("No Id passed into page");
}

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createCategoryPrivewVideo($_GET["id"]);

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showCategory($_GET["id"]);
?>