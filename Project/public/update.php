<?php  
/**   
 * 
 * 
 * * List all users with a link to edit   
 * 
 * 
 * */  

try {   
    require "../common.php";   
    require_once '../src/DBconnect.php';     
    
    $sql = "SELECT * FROM products";
    
    $statement = $connection->prepare($sql);   
    $statement->execute();    
    
    $result = $statement->fetchAll();  

    
    } catch(PDOException $error) {   
        echo $sql . "<br>" . $error->getMessage(); 
        
        } 
        
?> 

<h2>Book List</h2>
<table>   
    <thead>     
        <tr>       
            <th>Book</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Price</th>
        </tr>
    </thead>   
    <tbody>   
        <?php foreach ($result as $row) : ?>     
            <tr>       
                <td><?php echo $row["bookname"]; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td><?php echo $row["genre"]; ?></td>
                <td><?php echo $row["price"]; ?></td>


                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                    <input type="hidden" name="quantity" value="1">
                </form>
            </tr>   
            <?php endforeach; ?>   
        </tbody> 
    </table>  
    
    <a href="index.php">Back to home</a> 