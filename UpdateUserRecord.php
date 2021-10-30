<?php
require_once("bootstrap.php");
require_once("Controller/UpdateUserController.php");
require_once("Model/UserModel.php");
$user_id=$_GET['id'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$result= User::GetRecord($user_id);
$data = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Update User</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>User Edit Page</h2>
                </div>
                <p><h1>Update User</h1></p>
                <form method="POST">
                    <label>ID</label>
                        <input type="number" name="ID" class="form-control" readonly value="<?php echo $data['user_id'] ?>">
                    <label>Name</label>
                        <input type="text" name="Name" class="form-control" required value="<?php echo $data['user_name'] ?>">

                    <label>Age</label>
                        <input type="number" name="Age" class="form-control" required value="<?php echo $data['user_age'] ?>">

                    <label>Phone</label>
                        <input type="tel" name="Phone" class="form-control" required value="<?php echo $data['user_phone'] ?>">

                    <label>BirthDate</label>
                        <input type="date" name="BirthDate" class="form-control" required value="<?php echo $data['user_birthDate'] ?>">

                    <label>Address</label>
                        <input type="text" name="Address" class="form-control" required value="<?php echo $data['user_address'] ?>">

                    <label>Email</label>
                        <input type="email" name="Email" class="form-control" required value="<?php echo $data['user_email'] ?>">

                    <label>Password</label>
                        <input type="password" name="Password" class="form-control" required value="<?php echo $data['user_password'] ?>">
                    <label>UserType</label>
                        <select name='UserType' class ='form-control' required value="<?php echo $data['user_type_id'] ?>">
                    <?php
                    if($userT<3) {
                        $result2=User::ListUserTypes($userT);
                        while($row = mysqli_fetch_array($result2)){
                        echo"<option value=". $row['type_id'] ."  label=". $row['type_name'] .">";
                        }
                    }
                    ?>
                        </select>
                    <br>
                    <label>
                        <input type="submit" name="UserSubmit" class="btn btn-primary" value="Submit">
                        <?php echo"<a href='ViewUsers.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-default'>Back</a>"?>
                        
                    <input type="hidden" name="userID" class="form-control" value="<?php echo $userID ?>">
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>