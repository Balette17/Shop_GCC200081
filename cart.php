<?php
include_once("header.php");
include_once("connect.php");
$c = new Connect;
$dblink = $c->connectToPDO();
if(isset($_COOKIE['cc_usrname'])){
    $temp = $_COOKIE['cc_usrId'];
if (isset($_GET['id'])) { // neu nguoi dung mua thi gui id ve, neu chi xem thi khong gui id ve
    $pid = $_GET['id'];
    $findSql = "SELECT `cproid` FROM `cart` WHERE `cproid` = ? and `cuserid` = ?";
    $re = $dblink->prepare($findSql); // prepare check dang du lieu nhap co dung hay ko

    $valueArray = [$pid, $temp]; // -> push gia tri vao dau ? o value
    $stmt = $re->execute($valueArray); // thuc hien qua php admin roi gui lai ve
    if ($re->rowCount() == 0) {
        $sql = "INSERT INTO `cart`(`cuserid`, `cproid`, `cquantity`, `cdate`) VALUES (?,?,1,CURDATE())";
    } else {
        $sql = "UPDATE `cart` SET `cquantity`=`cquantity` +1 ,`cdate`= CURDATE() WHERE  `cuserid`= ?and`cproid`=?";
    }

    $re1 = $dblink->prepare($sql); // prepare check dang du lieu nhap co dung hay ko
    $valueArray1 = [$temp, $pid]; // -> push gia tri vao dau ? o value
    $stmt = $re1->execute($valueArray1); // thuc hien qua php admin roi gui lai ve
}}else{
    header("location: login.php");
}


$showCartSQL = "SELECT `pimage`, `pname`, `cquantity`, `pprice` FROM `cart`c, `product` p WHERE 
c.cproid = p.pid and `cuserid` = ?";
$re1 = $dblink->prepare($showCartSQL);
$valueArray1 = [$temp];
$stmt = $re1->execute($valueArray1);

$rows = $re1->fetchAll(PDO::FETCH_BOTH);
// 

?>
<section class="d-flex vh-100" style="background-color: #fdccbc;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <p><span class="h2">Shopping Cart </span><span class="h4">(<?= $re1->rowCount() ?> item in your cart)</span></p>

                <div class=" card mb-4">
                    <div class="card-body p-4">
                    <div class="row align-items-center">
                            <div class="col-md-2">
                                
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Name</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Quantity</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Price</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Total</p>
                                </div>
                            </div>
                        </div>
                <?php
                $SUM = 0 ;
                foreach ($rows as $row) {
                ?>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="./images/<?= $row['pimage'] ?>" class="img-fluid" alt="Generic placeholder image">
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>
                                <p class="lead fw-normal mb-0"><?= $row['pname'] ?></p>
                            </div>
                        </div>
                    
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>

                                <p class="lead fw-normal mb-0"><?= $row['cquantity'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>

                                <p class="lead fw-normal mb-0"><?= $row['pprice'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <div>

                                <p class="lead fw-normal mb-0   "><?=$row['pprice'] * $row['cquantity']?></p>
                                <?php
                                    $SUM+=$row['pprice'] * $row['cquantity'];
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                 ?>
                    </div>
            </div>
        </div>


        <div class="card mb-5">
            <div class="card-body p-4">

                <div class="float-end">
                    <p class="mb-0 me-5 d-flex align-items-center">
                        <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal"><?=$SUM?></span>
                    </p>
                </div>

            </div>
        </div>

    <div class="d-flex justify-content-end">
        <a type="button" href="index.php"  class="btn btn-primary btn-lg" >Continue shopping</a>
    </div>


    </div>
    </div>
    </div>
</section>