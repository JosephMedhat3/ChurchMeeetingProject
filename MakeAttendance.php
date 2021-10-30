<?php
require_once "bootstrap.php";
require_once("Model/UserModel.php");
require_once("Model/attendanceModel.php");
require_once("Controller/attendanceDetailsController.php");
$egtma3_id=$_GET['egtID'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$attenID = $_GET['att'];
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
                        <h2 class="pull-right">غياب الأجتماع</h2>
                        </div>
                            <br><br>
                            <form method="POST"> 
                            
                            <?php
                            if(Attendance::CheckEndAttendance($attenID))
                            {
                                echo "<input type='submit' name='Submit' class='btn btn-primary' value='Submit'>";
                                if($userT<3)
                                {
                                    echo "<input type='submit' name='End' class='btn btn-primary' value='End Attendance'>";
                                }
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
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=User::ListMa5domInEgtma3($egtma3_id);
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
                                        $attendance = User::CheckAttendanceCon($row['user_id'], $attenID);
                                        if($userT==4)
                                        {
                                            if($userID==$row['user_id'])
                                            {
                                                echo "<td>" ;
                                                echo "<select name='atten[]'class ='form-control' required>";
                                                if($attendance==1)
                                                {
                                                    echo "<option value = '1' >Present </option>";                                                   
                                                    echo "<option value = '0'>Absent</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value = '0'>Absent</option>";
                                                    echo "<option value = '1' >Present </option>";
                                                }
                                                echo "</select>";
                                                echo "</td>" ;
                                                echo "<input type='hidden' name='userID[]' value=".$row['user_id'].">";
                                            }
                                            else
                                            {
                                                
                                                echo "<td>" ;
                                                echo "<select name='atten[]'class ='form-control' disabled>";
                                                if($attendance==1)
                                                {
                                                    echo "<option value = '1' >Present </option>";                                                   
                                                    echo "<option value = '0'>Absent</option>";
                                                }
                                                else
                                                {
                                                    echo "<option value = '0'>Absent</option>";
                                                    echo "<option value = '1' >Present </option>";
                                                }
                                                echo "<option value = '0'>Absent</option>";
                                                echo "<option value = '1' >Present </option>";
                                                echo "</select>";
                                                echo "</td>" ;
                                            }
                                        }
                                        else
                                        {
                                            echo "<td>" ;
                                            echo "<select name='atten[]'class ='form-control' required>";
                                            if($attendance==1)
                                            {
                                                echo "<option value = '1' >Present </option>";                                                   
                                                echo "<option value = '0'>Absent</option>";
                                            }
                                            else
                                            {
                                                echo "<option value = '0'>Absent</option>";
                                                echo "<option value = '1' >Present </option>";
                                            }
                                            echo "</select>";
                                            echo "</td>" ;
                                            echo "<input type='hidden' name='userID[]' value=".$row['user_id'].">";
                                        }

                                        echo "</tr>";
                                        echo "<td>" .  "</td>";
                                    }
                                echo "</tbody>";                            
                                echo "</table>";
                                echo"<a href='Egtma3Calender.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>back</a>";
                                ?>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>