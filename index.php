<?php
include_once 'config.php';

$rows_per_page = 2;
$query = mysqli_query($connection, "SELECT * FROM Clients");
$rows_num = mysqli_num_rows($query);
$pages_num = ceil($rows_num / $rows_per_page);

if(isset($_GET['page'])){
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

?>

<html>
<head>
    <title>Home Page</title>
</head>
<body>
<a href="add.php">Add client</a>

<?php
 for($i = 1; $i <= $pages_num; $i++){
     if($i != $current_page){
         echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
     } else {
         echo $i;
     }
 }

 $from = $current_page * $rows_per_page - $rows_per_page;
 $to = $current_page * $rows_per_page;

 $query = mysqli_query($connection, "SELECT * FROM clients ORDER BY client_id asc limit $from, $to");

?>

<table>
    <tr>
        <td> client_id</td>
        <td> name </td>
        <td> middle_name </td>
        <td> last_name </td>
        <td> phone_number </td>
        <td> email </td>
        <td> city </td>
        <td> update </td>
        <td> delete </td>
    </tr>
    <?php
    while($client = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" .$client['client_id']."</td>";
        echo "<td>" .$client['name']."</td>";
        echo "<td>" .$client['middle_name']."</td>";
        echo "<td>" .$client['last_name']."</td>";
        echo "<td>" .$client['phone_number']."</td>";
        echo "<td>" .$client['email']."</td>";
        echo "<td>" .$client['city']."</td>";
        echo "<td><a href=\"edit.php?id=$client[client_id]\">Edit</a> </td>";
        echo "<td><a href=\"delete.php?id=$client[client_id]\">Delete</a> </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
