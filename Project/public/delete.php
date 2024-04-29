<?php
include "template/header.php";
if (isset($_GET["id"])) {   
    try {     
        require_once '../src/DBconnect.php';      
        $id = $_GET["id"];      
        $sql = "DELETE FROM user WHERE id = :id";
        $statement = $connection->prepare($sql);     
        $statement->bindValue(':id', $id);     
        $statement->execute();      
        $success = "User ". $id. " successfully deleted";
    } catch(PDOException $error) {     
        echo $sql . "<br>" . $error->getMessage();   
    } 
}  

try {   
    require "../common.php";   
    require_once '../src/DBconnect.php';     
    
    $sql = "SELECT * FROM user";
    
    $statement = $connection->prepare($sql);   
    $statement->execute();    
    
    $result = $statement->fetchAll();  

    
    } catch(PDOException $error) {   
        echo $sql . "<br>" . $error->getMessage(); 
        
        } 
        
?> 

<h2>Update Users</h2>
<table>   
    <thead>     
        <tr>       

            <th>First Name</th>       
            <th>Last Name</th>       
            <th>Email Address</th>       
            <th>Age</th>       
            <th>Password</th>
            <th>Delete</th>   
        </tr>   
    </thead>   
    <tbody>   
        <?php foreach ($result as $row) : ?>     
            <tr>       

                <td><?php echo $row["firstname"]; ?></td>       
                <td><?php echo $row["lastname"]; ?></td>       
                <td><?php echo $row["email"]; ?></td>       
                <td><?php echo $row["age"]; ?></td>       
                <td><?php echo $row["password"]; ?></td>
                <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>   
            </tr>   
            <?php endforeach; ?>   
        </tbody> 
    </table>  
    
    <a href="index.php">Back to home</a> 