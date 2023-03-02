<?php
    if(!empty($errors)){?>
        <div id="error-msg">
            <?php
                foreach($errors as $error){
                    ?> <h3><?php echo $error; ?></h3> <?php
                }
            ?>
        </div><?php
    }
?>   
<form id="product-form" action="" method="post" enctype="multipart/form-data">
    <?php
        if(isset($product['image'])){
            ?><img class="update-img" src="<?php echo $product['image'];?>" alt=""><?php
        }
    ?>
    <div id="form-part">
        <label for="">Product Image</label><br>
        <input type="file" name="image">
    </div>

    <div id="form-part"> 
        <label for="">Product Title</label><br>
        <input type="text" name="title" value="<?php echo $title ?>">
    </div>

    <div id="form-part">
        <label for="">Product Description</label><br>
        <textarea name="description"><?php echo $description ?></textarea>
    </div>

    <div id="form-part">
        <label for="">Product Price</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo $price ?>">
    </div>
    <button type="submit">submit</button>
</form>