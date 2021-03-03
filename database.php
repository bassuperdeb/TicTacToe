<?php ob_start(); ?>
<?php session_start(); ?>

<?php

 include_once './database.class.php';

    if(isset($_POST['submit']) && isset($_POST['play'])  &&  $_POST['status'] == "1"){
    //echo 'hello';
    $con = new Database;
    if($con->insertLog($_POST['play'],$_POST['size'],$_POST['winner'])){
        header('location:./game.php');
    }
    }


?>