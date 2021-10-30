<?php
require_once("bootstrap.php");
require_once("Controller/5ademMa5domConController.php");
require_once("Model/UserModel.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$egtma3ID=$_GET['egtID'];
?>
<html>
<head>
    <title>Connection</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>أضف مخدوم الي أجتماع</h2>
                </div>
                <form method="POST">
                    <?php
                        if($userT == 0)
                        {
                            echo "<label>خادم</label>";
                            echo"<select name='kadem' class ='form-control' required>";
                            $result=User::List5odamInEgtma3($egtma3ID);
                            while($row = mysqli_fetch_array($result))
                            {
                            $usr = $row['user_name'];
                            echo"<option value=". $row['user_id'] .">$usr";
                            }
                            echo"</select>";
                        }
                        else
                        {
                            echo "<label>خادم</label>";
                            echo"<input type='number' name='kadem' class='form-control' readonly value='$userID'>";
                        }

                        echo "<label>مخدوم</label>";
                        echo"<select name='ma5dom' class ='form-control' required>";
                        $result=User::ListMa5domInEgtma3($egtma3ID);
                        while($row = mysqli_fetch_array($result))
                        {
                        $usr = $row['user_name'];
                        echo"<option value=". $row['user_id'] .">$usr";
                        }
                        echo"</select>";
                    ?>
                    <br>
                    <label>
                        <input type="submit" name="UserSubmit" class="btn btn-primary" value="Submit">
                        <?php echo"<a href='ViewEgtma3Record.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3ID."' class='btn btn-default'>Back</a>"?>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>