<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:: Halaman Login Administrator ::.</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../bootstrap/css/costom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="../images/feby.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" name="form1" method="post" action="cek_login.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="id_user" type="text" id="id_user" class="form-control" placeholder="Username">
                <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button nput class="btn btn-info" type="submit" name="submit" value="Login">Sign in</button>
            </form>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="../include/layouts/assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="../include/layouts/assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="../include/layouts/assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="../include/layouts/assets/js/custom.js"></script>    
</body>
</html>