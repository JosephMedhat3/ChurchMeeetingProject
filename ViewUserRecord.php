<?php
require_once "bootstrap.php";
require_once("Model/UserModel.php");
require_once("Model/notificationModel.php");
$user_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= User::GetRecord($user_id);
Notify::ListProductAlert($user_id);
$row = mysqli_fetch_assoc($result);
?>
<html>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record of User</h1>
                    </div>
                    <div class="form-group">
                        <label>ID</label>
                        <p class="form-control-static"><?php echo $row["user_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["user_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p class="form-control-static"><?php echo $row["user_age"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p class="form-control-static"><?php echo $row["user_phone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>BirthDate</label>
                        <p class="form-control-static"><?php echo $row["user_birthDate"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["user_address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["user_email"]; ?></p>
                    </div>
                    <?php echo"<a href='ViewUsers.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>