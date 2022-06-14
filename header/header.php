<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('check.php');    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>CRIME | SECURITY - DASHBOARD</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style1.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="sammacmedia">
                <div class="sidebar-header">
                    <h3>CRIME</h3>
                    <strong>CRM</strong>
                </div>

                <ul class="list-unstyled components">
                <?php
                    if($_SESSION['permission']=='admin' or $_SESSION['permission']=='staff' ){
                        
                    ?>
                    <li class="active1">
                        <a href="dashboard.php">
                            <i class="fa fa-th"></i>
                           Dashboard
                        </a>
                    </li>
                    <li class="active1">
                        <a href="records.php">
                            <i class="fa fa-plus"></i>
                           Add Offender
                        </a>
                    </li>
                    <li class="active1">
                        <a href="v_records.php">
                            <i class="fa fa-table"></i>
                            View Offender
                        </a>
                        
                    </li>
                    <li class="active2">
                         <a href="crimerecords.php">
                            <i class="fa fa-plus"></i>
                           Add Offender Records
                        </a>
                      
                    </li>
                    <li class="active2">
                         <a href="#">
                            <i class="fa fa-link"></i>
                           Judicial Segment
                        </a>
                      
                    </li>

                    <li class="active2">
                         <a href="#">
                            <i class="fa fa-table"></i>
                           View Judicial Data
                        </a>
                      
                    </li>

                    <li class="active2">
                         <a href="#">
                            <i class="fa fa-link"></i>
                           Charged Segment
                        </a>
                      
                    </li>

                    <li class="active2">
                         <a href="#">
                            <i class="fa fa-table"></i>
                           View Charged Data
                        </a>
                      
                    </li>

                    <li class="active4">
                        <a href="invest.php">
                            <i class="fa fa-link"></i>
                            Report Issues
                        </a>
                    </li>
                    
                    <li class="active5">
                        <a href="v_issue.php">
                            <i class="fa fa-table"></i>
                            View Issues
                        </a>
                    </li>

                    <?php }?>

                    <?php
                    if($_SESSION['permission']=='admin' ){
                        
                    ?>          
                    <li class="active2">
                        <a href="a_employees.php">
                            <i class="fa fa-plus"></i>
                            Add Employees
                        </a>
                      
                    </li>
                    
                    <li class="active3">
                        <a href="all_employees.php">
                            <i class="fa fa-table"></i>
                           All Employees
                        </a>
                    </li>
                    
                    <li class="active6">
                        <a href="a_users.php">
                            <i class="fa fa-user"></i>
                            Add Users
                        </a>
                    </li>
                    <li class="active7">
                        <a href="v_users.php">
                            <i class="fa fa-table"></i>
                            View Users
                        </a>
                    </li>
                    <?php } ?>
                    <li class="active8">
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        <!-- Page Content Holder -->
        <div id="content" >
            <nav class="navbar navbar-default sammacmedia">
                    <div class="container-fluid">

                        <div class="navbar-header" id="sams">
                            <button type="button" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Logout</i></a></li>
           
                            </ul>
                        </div>
                    </div>
                </nav>
                