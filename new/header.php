<?php
@session_start();
require("../admin_cp/init.php");

//fetching categories and sub categories
$catStatment = $db->prepare('SELECT c.category_id,c.category_name,s.sub_category_id,s.sub_category_name FROM categories c LEFT JOIN sub_categories s ON c.category_id = s.category_id ORDER BY c.category_name;');
$catStatment->execute();
$categories = $catStatment->fetchAll(PDO::FETCH_ASSOC);
$subCatStatment = $db->prepare('SELECT * FROM sub_categories ORDER BY sub_category_name');
$subCatStatment->execute();
$subCategories = $subCatStatment->fetchAll(PDO::FETCH_ASSOC);
$filt = uniqueCategory($categories);

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>MYday </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../new/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../new/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../new/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../new/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $css ?>style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- theme stylesheet-->

    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="text-slid-box">
                        <a class="navbar-brand" href="#">
                            <img src="../layout/pic/logo.png" alt="logo" style="width:100px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +962 77 777 7777</a></p>
                    </div>

                    <form class="d-flex">

                        <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<a href="../new/loginpage.php" class="btn btn-outline-light" type="button" style="margin-right: 10px;">Login</a>
                            <a class="btn btn-outline-light" type="button" href="../new/reg.php">Register</a>';
                        } else {
                            echo "<div class=col-md-7 pr-1 d-flex topper align-items-center text-lg-right>
						<h3 class=welcome style='color: white'> Welcome <span style='color:#e15a53;'> $_SESSION[username]</span></h3>
                        </div>
				   <a class='btn btn-outline-light' type='button' href='../User/info.php' style='margin-right: 10px;'>Account</a>
				   <a class='btn btn-outline-light' type='button' href= ../new/logout.php>Logout</a>";
                        } ?></form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a> -->
                </div>
                <!-- End Header Navigation -->
                <form action="../pages/sub-categories.php" method="GET" class='search-form'>
                    <div class="wrap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="What can we help you find ? " name='search'>
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="../new/index.php">Home</a></li>

                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <div class="row">
                                    <?php
                                    foreach ($filt as $category) {
                                        if ($category['sub_category_id']) { ?>
                                            <div class="col-lg-3 my-4 ">
                                                <h6 class="text-uppercase font-weight-bold"><a href="../pages/sub-categories.php?category=<?php echo $category['category_name'] ?>&id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a></h6>
                                                <ul class="megamenu-list list-unstyled">
                                                    <?php foreach ($subCategories as $subCategory) { ?>
                                                        <?php if ($category['category_id'] === $subCategory['category_id']) { ?>
                                                            <li class="megamenu-list-item"><a class="megamenu-list-link" href="../pages/sub-categories.php?sub_category=<?php echo $subCategory['sub_category_name'] ?>&subId=<?php echo $subCategory['sub_category_id'] ?>"> <?php echo $subCategory['sub_category_name'] ?> </a></li>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <div class="col-lg-3 my-4 ">
                                                <h6 class="text-uppercase font-weight-bold"><a href="../pages/sub-categories.php?category=<?php echo $category['category_name'] ?>&id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a></h6>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </ul>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="../final_page/cart.php">Cart</a></li>
                                <li><a href="../final_page/checkout.php">Checkout</a></li>
                                <li><a href="../User/info.php">My Account</a></li> 
                            </ul>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="../about/about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../contact_us/contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../final_page/cart.php">Cart</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <!-- <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">3</span>
                        </li>
                    </ul>
                </div> -->
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>

        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->