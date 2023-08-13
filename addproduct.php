<?php
require_once('header.php');
require_once('connect.php');
if (isset($_POST['btnAdd'])) {
    $pname = $_POST['pname']; // lay gia tri
    $pprice = $_POST['pprice'];
    $pinfo = $_POST['pinfo'];
    $pdate = $_POST['pdate'];
    $pquan = $_POST['pquan'];
    // $pimange = $_POST['pimange'];
    $pcatid = $_POST['pcatid'];

$imgname = str_replace(' ', '-',$_FILES['pimage']['name']); // replace dau ' ' thanh '-'
$flag = move_uploaded_file($_FILES['pimage']['tmp_name'], './images/'.$imgname); // copy hinh de vao file images
if($flag)
{
  $sql = "INSERT INTO `product`( `pname`, `pprice`, `pinfo`, `pimage`, `pquan`, `pcatid`, `pdate`) VALUES(?,?,?,?,?,?,?)";

    $c = new Connect;
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql); // prepare check dang du lieu nhap co dung hay ko
    $valueArray = ["$pname", "$pprice", "$pinfo","$imgname","$pquan","$pcatid","$pdate"]; // -> push gia tri vao dau ? o value
    $stmt = $re->execute($valueArray); // thuc hien qua php admin roi gui lai ve
    if ($stmt) echo "Done!";

}else{
    echo "image is copied failed";
}

  
}
?>

<div class="container">
    <h2> Add product</h2>
    <form action="" name="formReg" method="POST" 
    enctype="multipart/form-data"> <!-- ho tro da phuong tien multipart/form-data -->
        <div class="row mb-3">
            <label for="" class="col-lg-4">Product name:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="pname">
                <br>
            </div>
        </div> 
        <!--  -->

        <div class="row mb-3">
            <label for="" class="col-lg-4">Price:</label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="pprice">
                <br>
            </div>
        </div>
        <!--  -->
        <div class="row mb-3">
            <label for="" class="col-lg-4">Description:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="pinfo">
                <br>
            </div>
        </div>
        <!--  -->

        <div class="row mb-3">
            <label for="" class="col-lg-4">Date:</label>
            <div class="col-lg-8">
                <input type="date" class="form-control" name="pdate">
                <br>
            </div>
        </div>
        <!--  -->
        <div class="row mb-3">
            <label for="" class="col-lg-4">Quantity:</label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="pquan">
                <br>
            </div>
        </div>
        <!--  -->
        <div class="row mb-3">
            <label for="" class="col-lg-4">Image:</label>
            <div class="col-lg-8">
                <input type="file" class="form-control" name="pimage">
                <br>
            </div>
        </div>
        <!--  -->
        <div class="row mb-3">
            <label for="" class="col-lg-4">category ID (C001 or C002):</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="pcatid">
                <br>
            </div>
        </div>
        <!--  -->

        <div class="row mb-3">
            <div class="d-grid mx-auto col-3">
                <input type="submit" value="Add" class="btn btn-primary" name="btnAdd">
            </div>
        </div>
    </form>
</div>
</body>

</html>