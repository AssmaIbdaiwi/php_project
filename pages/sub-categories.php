<?php
// session_start();
include_once('../new/header.php');
// include_once($tmp . 'navbar.php');
$pageTitle = 'categories';

$select = "SELECT product_id,product_name, product_price, product_description, product_main_image, product_desc_image_1, product_desc_image_2, product_desc_image_3, product_category_id, product_tag FROM `products`";

$statement = $db->prepare($select);

if($_SERVER["REQUEST_METHOD"] == 'GET'){
	$search = $_GET['search'] ?? NULL;
	$statement = $db->prepare($select . "WHERE product_name LIKE '%$search%' ORDER BY product_name");
}
if (isset($_GET['subId'])) {
	$statement = $db->prepare($select . "WHERE sub_category_id = :subId");
	$statement->bindValue(':subId', $_GET['subId']);
}
if (isset($_GET['id'])) {
	$statement = $db->prepare($select . 'WHERE product_category_id = :id');
	$statement->bindValue(':id', $_GET['id']);
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


//fetching categories and sub categories

$catStatment = $db->prepare('SELECT c.category_id,c.category_name,s.sub_category_id,s.sub_category_name FROM categories c LEFT JOIN sub_categories s ON c.category_id = s.category_id ORDER BY c.category_name;');
$catStatment->execute();
$categories = $catStatment->fetchAll(PDO::FETCH_ASSOC);
$subCatStatment = $db->prepare('SELECT * FROM sub_categories ORDER BY sub_category_name');
$subCatStatment->execute();
$subCategories = $subCatStatment->fetchAll(PDO::FETCH_ASSOC);
$filt = uniqueCategory($categories);
if (empty($products)) {
	$no_products = 'Looks empty!';
}
?>


<section class="section-products">
		        <!-- ######################### categories and sub categories  -->
			
		<div class="container">
		
				<div class="row justify-content-center text-center">
				</div>
				<div class="row">
					<?php if (empty($products)) {
						echo '<h1>' . $no_products . '</h1>';
					}else{?>
                    <?php foreach($products as $i => $product): ?>
                        <!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-4" class="single-product">
										<div class="part-1" style="background: url('../admin_cp/<?php echo $product['product_main_image']; ?>') no-repeat center; background-size: contain; ">

									
											<ul>
													<li><a href="view.php?id=<?php echo $product['product_id'];?>&name=<?php echo $product['product_name'];?>"><i class="fa-solid fa-eye" title='View product'></i></a></li>
													<li><a href="add.php?id=<?php echo $product['product_id']?>&qty=1"><i class="fa-solid fa-cart-plus" title='Add to cart'></i></a></li>
											</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title"><?php echo substr($product['product_name'], 0, 30); ?></h3>

										<?php	echo '<span>' . 'JOD ' . round($product['product_price'],2) . '</span>';?>

                                                <p  class="product-description"><?php echo substr($product['product_description'], 0, 30); ?></p>
                                                <p class="full_description" ><?php echo $product['product_description'];?></p>
                                                <button class="btn btn-outline-dark seemore">See more</button>   
										</div>
								</div>
						</div>
                        <!-- Single Product -->
                        <?php endforeach; ?>
				</div>
		</div>
		<?php } ?>
</section>


<?php
include_once '../new/footer.php';
?>




