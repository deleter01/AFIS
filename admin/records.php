<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../header/header.php') ?>
<div class="dir">
    
        <a href="dashboard.html">Home</a> <i class="fa fa-chevron-right"></i><label>Records</lable>
    
</div>
<div class="line"></div>
<div class="cards">     
                      <?php
                            if(isset($mysqli,$_POST['submit'])){

                              $f_name = mysqli_real_escape_string($mysqli,$_POST['fname']);
                              $m_name = mysqli_real_escape_string($mysqli,$_POST['surname']);
                              $s_name = mysqli_real_escape_string($mysqli,$_POST['surname']);
                              $age = mysqli_real_escape_string($mysqli,$_POST['age']);
                              $l_education = mysqli_real_escape_string($mysqli,$_POST['education']); 
                              $bgroup = mysqli_real_escape_string($mysqli,$_POST['blgroup']);
                              $national = mysqli_real_escape_string($mysqli,$_POST['national']);
                              $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);
                             // $residacy = mysqli_real_escape_string($mysqli,$_POST['residancy']); 
                              $pbirth = mysqli_real_escape_string($mysqli,$_POST['pfbirth']);
                              $dbirth = mysqli_real_escape_string($mysqli,$_POST['dfbirth']);
                              $kname = mysqli_real_escape_string($mysqli,$_POST['kin']);
                              $m_status = mysqli_real_escape_string($mysqli,$_POST['mgstatus']); 
                              $phon = mysqli_real_escape_string($mysqli,$_POST['phone']);
                              $kin_phon = mysqli_real_escape_string($mysqli,$_POST['kphone']);
                              $phone = '255'.$phon;
                              $kinphone = '255'.$kin_phon;
                             // $employee_id = mysqli_real_escape_string($mysqli,$_POST['empid']); 
                              $notes = mysqli_real_escape_string($mysqli,$_POST['notes']);
                              $joined = date(" d M Y ");
    

                            $sql_n = "SELECT * FROM records WHERE p_no ='$phone'";
                            $res_n = mysqli_query($mysqli, $sql_n);
                            if(mysqli_num_rows($res_n) > 0){
                            ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the phone is already allocated to someone';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO records(fname,mname,surname,age,education,b_group,nationality,gender,p_birth,d_birth,kname,w_status,p_no,t_history,joined,k_phone_no)
                                    VALUES('$f_name','$m_name','$s_name','$age','$l_education','$bgroup','$national','$gender','$pbirth','$dbirth','$kname','$m_status','$phone','$notes','$joined','$kinphone')";
                
                        $results = mysqli_query($mysqli,$sql);
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for adding new records';?></div>
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
    <div class="panel-heading"><label>Add New Offender </label>
      <span style="float:right"><a href="picrecinf.php"  class="btn btn-info"><span class="fa fa-plu"></span> Add Pictures</a>
      <a href="#"  class="btn btn-info"><span class="fa fa-plu"></span> Add Finger Print</a></span>
    </div>
      <div class="panel-body">
        <form method="post" action="records.php" enctype="multipart/form-data">
          <div class="row form-group">
            <div class="col-lg-6">
              <label>First Name</label>
                  <input type="text" class="form-control" name="fname" pattern="[A-Za-z]{3,}" required>
              </div> 
            <div class="col-lg-6">
              <label>Midname</label>
                  <input type="text" class="form-control" name="mname" pattern="[A-Za-z]{2,}" required>
           </div>    
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Surname</label>
                  <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" required>
              </div>
            <div class="col-lg-6">
              <label>Age</label>
                  <input type="text" class="form-control" name="age" pattern="[0-9]{,3}" required>
            </div>   
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Level of Education:</label>
                <select class="form-control" name="education">
                  <option>Std 7</option>
                  <option>O-level</option>
                  <option>A-level</option>
                  <option>University</option> 
                  <option>No Education</option>      
                </select>
            </div>
            <div class="col-lg-6">
              <label>Blood Group:</label>
                <select class="form-control" name="blgroup">
                  <option>Group A</option>
                  <option>Group B</option>
                  <option>Group O</option>       
                </select>
            </div>   
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Nationality:</label>
                <select class="form-control" name="national">
                  <option>Tanzania</option>
                  <option>Uganda</option>
                  <option>Kenya</option>       
                </select>
            </div>
            <div class="col-lg-6">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option>F</option>
                  <option>M</option>      
                </select>
            </div>     
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Place of Birth:</label>
                  <input type="text" class="form-control" name="pfbirth" pattern="[A-Za-z]{3,}" required>
            </div>
            <div class="col-lg-6">
              <label>Date of Birth:</label>
                <input type="date" class="form-control" name="dfbirth" pattern="[0-9]" required>
            </div>     
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Kin Name:</label>
                <input type="text" class="form-control" name="kin" pattern="[A-Za-z]{3,}" required>
            </div>  
            <div class="col-lg-6">
              <label>Kin Phone No:</label>
              <input type="text" class="form-control" name="kphone" pattern="[0-9]{9}" placeholder="773452120">
            </div>  
          </div>
          <div class="row form-group">
            <div class="col-lg-6">
              <label>Marital Status:</label>
                <select class="form-control" name="mgstatus">
                  <option>Marriage</option>
                  <option>Single</option>  
                  <option>Divorced</option>     
                </select>
            </div> 
            <div class="col-lg-6">
              <label> Offender Phone No:</label>
                <input type="text" class="form-control" name="phone" pattern="[0-9]{9}" placeholder="773452120">
            </div>   
          </div>
            
          <div class="row form-group">    
            <div class="col-lg-12">
              <label>Travel History:</label>
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
</div>
</div>
</div>
          <?php include('../header/footer.php') ?>
            
</div>
        <script src="assets/js/jquery-1.10.2.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
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
