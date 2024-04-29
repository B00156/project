<?php require_once 'template/header.php';?>
  
  <body>
    <div>
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
        <h1 class="text-muted">About Page</h1>
      </div>

        <div class="mainarea">
        <h3>Status: You are logged in <?php echo
        $_SESSION['Username'];?> </h3>
            <p class="lead"></p>

            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
        </div>

      <div class="row marketing">
        <div>
          <h4>About page</h4>
          <p>We are a locally run book shop. we have been serving the local community for the last 20 years. We are not just a bookstore, we are a place where book lovers can come together to share their passion for literature. Our shelves are stocked with a carefully curated selection of books that cater to readers of all ages and interests - from the latest bestsellers and literary classics to children’s storybooks and niche genres. </p>

       </div>
          <a href="index.php">Back to home</a>
          <?php require_once 'template/footer.php';?>
