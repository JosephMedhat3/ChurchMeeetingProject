<?php
require_once("bootstrap.php");
require_once("Controller/UpdateTripController.php");
require_once("Model/TripModel.php");
$egtma3_id=$_GET['egtID'];
$tripID=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= Trip::GetRecord($tripID);
$data = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Update Trip</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Trip Edit Page</h2>
                </div>
                <p><h1>Update Trip</h1></p>
                <form method="POST">
                    <label>ID</label>
                        <input type="number" name="ID" class="form-control" readonly value="<?php echo $data['trip_id'] ?>">
                    <label>Egtma3 ID</label>
                        <input type="number" name="egtma3" class="form-control" readonly value="<?php echo $data['trip_egtma3_id'] ?>">
                    <label>Name</label>
                        <input type="text" name="Name" class="form-control" required value="<?php echo $data['trip_name'] ?>">
                    <label>Date</label>
                        <input type="date" name="Date" class="form-control" required value="<?php echo $data['trip_date'] ?>">
                    <label>Price</label>
                        <input type="number" name="Price" class="form-control" required value="<?php echo $data['trip_price'] ?>">
                    <label>
                        <input type="submit" name="UserSubmit" class="btn btn-primary" value="Submit">
                        <?php echo"<a href='ViewTrips.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."' class='btn btn-default'>Back</a>"?>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>