<?php include "template/header.php"; ?>
<title>Home page</title>



<body>

    <div class="">
      <div class="header clearfix">
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contacts.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
              <li><a href="create.php">Add User</a></li>
              <li><a href="delete.php">Delete Account</a></li>
              <li><a href="update.php">Products</a></li>


          </ul>
        </nav>
        <h1>Home Page</h1>
      </div>

        <div class="mainarea">
        <h3>Status: You are logged in <?php echo
             $_SESSION['Username'];?> </h3>
            <p class="lead"></p>

            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
        </div>
</body>





<?php include "template/footer.php"; ?> 




































