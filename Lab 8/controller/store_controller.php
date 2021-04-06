<?php

require $_SERVER['DOCUMENT_ROOT'] . "/model/store_model.php";

function getAllProducts(){
    return retrieveAllProducts();
}