<?php

if(isset($_GET["error"])){
    if($_GET["error"] == "empty_input"){
        echo "<p>Please, fill all the fields";
    }

    if($_GET["error"] == "invalid_name_information"){
        echo "<p>Please, write your name using letters only starting with a capital letter";
    }

}