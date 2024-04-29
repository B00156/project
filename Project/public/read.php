
<?php 

        require "../common.php";      
        require_once '../src/DBconnect.php';

        $result = [];
if (isset($_POST['submit']) && !empty($_POST['author'])) {
    try {

        $sql = "SELECT *   
        FROM products WHERE 'author' = :author  ";

        $location = escape($_POST['author']);

        $statement = $connection->prepare($sql); 
        $statement->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
        $statement->execute(); 
        $result = $statement->fetchAll();
        
        
        } catch(PDOException $error) {     
            echo $sql . "<br>" . $error->getMessage();   
            } 
} 
?> 

<?php include "template/header.php"; ?>

<h2>Find User Based on Name</h2>
<form method="post"> 
    <label for="firstname">Name</label>
    <input type="text" id="firstname" name="firstname">
    <input type="submit" name="submit" value="View Results"> 
</form> 
<a href="index.php">Back to home</a> 

<?php include "template/footer.php";

if (isset($_POST['submit'])) {   
    if ($result && $statement->rowCount() > 0) {  
        ?>     
        <h2>Results</h2>     
        <table>       
            <thead>
            <tr>   
                <th>#</th>   
                <th>First Name</th>   
                <th>Last Name</th>   
                <th>Email Address</th>   
                <th>Age</th>   
                <th>Password</th>
                <th>Date</th> </tr>       
            </thead> 
            <tbody>   
                <?php foreach ($result as $row) { ?>

                    <td><?php echo escape($row["bookname"]); ?></td>
                    <td><?php echo escape($row["author"]); ?></td>
                    <td><?php echo escape($row["genre"]); ?></td>
                    <td><?php echo escape($row["price"]); ?></td>

                </tr>     
                <?php } ?>       
            </tbody>   
        </table>   
        <?php } else { ?>     
            > No results found for <?php echo escape($_POST['author']); ?>.
            <?php } 
        } ?> 





















