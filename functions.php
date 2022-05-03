<?php

function isEmptyClientInput($name, $middle_name, $last_name, $phone_number, $email, $city){
    if(empty($name) || empty($middle_name) || empty($last_name) || empty($city) || empty($email) || empty($phone_number)){
        return true;
    } else {
        return false;
    }
}

function invalidLetters($word){
    if(!preg_match("/^[A-Z][a-z]{1,20}$/", $word)){
        return true;
    } else {
        return false;
    }
}