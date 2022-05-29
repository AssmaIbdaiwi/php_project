<?php include '../includes/templates/navbaradmin.php';
require_once('init.php');
?>
<?php   include '../layout/table.php';?>






<div class="container user_container" style="margin-bottom: 5%;">
    <div class="row align-items-stretch no-gutters contact-wrap">

        <div class="col-md-9 table-responsive-sm" id="user_orders_table">
            <?php
            try {
                $id = $_GET['order-id'];
                $date = $_GET['order_date'];

                $query1 = "SELECT * FROM cart WHERE order_date = :O_Date and order_id = :id";
                $result = $db->prepare($query1);
                $result->bindParam(':O_Date', $date);
                $result->bindParam(':id', $id);
                $result->execute();
                $data = $result->fetchAll();

                if ($data) {
                    echo ('<table class="table">
                    <thead class="orders_table_head">
                        <tr>
                            <th scope="col">Product_id</th>
                            <th scope="col">Product_name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>');

                    // output data of each row
                    foreach ($data as $value) {
                        echo "<tr><td>" . $value["product_id"] . "</td>
                    <td>" . $value["product_name"] . "</td>
                    <td>" . $value["price"] . "</td>
                    <td>" . $value["quantity"] . "</td>
                    </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo ('NO Orders');
                }
            } catch (PDOException $e) {
                echo $query1 . "<br>" . $e->getMessage();
            } finally {
                $db = NULL;
            }

            ?>
        </div>
    </div>
</div>



