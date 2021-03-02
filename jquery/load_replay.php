<?php
    include_once '../database.class.php';
    $con = new Database;
    $sql = "select * from log where id = :id";
    $con->prepare($sql);
    $con->bind(':id',$_POST['id'],'int');
    $results = $con->fetchObj();
    echo json_encode($results);