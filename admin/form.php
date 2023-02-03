﻿<!DOCTYPE html>
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
                <a class="navbar-brand" href="index.php">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive" />
                </li>


                <li>
                    <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>

                <li>
                    <a  href="command.php"><i class="fa fa-table fa-3x"></i> Les commandes</a>
                </li>
                <li>
                    <a href="products.php"><i class="fa fa-table fa-3x"></i> Les produits</a>
                </li>
                <li>
                    <a class="active-menu" href="form.php"><i class="fa fa-edit fa-3x"></i> Ajouter un produit </a>
                </li>




            </ul>

        </div>

    </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ajout d'un produit</h2>   
                        
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ajout d'un produit
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Ajouter un produits</h3>
                                    <form role="form" action="./form_crud.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nom du produit</label>
                                            <input class="form-control" name="nom" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="desc"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Prix</label>
                                            <input class="form-control" type="number" name="prix"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Categorie </label>
                                            <select id="disabledSelect" class="form-control" name="cat">
                                                <option value="tech">tech</option>
                                                <option value="vetement">vetement</option>
                                                <option value="beauty">beauty</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantite</label>
                                            <input class="form-control" type="number" name="qte"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>photo</label>
                                            <input type="file" name="fileUpload" accept="image/*"/>
                                        </div>
                                       
                                        
                                        <button type="submit" class="btn btn-primary" name="sub">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>

                                    </form>
                                    <br />
                                     

                                 
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
