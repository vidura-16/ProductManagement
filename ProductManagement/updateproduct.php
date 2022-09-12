<?php
require_once('updatep.php');
session_start();

$conn = mysqli_connect("localhost", "root", "", "product");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body {

            font-family: 'Roboto', sans-serif;
        }

        .text-font {
            font-size: 35px;
            font-weight: bolder;
        }

        .container-fluid {
            background-color: #ffffff;
        }

        .paneltext {
            color: #2baf63;
        }

        .headertxt {
            margin-top: 5%;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #2baf63;
        }

        .height {
            height: 100vh;
        }

        .error {
            color: red;
            font-size: large;
        }

        .success {
            color: green;
            font-size: large;
        }

        .error1 {
            color: red;
            font-size: large;
        }

        .success1 {
            color: green;
            font-size: large;
        }

        .error2 {
            color: red;
            font-size: large;
        }

        .success2 {
            color: green;
            font-size: large;
        }

        .hide {
            display: none;
        }

        select {
            -webkit-appearance: none;
        }

        select>option {
            text-align: center;
        }

        #categories2 {
            background-color: #2baf63;
            color: white;
            border: none;
            align-items: center;
        }

        .textinstr {
            color: #2baf63;
        }

        .col-sm-10 {
            background:
                linear-gradient(rgba(0, 0, 0, 0.7),
                    rgba(0, 0, 0, 0.7)), url(images/bg2.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 height ">
                <p class="pt-5 pb-5 text-center">
                    <a href="admin-panel.php" class="text-decoration-none"><span class="paneltext">Admin</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="admin-profile.php" class="text-decoration-none"><span class="paneltext">Profile</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="viewproducts.php" class="text-decoration-none"><span class="paneltext">View Product categories</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="addproducts.php" class="text-decoration-none"><span class="paneltext">Add Products</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="view-users.php" class="text-decoration-none"><span class="paneltext">View user</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="display-orders.php" class="text-decoration-none"><span class="paneltext">View Orders</span></a>
                </p>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-2">
                        <p class="text-center pt-5">
                            <mg class="rounded" src="" width="150px" height="140px">
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-center headertxt"><strong>Update Products</strong></h1>
                        <hr class="w-25 mx-auto">
                    </div>
                    <div class="col-sm-2">
                        <p class="pt-5 text-center">

                        </p>
                    </div>
                </div>


                <?php

                if (isset($_POST['editbtn'])) {
                    $id = $_POST['editid'];

                    $query = "SELECT * FROM addproduct where id = '$id'";
                    $res = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($res)) {

                ?>
                        <div class="container mx-auto">
                            <form action="updatep.php" id="the-form" class="form-control w-50 mx-auto" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                                <label class="pt-4 pb-2 text-center">Enter product name</label>
                                <input type="text" name="productname" class="form-control" placeholder="Enter Product name" required value="<?php echo $row['productname'] ?>">

                                <label class=" pt-4 pb-2 text-center">Enter brand name</label>
                                <input type="text" name="brandname" class="form-control" placeholder="Enter Brand name" required value="<?php echo $row['brandname'] ?>">

                                <label class="pt-4 pb-2 text-center">Enter product price</label>
                                <input type="text" name="productprice" class="form-control" placeholder="Enter Product price" required value="<?php echo $row['productprice'] ?>">

                                <label class="pt-4 pb-2 text-center">Enter quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Product quantity" required value="<?php echo $row['quantity'] ?>">

                                <label class="pt-4 pb-2 text-center">Enter description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Product description" required value="<?php echo $row['description'] ?>">

                                <label class="pt-4 pb-2 text-center" id="category" name="category" required placeholder="category" <?php if ($row['id'] == $row['category']) { ?> selected="selected" <?php } ?> value="<?php echo $row['id']; ?>">
                                    Choose your category
                                </label>
                                
                                <select class="form-control" id="category" name="category">
                                    <option><?php echo $row['category']; ?></option>
                                    
                                    <option value="Vegetables">Vegetables</option>
                                    <option value="Fruits">Fruits</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Household">Household</option>
                                    <option value="Meat">Meat</option>
                                    <option value="Grocery">Grocery</option>
                                </select>
                                <br>
                                <p class="textinstr "><strong>Upload product images</strong></p>
                                <img src="images/<?php echo $row['image'] ?>" style="width:300px; height:300px;">
                                <input type="file" name="image" class="form-control" multiple required value="<?php echo $row['image'] ?>">
                                <p>
                                </p><br>
                                <!---div class="container w-25 mx-auto"--->
                                <!----div class="hide"><img class="mx-auto" style="height: 50px; width: 50px;"src="/test123/products-images/ajax-loader.gif"></div---->
                                <!--/div--->
                                <br>

                                <input type="hidden" name="updateid" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="updatebtn" class="btn btn-primary form-control" onclick="myFunction()">Update product</button>


                                <script>
                                    function myFunction() {
                                        alert("ITEM UPDATED");
                                    }
                                </script>
                                <br><br>
                                <div class="error"></div>
                                <div class="success"></div>
                            </form>
                    <?php }
                }
                    ?>
                    <br><br>
                        </div>
            </div>
        </div>
    </div>
</body>

</html>