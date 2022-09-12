<?php
$connect = mysqli_connect("localhost", "root", "", "product");
if(!$connect){
 die('Could not Connect My Sql:' .mysqli_connect());
}

$res = mysqli_query($connect,"SELECT * FROM addproduct");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--link href="styleS.css" rel="stylesheet"-->
  <!--link rel="stylesheet" href="Stylesheet.css"-->
  <!--link rel="stylesheet" href="viewproduct.css"-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rubik&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="quantity.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Box icons -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->

  <!--link rel="stylesheet" href="./css/styles.css" /-->
  <link rel="stylesheet" href="stylev.css" />

  <title>Liyanage Group</title>

  <style>
    



    /* Color Variables */

   
  </style>
</head>

<body>
    
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 ">
        <p class="pt-5 pb-5 text-center">
          <a href="admin-panel.php" class="text-decoration-none"><span class="paneltext">Admin</span></a>
        </p>
        <hr class="bg-light ">
        <p class="pt-2 pb-2 text-center">
          <a href="admin-profile.php" class="text-decoration-none"><span class="paneltext">Profile</span></a>
        </p>
        <hr class="bg-light ">
        <p class="pt-2 pb-2 text-center">
          <a href="categories.php" class="text-decoration-none"><span class="paneltext">Categories</span></a>
        </p>

        <hr class="bg-light ">
        <p class="pt-2 pb-2 text-center">
          <a href="addproduct.php" class="text-decoration-none"><span class="paneltext">Add Products</span></a>
        </p>
        <hr class="bg-light ">
        <p class="pt-2 pb-2 text-center">
          <a href="viewproducts.php" class="text-decoration-none"><span class="paneltext">View Product
              Categories</span></a>
        </p>
        <hr class="bg-light ">
        <p class="pt-2 pb-2 text-center">
          <a href="new-user-requests.php" class="text-decoration-none"><span class="paneltext">New user
              requests</span></a>
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
      <div class="col-sm-10 ">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-8">
            <h1 class="text-center text-light pt-4 pb-5"><strong>View Products</strong></h1>
            <hr class="w-25 mx-auto">
          </div>
        </div>
        <div class="container mamx-auto">
          <!-- Latest Products -->
          <div class="panel-group text-center ">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse1">Categories</a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
                <ul class="list-group">
                  <a href="1veg.php" class="list-group-item">Vegetables</a></li>
                  <a href="1fruit.php" class="list-group-item">Fruits</a></li>
                  <a href="1bev.php" class="list-group-item">Beverages</a></li>
                  <a href="1househ.php" class="list-group-item">Household</a></li>
                  <a href="1meat.php" class="list-group-item">Meat</a></li>
                  <a href="1grocerry.php" class="list-group-item">Grocery</a></li>

                </ul>
                <div class="panel-footer">Add Categories</div>
              </div>
            </div>
          </div>
          <section class="section featured">
<?php

$query = "SELECT * FROM addproduct where category = 'Household'";
$res = mysqli_query($connect,$query);         
while ($row = mysqli_fetch_array($res)) {
  
  ?>
<div class="col-md-3">
            <div class="product-center container ">
              <div class="product-item ">
                <div class="overlay">
                  <a href="" class="product-thumb">
               
            <img src="images\<?= $row['image']?>" class="image-fluid" style="height: 300px width: 300px;" >
                  </a>
                </div>
                <div class="product-info ">
                  <span><?= $row['category']?></span>
                  <h4><?= $row['productname']?></h4>
                 
                  <span><?= $row['description']?></span>
                 <h4>Rs. <?= $row['productprice']?>.00</h4>
                </div>

                <ul class="icons">

                

                  <li><form action="updateproduct.php" method="post">
                   <input type="hidden" name="editid" value="<?php echo $row['id']; ?>">
                 <button type="submit" name="editbtn" ><i class="bx bx-pen" aria-hidden="true"></i> </button>
                                        </form>


                  
                  <li><form action="deleteprod.php" method="POST">
                   <input type="hidden" name="deleteid" value="<?php echo $row['id']; ?>">
                 <button type="submit" name="deletebtn" ><i class="bx bx-trash" aria-hidden="true"></i> </button>
                                        </form>
                
                </ul>

              </div>

            </div>
            </div>
            
          <?php }
          ?>
            <div class="top container ">

              <a href="#" class="view-more">View more</a>

            </div>

          </section>

        </div>

      </div>
    </div>

  </div>











  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>