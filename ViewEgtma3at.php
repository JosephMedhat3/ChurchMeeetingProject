<?php
require_once("bootstrap.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
?>

<html>
    <head>
    <title>View Egtma3at</title>
    </head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Egtma3at Details</h2>
                        </div>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once("Model/Egtma3Model.php");
                                    if($userT<=1)
                                    {
                                        $result = Egtma3::ListAllEgtma3at();
                                    }
                                    else
                                    {
                                        $result = Egtma3::ListMyEgtma3($userID);
                                    }
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['egtma3_id'] . "</td>";
                                        echo "<td>" . $row['egtma3_name'] . "</td>";
                                        echo "<td>" . $row['egtma3_day'] . "</td>";
                                        echo "<td>" . $row['egtma3_time'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='ViewEgtma3Record.php  ? &id=". $row['egtma3_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='View Egtma3' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        if($userT<3)
                                        {  
                                        echo "<a href='UpdateEgtma3Record.php? &id=". $row['egtma3_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "<a href='DeleteEgtma3Record.php? &id=". $row['egtma3_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        }
                                        if($userT<=2)
                                        {
                                        echo "<a href='ViewTrips.php  ? &id=". $row['egtma3_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='View Trips' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        } 
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";                            
                            echo "</table>";
                            echo"<a href='MainPage.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>