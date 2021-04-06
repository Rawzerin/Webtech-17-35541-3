<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_connect.php';


function searchPlayersByRegion($region){
    $conn = db_conn();
    $query = "select id ,name, imgUrl from player where region='$region'";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $rows;
    }catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}