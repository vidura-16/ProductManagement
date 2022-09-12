<?php

$conn = mysqli_connect("localhost", "root", "", "product");

if (isset($_POST['updatebtn'])) {
    $editid = $_POST['updateid'];
    $editproductname  = $_POST['productname'];
    $editbrandname    = $_POST['brandname'];
    $editproductprice = $_POST['productprice'];
    $editquantity     = $_POST['quantity'];
    $editdescription  = $_POST['description'];
    $editcategory     = $_POST['category'];
    $image = $_FILES["image"]['name'];

    $query = "UPDATE addproduct SET productname='$editproductname', brandname='$editbrandname', 
    productprice='  $editproductprice ', quantity=' $editquantity ', description=' $editdescription ', 
    category='$editcategory ', image='$image'  WHERE id='$editid' ";

    $query_run = mysqli_query($conn, $query);
    
    if (!$query_run) {
        echo $conn->error;
        exit;
    } else {
        if ($query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
    
            header('Location: viewproducts.php');
        } else {
           
            header('Location: viewproducts.php');
        }
    }
}
?>