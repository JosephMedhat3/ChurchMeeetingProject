<?php
require_once("bootstrap.php");
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
                        <h2 class="pull-left">My Ma5domen Details</h2>
                        </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once("Model/UserModel.php");
                                    $result=User::ListAllMa5domen($userID);
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
                                            echo "</tr>";
                                            echo "<td>" .  "</td>";

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