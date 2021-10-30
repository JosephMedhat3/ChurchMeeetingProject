<?php
require_once("bootstrap.php");
require_once("Controller/DeleteEgtma3DateController.php");
$egtma3_id=$_GET['egtID'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
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
                            <p>Are you sure you want to cancel the egtma3 ?</p><br>
                            <p>
                                <input type="submit" name="UserSubmit" class="class='btn btn-success ml-3" value="Yes">
                                <?php echo"<a href='Egtma3Calender.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>back</a>";?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>