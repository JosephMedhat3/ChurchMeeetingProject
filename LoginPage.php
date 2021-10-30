<?php
require_once("bootstrap.php");
require_once("Controller/LoginController.php");
?>
<html>
<body>
    <div class="wrapper" text-align: left>
        <h2>تسجيل الدخول</h2>
        <p>يرجى إدخال البريد الإلكتروني وكلمة المرور.</p>
        <form method="post">
            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <input type="email" name="Email" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>كلمة المرور</label>
                <input type="password" name="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="UserSubmit" class="btn btn-primary" value="تسجيل الدخول">
            </div>
        </form>
    </div>
</body>
</html>