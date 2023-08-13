<?php
require_once('header.php');
require_once('connect.php');
$sql = "SELECT  *  FROM `product`";
$c = new Connect;
$dblink = $c->connectToMySQL();
$re = $dblink->query($sql);

if ($re->num_rows > 0) {
?>
    <div class="container">
        <div class="row justify-content-center">
            <?php

            while ($row = $re->fetch_assoc()) {
            ?>
        
                <div class="col-md-4">
                <div class="card product h-100 shadow-sm">
                        <div class="text-white mb-0 small">
                            <a href="#">
                                <img img src="./images/<?= $row['pimage'] ?>" class="img-fluid" alt="product.title" />
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <span class="float-start badge rounded-pill bg-success">&#36; <?= $row['pprice']?></span>

                                <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link"><?= $row['pcatid']?></a></span>
                            </div>
                            <h5 class="card-title">
                                <a target="_blank" href="detail.php?id = <?=$row['pid']?>"><?=$row ['pname']?></a> 
                            </h5>

                            <div class="d-grid gap-2 my-4">

                                <a href="cart.php?id=<?=$row['pid']?>" class="btn btn-warning bold-btn">add to cart</a>

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
    </div>
<?php

} else
    echo " not found";

?>

<style>
    .container{
        padding-top: 50px;
    }
    .col-md-4{
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>