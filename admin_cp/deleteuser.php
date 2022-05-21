<?php include 'C:\xampp\htdocs\php_project\admin_cp\connect.php';?>
<?php


$id=$_POST['id']??null;

if(!$id){
    headear('Location: user.php');

exit;}

$statement=$pdo->prepare('DELETE FROM users WHERE user_id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: user.php');
?>