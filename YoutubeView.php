<?php
require_once("bootstrap.php");
require_once("Model/YoutubeModel.php");
require_once("Controller/YoutubeController.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
?>
<html>
<head>
    <title>Youtube Page</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>ST.Mark Latest Video</h2>
                    </div>      
                        <form method="POST">
                            <?php 
                            if($userT<2)
                            {
                                echo "<input type='submit' name='Submit' class='btn btn-primary' value='Add URL'>";
                                echo "<br><br>";
                                echo "<input type='url' name='url' class='form-control' required>";
                                echo "<br>";
                            }
                                $url = Youtube:: GetURL();
                                if($url!=0)
                                {
                                    echo "<iframe width='854' height='480' src='$url'> </iframe>";
                                }
                                echo"<a href='MainPage.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"
                            ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>