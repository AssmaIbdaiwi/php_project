
<?php include '../includes/templates/navbaradmin.php';
require_once('init.php');
?>
<?php   include '../layout/table.php';?>

<?php




  $statement =$db->prepare('SELECT * FROM messages  ORDER BY id ASC');
$statement->execute();
$products= $statement->fetchAll(PDO::FETCH_ASSOC);




#search
echo '<div class="searchbox">
<form method="get">

</form></div>';





#table
echo' <div class="tablecatbox"><div class="tablecat"> 
<h1 style="color:#010038">Users</h1>
<table class="table table-striped">
<div class="table-responsive">
<thead>
  <tr>
    <th scope="col" >Id</th>
    <th scope="col" >First name</th>
    <th scope="col">Last name</th>
    <th scope="col">Email</th>
    <th scope="col">Messages</th>
    <th scope="col"></th>

  </tr>
</thead><tbody>';

foreach($products as $i){
 echo '       <tr>
            <th scope="row">'.$i['id'].'</th>
            
            <td>'.$i['first_name'].'</td>      
            <td>'.$i['last_name'].'</td>           
            <td>'.$i['email'].'</td>
            <td>'.$i['message'].'</td>       
        
            <td>
           <form method="post">
           <input type="hidden" name="id" value="'.$i['id'].'">
            <button type="submit" class="btn btn-danger">delete</button>
            </form>
            </td>
          </tr>
          ';}
        echo  '</tbody>    </table></div></div></div>';





?>
<?php
require_once('init.php');
?>


<?php

if(isset($_POST['id'])){
$id=$_POST['id']??null;

if(!$id){
    echo '<script>
    window.location.href="./messeges.php"
    
    </script>';

exit;}

$statement=$db->prepare('DELETE FROM messages WHERE id=:id');
$statement->bindValue(':id',$id);
$statement->execute();

echo '<script>
window.location.href="./messeges.php"

</script>';


}
?>




