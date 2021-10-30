<?php
require_once("bootstrap.php");
require_once("Controller/UserEgtma3ConController.php");
require_once("Model/UserModel.php");
require_once("Model/Egtma3Model.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
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
                        echo "<label>مخدوم</label>";
                        echo"<select name='user' class ='form-control' required>";
                        $result=User::ListAllUser($userT);
                        while($row = mysqli_fetch_array($result))
                        {
                        $usr = $row['user_name'];
                        $typ = User::ReturnUserTypeName($row['user_type_id']);

                        echo"<option value=". $row['user_id'] .">$usr    $typ";
                        }
                        echo"</select>";

                        echo "<label>أجتماع</label>";
                        echo"<select name='egtma3' class ='form-control' required>";
                        $result=Egtma3::ListAllEgtma3at();
                        while($row = mysqli_fetch_array($result))
                        {
                        $egt = $row['egtma3_name'];
                        echo"<option value=". $row['egtma3_id'] ."> $egt";
                        }
                        echo"</select>";
                    ?>
                    <br>
                    <label>
                        <input type="submit" name="UserSubmit" class="btn btn-primary" value="Submit">
                        <?php echo"<a href='MainPage.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"?>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>