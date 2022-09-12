<?php

$conn = mysqli_connect("localhost", "root", "", "product");

if (isset($_POST['btnSubmit'])) 
{
  $productname  = $_POST['productname'];
  $brandname    = $_POST['brandname'];
  $productprice = $_POST['productprice'];
  $quantity     = $_POST['quantity'];
  $description  = $_POST['description'];
  $category     = $_POST['category'];
  $image = $_FILES["image"]['name'];

   

  $INSERT = "INSERT into addproduct (id,productname, brandname, productprice, quantity, description, category, image)values (NULL,'$productname', '$brandname', '$productprice', '$quantity',  '$description','$category','$image')"; 
  $insert_run = mysqli_query($conn, $INSERT);
  if ($insert_run) 
  {   
    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
  
    echo "reg success";
    
    header('Location: addproduct.php');
    
  } else 
  {
    echo "unseccess";
    echo $conn->error;
    exit;
  }
  
  //if (isset($_POST['btnSubmit'])) {
}
?>
