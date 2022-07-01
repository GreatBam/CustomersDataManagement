<html>
<head>
    <title>Delete Data</title>
</head>
<body>
<?php
// including database connection file
include_once("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM users WHERE id=?";
$deleteData = $dbConn->insertRow($sql, [$id]);

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
</body>
</html>