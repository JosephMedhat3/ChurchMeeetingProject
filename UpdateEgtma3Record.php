<?php
require_once("bootstrap.php");
require_once("Controller/UpdateEgtma3Controller.php");
require_once("Model/Egtma3Model.php");
$egtma3_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= Egtma3::GetRecord($egtma3_id);
$data = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Update Egtma3</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Egtma3 Edit Page</h2>
                </div>
                <p><h1>Update Egtma3</h1></p>
                <form method="POST">
                    <label>ID</label>
                        <input type="number" name="ID" class="form-control" readonly value="<?php echo $data['egtma3_id'] ?>">
                    <label>Name</label>
                        <input type="text" name="Name" class="form-control" required value="<?php echo $data['egtma3_name'] ?>">

                    <label>Time</label>
                        <input type="time" name="Time" class="form-control" required value="<?php echo $data['egtma3_time'] ?>">

                    <label>Day</label>
                        <select name="Day"class ="form-control" required value="<?php echo $data['church_day'] ?>">
                                <option value="Saturday">Satrday</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wedneday">Wedneday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday" >Friday</option>
                            </select>
                    <br>
                    <label>
                        <input type="submit" name="UserSubmit" class="btn btn-primary" value="Submit">
                        <?php echo"<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"?>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>