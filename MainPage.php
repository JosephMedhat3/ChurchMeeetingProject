<?php
require_once("bootstrap.php");
require_once("Model/notificationModel.php");
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
$inbox = Notify::GetNotifyCount($userID);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
</head>

<body>
<?php echo "<a href='LoginPage.php' class='btn btn-danger ml-3'> تسجيل خروج</a>  ";?>
<div class="wrapper">
    <h1 class="my-5">مرحبا: <b><?php echo htmlspecialchars($userN);?></h1>
    <h4><?php echo htmlspecialchars($userTN);?></h4>

        <?php echo "<a href='ViewNotifications.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='notification'>"; ?>
        <span>Inbox</span>

        <span class="badge"><?php echo $inbox ?> </span>
        </a>
    
    <?php
    //0: admin 1: kahen 2: amen 3: 5adem 4: ma5dom
        if($userT<=3)
        {
            echo "<a href='CreateUserView.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-warning'> أضف مستخدم </a>  ";
            echo "<a href='ViewUsers.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-success'> المستخدمين  </a>  ";
            echo "<br>";
            echo "<br>";         
        }
        if($userT<=1)
        {
            //EGTMA3AT
            echo "<a href='UserEgtma3Con.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-warning'> أربط المستخدم بالجتماع</a>  ";
            echo "<a href='CreateEgtma3View.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-warning'> أضف أجتماع  </a>  ";
            echo "<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-success'> الأجتماعات  </a>  ";
            echo "<br>";
            echo "<br>";  

        }
        if($userT<=3)
        {
            echo "<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-success'> أجتماعاتي  </a>  ";
            echo "<a href='ViewMa5domen.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-success'> المخدومين  </a>  ";
            echo "<br>";
            echo "<br>";     
        }
        if($userT==4)//Ma5dom
        {
            echo "<a href='ViewEgtma3at.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-success'> أجتماعاتي  </a>  ";
        }
        echo "<a href='YoutubeView.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."' class='btn btn-danger ml-3'> YouTube </a>  ";     
    ?>
    </div>
</body>
</html>