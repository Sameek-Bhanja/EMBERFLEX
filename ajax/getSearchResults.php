<?php 
require_once("../includes/config.php");

if(isset($_POST["term"]) && isset($_POST["username"])) {
    echo "hello" . $_POST["term"];
}
else {
    echo "No term or username passed into file";
}
?>  