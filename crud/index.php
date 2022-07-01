<?php
//including database connection file
include_once("config.php");

//fetching data in descending order (latest entry first)
$results = $dbConn->getRows("SELECT * FROM users ORDER BY id ASC");

?>

<?=template_header('Index')?>
    
    <table class="datatable" width='80%'>
        <tr style="background-color: #3f69a8;">
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Update</th>
        </tr>
        <?php
        foreach ($results as $row) {
            echo "<tr style='background-color: #E3E3E3;'>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['created']."</td>";
            echo "<td><a href=\"edit.php?id=$row[id]\" class='button'><i class='fas fa-pen'></i></a> | <a href=\"delete.php?id=$row[id]\" class='button' onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fas fa-trash'></i></a></td>";
        }
        ?>
    </table>

<br>
<a href="add.php" class="newbutton">Add New Data</a><br/><br/>

<?=template_footer();