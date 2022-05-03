<?php
include_once 'config.php';
include_once 'base.php';
include_once 'functions.php';


if(isset($_POST['update'])){
    $name = $_POST['name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $client_id = $_POST['client_id'];

    if(isEmptyClientInput($name, $middle_name, $last_name, $phone_number, $email, $city)){
        header("Location: edit.php?id=$client_id&error=empty_input");
        exit();
    }

    $query = mysqli_query($connection, "UPDATE clients SET name='$name', middle_name='$middle_name', 
                   last_name='$last_name', phone_number='$phone_number', email='$email', city='$city' WHERE client_id=$client_id");

    header("Location: index.php");
    exit();
}




$client_id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM clients WHERE client_id=$client_id");
$client = mysqli_fetch_array($query);

$name = $client['name'];
$middle_name = $client['middle_name'];
$last_name = $client['last_name'];
$phone_number = $client['phone_number'];
$email = $client['email'];
$city = $client['city'];

?>

<html>
<head>
    <title> Edit client information </title>


</head>
<body>
    <a href="index.php">Back to main</a><br/><br/>

    <form method="POST" action="edit.php" name="edit_form">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Middle name</td>
                <td><input type="text" name="middle name" value="<?php echo $middle_name; ?>"></td>
            </tr>
            <tr>
                <td>Last name</td>
                <td><input type="text" name="last name" value="<?php echo $last_name; ?>"></td>
            </tr>
            <tr>
                <td>Phone number</td>
                <td><input type="text" name="phone number" value="<?php echo $phone_number; ?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input type="text" name="city" value="<?php echo $city; ?>"></td>
            </tr>
            <tr>
                <td> <input type="hidden" name="client_id" value=<?php echo $client_id; ?>></td>
                <td> <input type="submit" name="update" value="update"></td>
            </tr>
        </table>

    </form>


</body>
</html>
