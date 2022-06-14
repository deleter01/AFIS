<?php require_once('includes/session.php');
       require_once('includes/conn.php');
       require_once('check.php');    
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../header/header.php') ?>

<div class="dir">
    
        <a href="dashboard.php">Home</a> <i class="fa fa-chevron-right"></i><label>Dashboard</lable>
    
</div>
<div class="line"></div>
    <div class="cards">
                <div class="row">
                <div class="col-lg-4 col-md-6 ">
                    <div class="panel panel sammac sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $offender;?></div>
                                    <div>Offenders</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-link fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cases;?></div>
                                    <div>Reported Cases</div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel strover sammacmedia">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-link fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $cases;?></div>
                                    <div>Finished Cases</div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>

                    
                    
            </div>
    </div>
            <?php include('../header/footer.php') ?>
            
        </div>


</html>
