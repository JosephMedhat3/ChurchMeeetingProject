<?php
require_once "bootstrap.php";
require_once("Model/UserModel.php");
$egtma3_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
?>

<html>
    <head>
    <title>View Users</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-right">بيانات مستخدمين الأجتماع</h2>
                        </div>
                            <?php 
                            echo"<a href='Egtma3Calender.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>تاريخ الأجتماع</a>";                           
                            if($userT!=4)
                            {
                                echo"<a href='5ademMa5domCon.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>أربط مع مخدوم</a>";
                                echo"<a href='CreateTripView.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>أضف رحلة</a>";    
                            }
                            ?>
                            <br><br>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Phone</th>
                                        <th>BirthDate</th>                                       
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=User::ListUsersInEgtma3($egtma3_id);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['user_age'] . "</td>";
                                        echo "<td>" . $row['user_phone'] . "</td>";
                                        echo "<td>" . $row['user_birthDate'] . "</td>";
                                        echo "<td>" . $row['user_address'] . "</td>";
                                        echo "<td>" . $row['user_email'] . "</td>";
                                        $type = User::ReturnUserTypeName($row['user_type_id']);
                                        echo "<td>" . $type . "</td>";
                                        echo "</tr>";
                                        echo "<td>" .  "</td>";
                                    }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo"<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>";
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>