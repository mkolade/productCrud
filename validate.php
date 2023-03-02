<?php

require_once "db.php";

$errors = [];
$title = '';
$description = '';
$price = '';
$date = '';
    

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        ?>
        <?php include_once "views/products/var-validation.php" ?>
        <?php
        if(empty($errors)){
            //image validation
            
            ?>
            <?php include_once "views/products/img-validation.php" ?>
            <?php

            //prepare method
            
            $statement = $pdo->prepare("INSERT INTO products (title, image, description, price,create_date) 
            VALUES (:title,:image,:description,:price,:date)
            ");
            
            $statement ->bindValue(':title',$title);
            $statement ->bindValue(':image',$imagepath);
            $statement ->bindValue(':description',$description);
            $statement ->bindValue(':price',$price);
            $statement ->bindValue(':date',$date);
            $statement->execute();
            header('location: index.php');
        }
}

?>