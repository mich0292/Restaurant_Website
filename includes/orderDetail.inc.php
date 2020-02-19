<?php
    include "dbh.inc.php";
    $paymentid = $_POST['paymentid'];
    $sql="SELECT * FROM payment_detail WHERE payment_id ='$paymentid'";
    $response = '<table class="w-100 table table-fluid table-striped text-center">';
    $response .= '<tr>
                <th scope="col"><div class="py-2">Food Ordered</div></th>
                <th scope="col"><div class="py-2">Quantity</div></th>
                </tr>';
    $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_array($result) ){
    $food_name = $row['food_name'];
    $quantity = $row['food_qty'];
    
    $response .= "<tr>";
    $response .= "<td>".$food_name."</td>";
    $response .= "<td>".$quantity."</td></tr>";

    }
    $response .= "</table>";

    echo $response;
    exit();
?>