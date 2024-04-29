<?php
require_once ('../config.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>

<body>

<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <!-- Link to create a new account -->
    <p>New user? <a href="create.php">Create an Account here</a></p>
    <a href="index.php">Back to home</a>

    <?php
    /* Check if login form has been submitted */
    /* isset — Determine if a variable is declared and is different than NULL*/
    if(isset($_POST['Submit'])) {
        try {

            $connection = new PDO($dsn, $username, $password, $options);

            $sql = "SELECT firstname, password from user where firstname = :USER";
            $statement = $connection->prepare($sql);
            $tmpUser = ($_POST['Username']);
            $statement->bindParam(':USER', $tmpUser, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row => $rows) {
                $fname_db = $rows['firstname'];
                $pwd_db = $rows['password'];

                if (($_POST['Username'] == $fname_db) && ($_POST['Password'] == $pwd_db)) {
                    $_SESSION['Username'] = $fname_db;
                    $_SESSION['Active'] = true;
                    header("location:index.php");
                    exit;
                } else {
                    echo 'Incorrect Username or Password';
                }
            }
        } catch
        (Exception $e) {
            echo '<div class="messages-error">Error Logging in:' . $e->getMessage() . '</div>';
        }
    }


    ?>
</div>
</body>
</html>