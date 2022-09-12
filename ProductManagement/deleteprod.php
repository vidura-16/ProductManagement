<?php

$conn = mysqli_connect("localhost", "root", "", "product");
if (isset($_POST['deletebtn'])) {
    $id = $_POST['deleteid'];

    $query = "DELETE  FROM addproduct WHERE  id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header('Location: viewproducts.php');
    } else {
        header('Location: empindex.php');
    }
}
?>