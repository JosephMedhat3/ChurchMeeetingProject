<?php
require_once "bootstrap.php";
require_once("Model/TripModel.php");
require_once("Model/UserModel.php");
require_once("Controller/TripeDetailsController.php");
$egtma3_id=$_GET['egtID'];
$trip_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$price = Trip::ReturnTripPriceID($trip_id);
?>

<html>
    <head>
    <title>View Users</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-right">بيانات الرحلة</h2>
                        </div>
                            <br><br>
                            <form method="POST">
                            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                            <br><br>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Phone</th>                                   
                                        <th>Email</th>
                                        <th>Trip Price</th>
                                        <th>Payed Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=User::ListMa5domInEgtma3($egtma3_id);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['user_phone'] . "</td>";;
                                        echo "<td>" . $row['user_email'] . "</td>";
                                        echo "<td>" . $price . "</td>";
                                        echo "<td>";
                                        $pay = Trip::ReturnPaidAmount($trip_id, $row['user_id']);
                                        echo "<input type='number' name='price[]' value=" .$pay.">";
                                        echo "<input type='hidden' name='userID[]' value=".$row['user_id'].">";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<td>" .  "</td>";
                                    }
                                echo "</tbody>";                            
                                echo "</table>";
                                echo"<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>back</a>";
                                ?>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>