<?php
// including database connection file
include_once("config.php");

if(isset($_POST['update'])) {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // checking empty fields
    if(empty($firstname) || empty($lastname) || empty($age) || empty($email) || empty($phone)) {

        if(empty($firstname)) {
            echo "<font color='red'>Firstname field is empty.</font><br/>";
        }

        if (empty($lastname)) {
            echo "<font color='red'>Lastname field is empty.</font><br/>";
        }

        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if (empty($phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }

    } else {

        //updating the table
        $sql = "UPDATE users SET firstname=?, lastname=?, age=?, email=?, phone=? WHERE id=?";
        $editData = $dbConn->insertRow($sql, [$firstname, $lastname, $age, $email, $phone, $id]);

        //redirecting to the display page. In our case, index.php
        header("Location: index.php");
    }
}

?>

<?=template_header('Edit')?>

    <h1>Edit</h1>
    <form name="form1" method="post" action="edit.php?id=<?= $_GET["id"] ?>">
        <table class="table-edit" style="margin-left: 790px;">
            <tr>
                <td>Firstname</td>
                <td><input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td><input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?= $_GET["id"] ?>"></td>
                <td><input style="margin-left: 35px;" class="editbutton" type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <br>

<?=template_footer()?>