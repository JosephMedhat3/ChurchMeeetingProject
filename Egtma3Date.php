<?php
require_once("bootstrap.php");
require_once("Model/attendanceModel.php");
require_once("Controller/attendanceController.php");
$egtma3_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$day=$_GET['day'];
$month=$_GET['month'];
?>

<html>
    <head>
    <title>Today Egtma3</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Today Egtma3</h2>
                        </div>

                        <form method="POST">
                            <input type="hidden" name="egtID" class="form-control" value="<?php echo $egtma3_id ?>">
                            <input type="hidden" name="day" class="form-control" value="<?php echo $day ?>">
                            <input type="hidden" name="month" class="form-control" value="<?php echo $month ?>">
                            <?php 
                            if($userT< 4 && Attendance::CheckCon($egtma3_id, $day, $month)) 
                            {
                                echo "<input type='submit' name='Submit' class='btn btn-primary' value='Add Today Egtma3'>";
                            }
                            ?>
                            <br> <br>
                        </form>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Year-Month</th>
                                        <th>Day</th>
                                        <th>egtma3_id</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=Attendance::ListAttendance($egtma3_id, $day, $month);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['attendance_id'] . "</td>";
                                        echo "<td>" . $row['attendance_YM'] . "</td>";
                                        echo "<td>" . $row['attendance_D'] . "</td>";
                                        echo "<td>" . $row['egtma3_id'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='MakeAttendance.php? &att=". $row['attendance_id'] ." &userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' title='Make Attendance' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        if($userT<3)
                                        {
                                        echo "<a href='DeleteEgtma3Date.php? &att=". $row['attendance_id'] ." &userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' title='Cancel Egtma3' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                            echo "</tbody>";                            
                            echo "</table>";
                            echo"<a href='Egtma3Calender.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&egtID=".$egtma3_id."' class='btn btn-primary'>back</a>";
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>