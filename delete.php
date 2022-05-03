<?php
include_once "config.php";

$client_id = $_GET['id'];

$query = mysqli_query($connection, "DELETE FROM clients WHERE client_id=$client_id");
header("Location: index.php");
exit();
?>