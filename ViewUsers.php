<?php
require_once("bootstrap.php");
require_once("./Controller/SortingController.php");
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
                        <h2 class="pull-left">User Details</h2>
                        </div>

                        <form method="POST">
                            <input type="submit" name="SortByID" class="btn btn-primary" value="Sort By ID">
                            <input type="submit" name="SortByName" class="btn btn-primary" value="Sort By Name">
                        <form>
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
                                    include_once("Model/UserModel.php");
                                    $result=sorted();
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
                                        if($userT<3)
                                        {
                                            echo "<td>";
                                            echo "<a href='ViewUserRecord.php  ? &id=". $row['user_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='UpdateUserRecord.php? &id=". $row['user_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='DeleteUserRecord.php? &id=". $row['user_id'] ." &userN=".$userN." &userT=".$userT."&userTN=".$userTN."&userID=".$userID."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                            echo "</td>";
                                        }

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