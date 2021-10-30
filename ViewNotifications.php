<?php
require_once("bootstrap.php");
require_once("Model/notificationModel.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
?>

<html>
    <head>
    <title>Notifications</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Notifications</h2>
                        </div>
                        <?php
                        $result = Notify::ViewNotifications($userID);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<h3>" . $row['notification_title'] . "</h3>";
                            echo "<h4>" . $row['notification_disc'] . "</h4>";
                        }
                        echo"<a href='MainPage.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"               
                        ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>