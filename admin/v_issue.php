<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../header/header.php') ?>
         <link rel="stylesheet" href="vendors/datatables/datatables.min.css">
    </head>

    <div class="dir">
    
    <a href="dashboard.html">Home</a> <i class="fa fa-chevron-right"></i><label>View Issue</lable>

</div>
<div class="line"></div>
<div class="cards">
                                           
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">All Issues</div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Case Number</th>
                    <th>Employee Id</th>
                    <th>Issues</th>
                    <th>Severity</th>
                    <th>Action</th> 

                    
                    
                    </tr>
                </thead>
                    <?php
                                   $a=1;
                    $query=mysqli_query($mysqli,"select *from `cases` ");
                     while($row=mysqli_fetch_array($query))
                        {
                          
                          ?>
                          <tr>
                              <td><?php echo $a;?></td> 
                            <td><?php echo $row['case_num'];?></td>
                            <td><?php echo $row['employee_id'];?></td>
                            <td><?php echo $row['notes'];?></td>  
                            <td>
                                
                                <?php
                            if($row['severity']=="Normal"){
                            echo "<p  class='btn btn-success'>Normal</p>";   
                            }elseif($row['severity']=="Critical"){
                            echo "<p  class='btn btn-warning'>Critical</p>";
                            }else{
                            echo "<p  class='btn btn-danger'>Danger</p>";
                            }     
                            ?>  
                              
                              </td>
                            <td>
                  <a href="v_issue.php?edited=1&idx=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-times"></span> Remove</a> || <a href="#samstrover<?php echo $row['employee_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="fa fa-pencil"></span> View</a> 
                              </td>
                          </tr>
                          <?php
                         require('userInfos.php');
                            $a++;
                      }
                       

          
                      if (isset($_GET['idx']) && is_numeric($_GET['idx']))
                      {
                          $id = $_GET['idx'];
                          if ($stmt = $mysqli->prepare("DELETE FROM cases WHERE id = ? LIMIT 1"))
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
