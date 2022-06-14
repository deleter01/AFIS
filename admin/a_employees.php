<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../header/header.php') ?>
<div class="dir">
    
        <a href="dashboard.php">Home</a> <i class="fa fa-chevron-right"></i><label>Add Employee</lable>
    
</div>
<div class="line"></div>
    <div class="cards">
                
                      <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $name = mysqli_real_escape_string($mysqli,$_POST['fname']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);     
                            $joined = date(" d M Y ");
                            $employee_id = mysqli_real_escape_string($mysqli,$_POST['empid']); 
                            $sector = mysqli_real_escape_string($mysqli,$_POST['sect']);   
                            $tmp = rand(1,9999);
                            $phone = '255'.$phon;   
                            $file = $_FILES['file'];
                            $fileName =$file['name'];
                            $fileTmpName = $file['tmp_name'];
                            $fileSize = $file['size'];
                            $fileError = $file['error'];
                            $fileType = $file['type'];
                            $fileExt = explode('.', $fileName);
                            $fileActualExt = strtolower(end($fileExt));
                            $allowed = array('jpg','jpeg','png');
    

                            $sql_n = "SELECT * FROM employees WHERE phone ='$phone'";
                            $res_n = mysqli_query($mysqli, $sql_n);    
                            $sql_e = "SELECT * FROM employees WHERE email ='$email'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the email is already allocated to someone';?></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the phone is already allocated to someone';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO employees(name,surname,email,joined,gender,phone,tmp,employee_id,sector)VALUES('$name','$surname','$email','$joined','$gender','$phone','$tmp','$employee_id','$sector')";
                $results = mysqli_query($mysqli,$sql);
                if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                if($fileSize < 1000000){
                $fileNameNew = "user".$tmp.".".$fileActualExt;
                $fileDestination ='assets/image/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sqli = "INSERT INTO picture(name,tmp)VALUES('$fileNameNew','$tmp')";
                mysqli_query($mysqli,$sqli);
                //header('Location:acc.php');
                    }
                        }
                            }
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for adding new employee';?></div>
                        <?php

                          }else{
                                ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                 }
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <div class="panel-heading">Add New Employee</div>
        <div class="panel-body">
            <form method="post" action="a_employees.php" enctype="multipart/form-data">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Employee No</label>
              <input type="text" class="form-control" name="empid" >
            </div>  
             <div class="col-lg-6">
            <label>Sector</label>
              <input type="text" class="form-control" name="sect" pattern="[A-Za-z]{3,}" required>
            </div>  
        </div>
        <div class="row form-group">
          <div class="col-lg-6">
            <label>First Name</label>
              <input type="text" class="form-control" name="fname" pattern="[A-Za-z]{3,}" required>
            </div>  
             <div class="col-lg-6">
            <label>Surname</label>
              <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" required>
            </div>  
        </div>
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>  
             <div class="col-lg-6">
            <label>Phone</label>
              <input type="text" class="form-control" name="phone" pattern="[0-9]{9}" placeholder="773452120" required>
            </div>  
        </div>   
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Picture</label>
             <input type="file" class="form-control" name="file" required>
            </div>  
             <div class="col-lg-6">
            <label>Gender</label>
             <select class="form-control" name="gender">
              <option>F</option>
              <option>M</option>      
              </select>
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


         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
    </body>
</html>
