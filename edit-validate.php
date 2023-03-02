<?php

    require_once "db.php";
    $id = $_GET['id'] ?? null;
    if(!isset($id)){
        header('location:index.php');
        exit;  
    }
    $statement = $pdo->prepare('SELECT *FROM products WHERE id =:id');
    $statement->bindValue(':id',$id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    $errors = [];
    $title = $product['title'];
    $description = $product['description'];
    $price = $product['price'];
    

    

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
            $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id") ;
            
            $statement ->bindValue(':title',$title);
            $statement ->bindValue(':image',$imagepath);
            $statement ->bindValue(':description',$description);
            $statement ->bindValue(':price',$price);
            $statement ->bindValue(':id',$id);
            $statement->execute();
            header('location: index.php');
        }
    }


?>