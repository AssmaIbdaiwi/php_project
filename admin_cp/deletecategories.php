<?php include 'C:\xampp\htdocs\php_project\admin_cp\connect.php';?>
<?php


$id=$_POST['id']??null;

if(!$id){
    headear('Location: categories.php');

exit;}

$statement=$pdo->prepare('DELETE FROM categories WHERE category_id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: categories.php');
?>