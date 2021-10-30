<?php
require_once("bootstrap.php");
require_once("Controller/CreateEgtma3Controller.php");

$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$Date = date("Y-m-d");
?>
<html>
<head>
    <title>Create Egtma3</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Egtma3 Creation Page</h2>
                    </div>      
                        <form method="POST">
                            <label>Name</label>
                                <input type="text" name="Name" class="form-control" required>

                            <label>time</label>
                                <input type="time" name="Time" class="form-control" required>

                            <label>Day</label>                
                            <select name="Day"class ="form-control" required>
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
                                <input type="submit" name="Egtma3Submit" class="btn btn-primary" value="Submit">
                                <?php echo"<a href='MainPage.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"?>
                            </label>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>