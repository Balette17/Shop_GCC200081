<html>

<head>
    <title>ban hang</title>
    <meta charset="utf-8">
    <link rel="icon" href="https://th.bing.com/th/id/OIP.Ib7HGbDVe7CcOre10SoxnwHaHa?pid=ImgDet&rs=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>

<body style="background-color:#fdccbc ;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">BPalette</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allproduct.php">all Product</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                           <?php
                            require_once('connect.php');
                            $sql = "SELECT  *  FROM `category`";
                            $c = new Connect;
                            $dblink = $c->connectToMySQL();
                            $re = $dblink->query($sql);

                            if ($re->num_rows > 0) {
                                while ($row = $re->fetch_assoc()) {
                           ?>
                           
                            <a  href="cat.php?id=<?=$row['catid']?>"
                            class="dropdown-item"> <?=$row['catname']?></a>
                            <?php
                            }
                        }
                            ?>
                           
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        if(isset($_COOKIE['cc_usrname'])){
        ?>
         <div class="navbar-nav ms-auto">
        <a href="login.php" class="nav-link">Welcome,
             <?=$_COOKIE['cc_usrname']?></a>
        <a href="logout.php" class="nav-link">logout</a>

    <?php
        }else{
    ?>
        <div class="navbar-nav ms-auto">
        <a href="login.php" class="nav-link">Login</a>
        <a href="register.php" class="nav-link">Register</a>
        
        <?php
        }
        ?>
    </div>
    </div>
    </nav>
