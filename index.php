<?php
require_once('header.php');
require_once('connect.php');
$sql = "SELECT  *  FROM `product` ORDER BY `pdate` LIMIT 3 ";   // ve sua lai 
$c = new Connect;
$dblink = $c->connectToMySQL();
$re = $dblink->query($sql);

if ($re->num_rows > 0) {
?>

<style>
    .abc{
    color: pink;
    
}
</style>
<main style="background-image: url('./images/background.jpg');">

  <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" > -->
    <div class="col-md-5 p-lg-5 mx-auto my-5 abc">
      <h1 class="display-4 fw-normal">Welcome to my website </h1>
      <p class="lead fw-normal">Welcome to our online jewelry store! Here, you will find a collection of beautiful and unique jewelry pieces that are perfect for any occasion.
         Whether you're looking for a timeless and elegant piece for a special occasion or a fun and trendy accessory to spice up your everyday look,
          we've got you covered. Our carefully curated selection includes everything from classic diamond stud earrings and delicate necklaces to statement rings and bold bracelets.
           We use only the highest quality materials and work with skilled artisans to create pieces that are not only beautiful but also durable and long-lasting. 
           Browse our collection today and find the perfect piece to complement your style.</p>
      <a class="btn btn-outline-secondary btn btn-dark btn-lg " href="#1" >New Product</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  <!-- </div> -->

  
</main>

    <div class="container">
        <div class="row justify-content-center">

            <?php

            while ($row = $re->fetch_assoc()) {
            ?>

                <div class="col-md-4">
                    
                    <div class="card h-100 shadow-sm">
                        <div
              class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong "
              style="width: 50px; height: 50px;">
              <p class="text-white mb-0 small">new</p>
                </div>
                        <a href="#">
                            <img src="./images/<?= $row['pimage'] ?>" class="img-fluid" alt="Generic placeholder image">  
                        </a>
                        <!-- thẻ alt để cung cấp sự thay thế bằng văn bản cho các công cụ tìm kiếm.-->
                        <!-- img-fluid đừng mở rộng hình ảnh lớn hơn kích thước gốc của ảnh bằng cách sử dụng max-width,
                         và thu nhỏ hình ảnh lại nếu cửa sổ trình duyệt hẹp hơn độ rộng của ảnh (tính theo pixel). -->
                        
                        <div class="card-body">
                            <div class="clearfix mb-3" >
                                <span class="float-start badge rounded-pill bg-success">&#36; <?= $row['pprice'] ?></span>

                                <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link"><?= $row['pcatid'] ?></a></span>
                            </div>
                            <h5 id="1" class="card-title" >
                                <a target="_blank" href="detail.php?id=<?=$row['pid'] ?>"><?= $row['pname'] ?></a>
                            </h5>

                            <div class="d-grid gap-2 my-4">

                                <a href="cart.php?id= <?= $row['pid'] ?>" class="btn btn-warning bold-btn">add to cart</a>

                            </div>
                            <div class="clearfix mb-1">

                                <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

                                <span class="float-end">
                                    <i class="far fa-heart" style="cursor: pointer"></i>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            }

            ?>

        </div>
        <div class="d-flex center-content-end " >
            <a href="./allproduct.php" class="btn btn-warning bold-btn" >
                View All Products
            </a>
        </div>

    </div>
<?php

} else
    echo " not found";

?>