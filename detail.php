<?php

require_once('header.php');
require_once('connect.php');
$a = $_GET['id'];
$sql = "SELECT  *  FROM `product` Where `pid` =  '$a' ";
$c = new Connect;
$dblink = $c->connectToMySQL();
$re = $dblink->query($sql);
$row = $re->fetch_assoc()

?>
    <div class="container">
        <div class="row justify-content-center">
            

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <a href="#">
                            <img img src="./images/<?= $row['pimage'] ?>" class="card-img-top" alt="product.title" />
                        </a>

                        <div class="label-top shadow-sm">
                            <a class="text-white" href="#"></a>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <span class="float-start badge rounded-pill bg-success">&#36; <?= $row['pprice']?></span>

                                <span class="float-end"><a href="#" class="small text-muted text-uppercase aff-link"><?=$row['pcatid']?></a></span>
                            </div>
                            <h5 class="card-title">
                                <a target="_blank" href="detail.php?id =<?=$row['pid']?>"><?=$row ['pname']?></a> 
                            </h5>

                            <div class="d-grid gap-2 my-4">
                                    <div><?=$row['pinfo']?></div>
                                <a href="cart.php?id=<?=$row['pid']?>" class="btn btn-warning bold-btn">add to cart</a>

                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <a type="button" href="index.php"  class="btn btn-warning bold-btn"> >Continue shopping <</a>
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
                
            
        </div>
    </div>
<?php


?>
