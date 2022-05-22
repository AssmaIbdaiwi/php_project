
<?php
require_once('init.php');
?>




<?php


$id=$_POST['id']??null;

if(!$id){
    header('Location: products.php');

exit;}

$statement=$db->prepare('DELETE FROM products WHERE product_id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: products.php');
?>