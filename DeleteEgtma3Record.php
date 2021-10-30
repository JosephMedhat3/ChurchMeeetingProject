<?php
require_once("bootstrap.php");
require_once("Controller/DeleteEgtma3Controller.php");
require_once("Model/Egtma3Model.php");
$egtma3_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= Egtma3::ReturnEgtma3NameID($egtma3_id);
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
                                <input type="hidden" name="ID" class="form-control" value="<?php echo $egtma3_id ?>">
                                <input type="hidden" name="userT" class="form-control" value="<?php echo $userT ?>">
                                <input type="hidden" name="userTN" class="form-control" value="<?php echo $userTN ?>">
                                <input type="hidden" name="userN" class="form-control" value="<?php echo $userN ?>">
                                <input type="submit" name="UserSubmit" class="class='btn btn-success ml-3" value="Yes">
                                <?php echo"<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-danger ml-3'>No</a>"?>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>