<?php
require "../model/authentication.php";


function createUser($email, $password, $name,$phone, $region, $dob, $gender){
    if(registerUser($email, $password, $name, $phone, $region, $dob, $gender)){
        //when registration successful
       return true;
    }else{
        //when registration unsuccessful
        return false;
    }
}

function doesEmailAlreadyExist($email){
    if (checkEmailExists($email)){
        return true;
    }else{
        return false;
    }
}
