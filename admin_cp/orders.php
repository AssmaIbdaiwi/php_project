

<?php include '../includes/templates/navbaradmin.php';
require_once('init.php');
?>
<?php   include '../layout/table.php';?>
<?php
try{
$query1 = "SELECT * FROM orders ";
                    $result = $db->prepare($query1);
                    $result->bindParam(':ID', $id);
                    $result->execute();
                    $data = $result->fetchAll();
                    if ($data) {
                        echo ('<div class="orders"><table class="table">
                    <thead class="orders_table_head">
                        <tr>
                            <th scope="col">Order_ID</th>
                            <th scope="col">Order_Date</th>
                            <th scope="col">Order_User_Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>');

                        // output data of each row
                        foreach ($data as $value) {
                            echo "<tr><td>" . $value["order_id"] . "</td>
                                  
                    <td>" . $value["order_date"] . "</td>
                    <td>" . $value["order_user_name"] . "</td>  
                    <td>" . $value["order_total"] . "</td>
                    <td>" . $value["order_status"] . "</td>
                    <td>" . '<form action="orderdetail.php" method="get" style="margin-left:-9%; ">
                    <input type="hidden" name="order-id" value="' . $value["order_id"] . '">
                    <input type="hidden" name="order_date" value="' . $value["order_date"] . '">
                    <button type="submit" class="btn rounded-3 py-2 px-4" name="view" id="view"><i class="fa fa-eye"></i> View</button>
                    </form>' . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo ('<h2>NO Orders</h2>');
                    }
                } catch (PDOException $e) {
                    echo $query1 . "<br>" . $e->getMessage();
                } finally {
                    $db = NULL;
                }

echo'</div>'

?>

