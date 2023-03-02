<?php

    require_once "../../db.php";

    $search = $_GET['search'] ?? '';
    if(isset($search)){
        $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title  ORDER BY create_date DESC');
        $statement->bindValue(':title',"%$search%");
    }
    else{
        $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
    }
   
    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
    include_once "../../views/partials/header.php"
?>
    <h1>Product CRUD</h1>
    <h2>
        <a href="create.php" id="create">Create Product</a>
    </h2>
    <form action="">
        <div id="search-sec">
            <input type="text" placeholder="Search for products" name="search" value="<?php echo $search; ?>">
            <button type="submit">Search</button>
        </div>
    </form>
    <table id="table" align="center" border="1 ">
        <tr id="main">
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>Create date</th>
            <th>Actions</th>
        </tr>
        <?php foreach($products as $i => $product){ ?>
            <tr>
                <td><?php echo $i+1 ?></td>
                <td><img id="table-img" src="<?php echo $product['image'] ?>" alt=""></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['create_date'] ?></td>
                <td>
                <a href="edit.php?id=<?php echo $product['id']?>" id="edit"  >Edit</a>
                <form style="display:  inline-block" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id']?>">
                    <button type="submit" id="delete">Delete</button>
                </form>
                </td>
            </tr>

        <?php }?>
        
    </table>
    
</body>
</html>