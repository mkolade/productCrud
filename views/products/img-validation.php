<?php
$image = $_FILES['image'] ?? null;
$randomName = time(); 
$imagepath =$product['image'];
if(isset($image) && is_uploaded_file($image['tmp_name'])){
    if(isset($product['image'])){
        unlink($product['image']);
    }
    $imagepath = 'images/'.$randomName.$image['name'];

    $allowed_photo_extension = array("jpg","jpeg","png");

    $file_information = pathinfo($image['name']);
    if(in_array(strtolower($file_information['extension']),$allowed_photo_extension))
    {
        move_uploaded_file($image['tmp_name'],$imagepath);
    }else
    {
    header("location:create.php?message=Please upload a valid image");
    }
}
?>