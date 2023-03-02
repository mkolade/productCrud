<?php
    require_once "../../edit-validate.php";
?>
<?php
    include_once "../../views/partials/header.php"
?>

    <p>
        <a class="go-back" href="index.php">Go Back To Products</a>
    </p>
    <h1>Update Product <b><?php echo $product['title'] ?></b></h1>
   
    <?php include_once "../../views/products/form.php" ?>
</body>
</html>