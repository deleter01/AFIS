<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CRIME | SECURITY - DASHBOARD</title>
        <!-- Our Custom CSS -->
         <link rel="stylesheet" href="vendors/datatables/datatables.min.css">
    </head>
    <?php include('../header/header.php') ?>

    <div class="dir">
    
    <a href="dashboard.php">Home</a> <i class="fa fa-chevron-right"></i><label>View Records</lable>

</div>
<div class="line"></div>
<div class="cards">
                                           
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">All Recods</div>
        <div class="panel-body">
        <div class="table-responsive"> 
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>F Name</th>
                        <th>S Name</th>
                        <th>Age</th>
                        <th>Nationality</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Register Date</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"SELECT * FROM records ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                              <td><?php echo $row['fname'];?></td> 
                              <td><?php echo $row['surname'];?></td>
                              <td><?php echo $row['age'];?></td>
                              <td><?php echo $row['nationality'];?></td>  
                              <td><?php echo $row['gender'];?></td> 
                              <td><?php echo $row['d_thirth'];?></td>
                              <td><?php echo $row['joined'];?></td> 
                              <td>
                                  <a href="#samstrover<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> View</a> || <a href="v_records.php?edited=1&idx=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Remove</a>
                              </td>
                          </tr>
                          <?php
                        require('recordinfo.php');
                            $a++;
                      }
                       

          
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM records WHERE id = ? LIMIT 1"))
                          {
                              $stmt->bind_param("i",$id);
                              $stmt->execute();
                              $stmt->close();
                               ?>
                    <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong><?php echo'Record Successfully deleted please refresh this page';?></div>
               
                    <?php
                          }
                          else
                          {
                    ?>
                    <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong><?php echo'OOPS please try again something went wrong';?></div>
                    <?php
                          }
                          $mysqli->close();
                    
                      }
                else

                {
                     echo'Record not Selected';
                }
                      ?>
              
               
            </table>
        </div>
            </div>
                </div>
    </div>
                <?php include('../header/footer.php') ?>
            </div>
            
        </div>

         <script src="assets/js/jquery-1.10.2.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="vendors/datatables/datatables.min.js"></script>
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
         <script type="text/javascript">
             
             $(document).ready( function () {
                 $('#myTable').DataTable();
             } );
         </script>
    </body>
</html>
