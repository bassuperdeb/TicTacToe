<?php
    include_once '../database.class.php';
    $con = new Database;
    $sql = "select * from log";
    $con->prepare($sql);
    $results = $con->fetchObj();
    $total = "";

    foreach($results as $result){
        $total = $total."<a href = 'Log.php?id=".$result->id."'><div style='color:white; border-radius:3rem;border:2px solid white;padding:2rem 4rem;margin:10px 0;cursor:pointer' data-id =".$result->id.">Game ".$result->id."</div></a>";
    }
    echo $total;

?>