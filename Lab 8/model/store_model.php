<?php
require $_SERVER['DOCUMENT_ROOT'] . '/model/db_connect.php';

function retrieveAllProducts(){
    $conn = db_conn();
    $query = "select * from product";
    try {
        $result = $conn->query($query);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $rows;
    }catch (PDOException $e){
        echo $e->getMessage();
        $conn = null;
        return null;
    }
}