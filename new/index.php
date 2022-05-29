<?php
include_once('../new/header.php');?>


<?php

$select = "SELECT product_id,product_name, product_price, product_description, product_main_image,product_desc_image_1, product_desc_image_2, product_desc_image_3, product_category_id, product_tag FROM `products` ORDER BY product_id desc limit 4";

$statement = $db->prepare($select);
$statement->execute();
$productnew = $statement->fetchAll(PDO::FETCH_ASSOC);




?>

<!-- //fetching categories and sub categories
// $catStatment = $db->prepare('SELECT c.category_id,c.category_name,s.sub_category_id,s.sub_category_name FROM categories c LEFT JOIN sub_categories s ON c.category_id = s.category_id ORDER BY c.category_name;');
// $catStatment->execute();
// $categories = $catStatment->fetchAll(PDO::FETCH_ASSOC);
// $subCatStatment = $db->prepare('SELECT * FROM sub_categories ORDER BY sub_category_name');
// $subCatStatment->execute();
// $subCategories = $subCatStatment->fetchAll(PDO::FETCH_ASSOC);
// $filt = uniqueCategory($categories);

//  -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="pic/Watermark_Inside_Title-Image_0708_v1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MyDay Electronics</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="../pages/sub-categories.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="pic/0x0.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MyDay Electronics</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="../pages/sub-categories.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="pic/intro-1645661674.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MyDay Electronics</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="../pages/sub-categories.php">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
    <?php $statement = $db->prepare('SELECT * FROM categories');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>



            <div class="row">
                <?php foreach ($products as $i) { ?>

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="shop-cat-box">
                            <img class="img-fluid" src="../admin_cp/<?php echo $i['category_image']; ?>" alt="" />
                            <a class="btn hvr-hover" href="../pages/sub-categories.php"><?php echo $i['category_name']; ?></a>
                        </div>
                    </div>

                <?php }; ?>


            </div>
        </div>
    </div>
    <!-- End Categories -->

    
    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
            </div>
            <div class="row">
            
                <?php if (empty($productnew)) {
                    echo '<h1>' . $no_products . '</h1>';
                } else { ?>
                    <?php
                  
                    foreach ($productnew as $i => $product) : ?>
                        <!-- Single Product -->
                        
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div id="product-4" class="single-product">
                                <div class="part-1">
                                    <div class="shop-cat-box">
                                        <img class="img-fluid" src="../admin_cp/<?php echo $product['product_main_image']; ?>" alt="" />
                                    </div>

                                </div>

                                <div class="part-2">
                                    <h3 class="product-title"><?php echo $product['product_name']; ?></h3>

                                    <?php echo '<span>' . 'JOD ' . round($product['product_price'], 2) . '</span>'; ?>
                                    <div class="why-text" style="color:black;">
                                        <h4>
                                        <p class="product-description "><?php echo substr($product['product_description'], 0, 30); ?></p>
                                        </h4>

                                        <a href="../pages/view.php?id=<?php echo $product['product_id'];?>&name=<?php echo $product['product_name'];?>">  <button class="btn btn-outline-dark seemore">See more</button></a> 
                                      

                                        <!-- <button class="btn btn-outline-dark seemore">See more</button>    -->
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Single Product -->
                    <?php endforeach; ?>
                    
            </div>
        <?php } ?>

        </div>
    </div>
    <!-- End Products  -->


    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Coupon</h1>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="blog-box">
                        <div class="blog-img" >
                        
                            <img class="img-fluid" src="pic/Black and Orange Restaurant  & Fast Food Facebook Cover.png" alt="" /> 
                            <div style="display:inline-block; font-size:40px; color:red;margin-left:100px" >  


                            <!-- <a href="#">   <button class="btn  btn-lg btn-block" type="submit" name="submit" value="submit" style="background-color:#d92916; ;color:white;">COUPON</button>  </a>                 -->
                            </div>
 
                        </div>
                        <div class="blog-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->

    <?php include_once('../new/footer.php'); ?>

