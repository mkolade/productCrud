<?php
     $title = $_POST['title'];
     $description = $_POST['description'];
     $price = $_POST['price'];
     $date = date('Y-m-d H:i:s');


     if(!$title){
         $errors[]='Product Title Is Required';
     }

     if(!$price){
         $errors[]='Product Price Is Required';
     }

     if(!$description){
         $errors[]='Product Description Is Required';
     }
     
     

     //To create directory 'images'
     if(!is_dir('images')){
         mkdir('images');
     }
?>