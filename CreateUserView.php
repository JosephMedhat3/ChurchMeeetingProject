<?php
require_once("bootstrap.php");
require_once("Controller/CreateUserController.php");
require_once("Model/UserModel.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$Date = date("Y-m-d");
?>
<html>
<head>
    <title>Create User</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>User Creation Page</h2>
                </div>
                <?php
                    if($userT==3)
                    {
                        echo"<p><h1>Add Ma5dom</h1></p>";
                    }
                    else if($userT==2)
                    {
                        echo"<p><h1>Add 5adem</h1></p>";
                    }
                    else
                    {
                        echo"<p><h1>Add User</h1></p>";
                    }
                ?>
                <form method="POST">
                    <label>Name</label>
                        <input type="text" name="Name" class="form-control" required>

                    <label>Age</label>
                        <input type="number" name="Age" class="form-control" required>

                    <label>Phone</label>
                        <input type="tel" name="Phone" class="form-control"  pattern="[0-9]{11}"  title="الرقم غير صحيح" required>
                    <label>BirthDate</label>
                        <input type="date" name="BirthDate" class="form-control" min="1930-01-01" <?php echo "max= '$Date'"?> required>

                    <label>Address</label>
                        <input type="text" name="Address" class="form-control" required>

                    <label>Email</label>
                        <input type="email" name="Email" class="form-control" required>

                    <label>Password</label>
                        <input type="password" name="Password" class="form-control" required>
                    <label>Confirm Password</label>
                        <input type="password" name="CPassword" class="form-control" required>
                    <?php
                    if($userT<3) 
                    {
                        echo "<label>UserType</label>";
                        echo"<select name='UserType' class ='form-control' required>";
                        $result=User::ListUserTypes($userT);
                        while($row = mysqli_fetch_array($result))
                        {
                            $typ =$row['type_name'];
                            echo"<option value=". $row['type_id'] ." >$typ";
                        }
                        echo"</select>";
                    }
                    else
                    {
                        echo "<input type='hidden' name='UserType' value='4'>";
                    }
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