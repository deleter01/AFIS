<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../header/header.php') ?>

<div class="dir">
    
        <a href="dashboard.php">Home</a> <i class="fa fa-chevron-right"></i><label>Report Issue</lable>
    
</div>
<div class="line"></div>
    <div class="cards">

                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['employee_id']);
                            $severity = mysqli_real_escape_string($mysqli,$_POST['severity']);
                            $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                            $as = rand(1000,9999);     
                            $case_num = date("YmdHis").'.'.$as;
      
                  
                            $sql = "INSERT INTO cases(employee_id,severity,case_num,notes)VALUES('$employee_id','$severity','$case_num','$notes')";
                            $results = mysqli_query($mysqli,$sql);

                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Case has successfully added';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Reports</div>
        <div class="panel-body">
            <form method="post" action="invest.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Select Employee Number</label>
             <?php
                       
                    $query1 = "SELECT * FROM `employees`";
                    $result1 = mysqli_query($mysqli, $query1);
                    ?>
                    <select class="form-control" name="employee_id">
                    <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option><?php echo $row1['employee_id'];?></option>
                        <?php endwhile;?>
                       
                       </select>
            </div>  
            <div class="col-lg-6">
            <label>Case Severity</label>
                <select class="form-control" name="severity">
                <option>Normal</option>
                <option>Critical</option>  
                <option>Danger</option>    
                </select>
            </div>
           </div>
                <div class="row form-group">
          <div class="col-lg-12">
              <textarea class="form-control" id="editor" name="notes"></textarea>
            </div>  
             
           </div>
                
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Process</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-times"></span> Cancel</button>  
                </div>
                </div>
            </form>

            </div>
          </div>
  </div>
                <?php include('../header/footer.php') ?>
            
        </div>
        
</html>
