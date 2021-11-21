<?php 
session_start();
// error_reporting(0);

// apabila user yang mengakses tidak sah
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses halaman ini, anda harus login terlebih dahulu <br>";
	echo "<a href=index.php><b>LOGIN</b></a></center>";
}

// apabila user yang mengakses sah
else {

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feby Maulana Hendrayatno</title>
    <link href="css/style.min.css" rel="stylesheet">
</head>
<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
								class="img-circle"><span class="text-white font-medium">Steave</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
					<?php include "menu.php"; ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper" style="padding-top: 40px;">
            <div class="container-fluid">
                    </table>
                </td>
            </tr>
            <tr>
                </td>
                <td class="text" id="content">
                    <?php include "konten.php"; ?>
                </td>
            </tr>
        </table>
            </div>
            <footer class="footer text-center"> <span class="kecil">Copyright <b>Polindra</b> &copy; 2011. All Right Reserved<br>
				<span class="style_text">Design By <a href="http://www.polindra.ac.id" target="_blank">Training Center TI Polindra</a></span></span></td>
            </footer>
        </div>
    </div>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>


<?php 
}
 ?>
