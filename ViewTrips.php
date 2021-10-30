<?php
require_once("bootstrap.php");
$egtma3_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
?>

<html>
    <head>
    <title>View Trips</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Trips Details</h2>
                        </div>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once("Model/TripModel.php");

                                    $result = Trip::ListAllTrips();
                                    
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['trip_id'] . "</td>";
                                        echo "<td>" . $row['trip_name'] . "</td>";
                                        echo "<td>" . $row['trip_date'] . "</td>";
                                        echo "<td>" . $row['trip_price'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='ViewTripRecord.php  ? &id=". $row['trip_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        if($userT<3)
                                        {  
                                        echo "<a href='UpdateTripRecord.php? &id=". $row['trip_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='DeleteTripRecord.php? &id=". $row['trip_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo"<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>