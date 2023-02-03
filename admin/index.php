<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    require('../connection.php');
    session_start();
    if (empty($_SESSION["id"])) {
      header('Location: ../login.php');
    }
    elseif ($_SESSION["id"] != 1) {
        header('Location: ../index.php');
    }
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="command.php"><i class="fa fa-table fa-3x"></i> Les commandes</a>
                    </li>
                    <li>
                        <a href="products.php"><i class="fa fa-table fa-3x"></i> Les produits</a>
                    </li>
                    <li>
                        <a href="form.php"><i class="fa fa-edit fa-3x"></i> Ajouter un produit </a>
                    </li>




                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>

                    </div>
                </div>
                <hr>
               
                <!-- /. ROW  -->
                <div class="row">

                    <?php
                        $sql = "SELECT p.price, c.quantity FROM command as c, product as p where isSaled = 1 and id=idp";
                        $result = $conn->query($sql);

                        $sum = 0;
                        while ($rows = $result->fetch_assoc()) {
                            $sum += $rows["price"]*$rows["quantity"];
                        }

                        $sql1 = "SELECT count(idc) as com FROM command where isSaled = 1";
                        $result1 = $conn->query($sql1);

                        $sql2 = "SELECT count(idc) as com FROM command where isSaled = 0";
                        $result2 = $conn->query($sql2);

                    ?>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-money fa-5x"></i>
                                <h3><?php echo $sum ?> Mad </h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Votre revenue

                            </div>
                        </div>
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-rocket fa-5x"></i>
                                <h3><?php echo $result1->fetch_assoc()['com'] ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Commande valid

                            </div>
                        </div>
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-rocket fa-5x"></i>
                                <h3><?php echo $result2->fetch_assoc()['com'] ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Commande en panier

                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>