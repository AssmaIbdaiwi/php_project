<?php 
require_once('init.php');
?>

<?php


$id=$_POST['id']??null;

if(!$id){
    header('Location: user.php');

exit;}

$statement=$db->prepare('DELETE FROM users WHERE user_id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

header('Location: user.php');
?>