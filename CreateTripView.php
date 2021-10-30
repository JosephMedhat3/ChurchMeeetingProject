<?php
require_once("bootstrap.php");
require_once("Controller/CreateTripController.php");

$egtma3_id=$_GET['egtID'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$Date = date("Y-m-d");

?>
<html>
<head>
    <title>Create Trip</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Trip Creation Page</h2>
                    </div>      
                        <form method="POST">
                            <label>Egtma3</label>
                                <input type="number" name="Egtma3" class="form-control"  <?php echo "value='$egtma3_id'"?> readonly>

                            <label>Name</label>
                                <input type="text" name="Name" class="form-control" required>
                        
                            <label>Price</label>

                                <input type="number" name="Price" class="form-control" required>

                            <label>Date</label>
                               <input type="date" name="Date" class="form-control"  <?php echo "min= '$Date'"?> required>
                            
                
                            <br>
                            <label>
                                <input type="submit" name="TripSubmit" class="btn btn-primary" value="Submit">
                                <?php echo"<a href='ViewEgtma3Record.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."' class='btn btn-default'>Back</a>"?>
                            </label>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>