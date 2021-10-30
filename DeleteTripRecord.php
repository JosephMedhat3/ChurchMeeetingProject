<?php
require_once("bootstrap.php");
require_once("Controller/DeleteTripController.php");
require_once("Model/TripModel.php");
$egtma3_id=$_GET['egtID'];
$trip_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= Trip::ReturnTripNameID($trip_id);
?>
<html>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form method="post">
                        <div class="alert alert-danger fade in">
                            <p>Are you sure you want to delete <?php echo $result ?></p><br>
                            <p>
                                <input type="submit" name="UserSubmit" class="class='btn btn-success ml-3" value="Yes">
                                <?php echo"<a href='ViewTrips.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."' class='btn btn-danger ml-3'>No</a>"?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>