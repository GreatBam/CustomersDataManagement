<?php
//including database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // checking empty fields
    if(empty($firstname) || empty($lastname) || empty($age) || empty($email) || empty($phone)) {

        if(empty($firstname)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
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
        // if all the fields are filled (not empty)

        $sql = "INSERT INTO users(firstname, lastname, age, email, phone) VALUES(?, ?, ?, ?, ?)";
        $newData = $dbConn->insertRow($sql, [$firstname, $lastname, $age, $email, $phone]);

        //redirecting to the display page. In our case, index.php
        header('Location: index.php');
    }
}
?>

<?=template_header('Add')?>

    <h1>Create new entry</h1>
    <form action="add.php" method="post" name="fomr1">
        <table class="table-add" style="margin-left: 655px;" width="25%">
            <tr>
                <td>Firstname</td>
                <td><input type="text" name="firstname" placeholder="John"></td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td><input type="text" name="lastname", placeholder="Smith"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" placeholder="exemple@test.com"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" placeholder="077 123 45 67"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add" class="addbutton"></td>
            </tr>
        </table>
    </form>

<?=template_footer()?>