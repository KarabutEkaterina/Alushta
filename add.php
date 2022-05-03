<?php
include_once 'config.php';
include_once 'functions.php';
include_once 'base.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    if(isEmptyClientInput($name, $middle_name, $last_name, $phone_number, $email, $city)){
        header("Location: add.php?error=empty_input");
        exit();
    }

    if(invalidLetters($name) || invalidLetters($middle_name) || invalidLetters($last_name) || invalidLetters($city)){
        header("Location: add.php?error=invalid_name_information");
        exit();
    }

    $query = mysqli_query($connection, "INSERT INTO clients(name, middle_name, last_name, phone_number, email,
                    city) VALUES('$name', '$middle_name', '$last_name', '$phone_number', '$email', '$city')");
    header("Location: index.php");
    exit();
}
?>

<html>
<head>
    <title> Edit client information </title>


</head>
<body>
    <a href="index.php">Back to main</a><br/><br/>

    <form method="POST" action="add.php" name="add_form">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Middle name</td>
                <td><input type="text" name="middle name"></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="last name"></td>
            </tr>
            <tr>
                <td>Phone number</td>
                <td><input type="text" name="phone number"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td> <input type="hidden" name="client_id"></td>
                <td> <input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>

    </form>


</body>
</html>

