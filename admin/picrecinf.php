<?php require_once('includes/session.php');
      require_once('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../header/header.php') ?>
<style>
.img-thumbnail {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 400px; /* Set a small width */
  height: 250px;
}

/* Add a hover effect (blue shadow) */
.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>
<div class="dir">
        <a href="dashboard.html">Home</a> <i class="fa fa-chevron-right"></i><a href="records.php">Records</a> <i class="fa fa-chevron-right"></i><label>Pictures</lable>   
</div>
<div class="line"></div>
<div class="cards">
<?php
                    if(isset($mysqli,$_POST['upload'])){
                        
                        $tmp = rand(1,9999);
                        $tmp1 = rand(1,9999);
                        $tmp2 = rand(1,9999);
                        $file = $_FILES['file'];
                        $file1 = $_FILES['file1'];
                        $file2 = $_FILES['file2'];
                        $fileTmpName = $file['tmp_name'];
                        $fileTmpName1 = $file1['tmp_name'];
                        $fileTmpName2 = $file2['tmp_name'];

                        $fileName =$file['name'];
                        $fileName1 =$file1['name'];
                        $fileName2 =$file2['name'];

                        $fileSize = $file['size'];
                        $fileSize1 = $file1['size'];
                        $fileSize2 = $file2['size'];

                        $fileError = $file['error'];
                        $fileError1 = $file1['error'];
                        $fileError2 = $file2['error'];

                        $fileType = $file['type'];
                        $fileType1 = $file['type'];
                        $fileType2 = $file['type'];

                        $fileExt = explode('.', $fileName);
                        $fileExt1 = explode('.', $fileName1);
                        $fileExt2 = explode('.', $fileName2);

                        $fileActualExt = strtolower(end($fileExt));
                        $fileActualExt1 = strtolower(end($fileExt1));
                        $fileActualExt2 = strtolower(end($fileExt2));

                        $allowed = array('jpg','jpeg','png');

                       $sql = "UPDATE records SET tmp ='$tmp'";
                    

                        $results = mysqli_query($mysqli,$sql);

                        if((in_array($fileActualExt, $allowed)) && (in_array($fileActualExt1, $allowed)) && (in_array($fileActualExt2, $allowed))){
                        if(($fileError === 0) && ($fileError1 === 0) && ($fileError2 === 0)){
                        if(($fileSize < 3000000) && ($fileSize1 < 3000000) && ($fileSize2 < 3000000)){

                            $fileNameNew = "pic".$tmp.".".$fileActualExt;
                            $fileNameNew1 = "pic".$tmp1.".".$fileActualExt1;
                            $fileNameNew2 = "pic".$tmp2.".".$fileActualExt2;

                            $fileDestination ='assets/image/uploads/'.$fileNameNew;
                            $fileDestination1 ='assets/image/uploads/'.$fileNameNew1;
                            $fileDestination2 ='assets/image/uploads/'.$fileNameNew2;

                            move_uploaded_file($fileTmpName, $fileDestination);
                            move_uploaded_file($fileTmpName1, $fileDestination1);
                            move_uploaded_file($fileTmpName2, $fileDestination2);

                            $sqli = "INSERT INTO picture(name,name1,name2,tmp,tmp1,tmp2)
                            VALUES('$fileNameNew','$fileNameNew1','$fileNameNew2','$tmp','$tmp1','$tmp2')";
                            $results1 = mysqli_query($mysqli,$sqli);
                        }
                    }
                }

                     if($results==1){
                         if($results1==1){
                              ?>

                            <div class="alert alert-success strover animated bounce" id="sams1">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong> Successfully! </strong><?php echo'Picure uploaded successfully';?></div>
                            <?php
                         }else{
                            ?>
                                <div class="alert alert-danger samuel animated shake" id="sams1">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong> Danger! </strong><?php echo'OOPS Picture is not uploaded';?></div>
                        <?php } 
                    }else{
                    ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'OOPS something went wrong';?></div>
            
                        <?php    
                          }      
                 
                        }
                 $query=mysqli_query($mysqli,"select *from `records` ");
                     while($row=mysqli_fetch_array($query))
                        {
					$pro=mysqli_query($mysqli,"select * from records where id='".$row['id']."'");
					$prow=mysqli_fetch_array($pro);
                    $tmp_r = $prow['tmp'];
                    $id = $prow['id'];
                        
                    $pro1=mysqli_query($mysqli,"select * from picture");
					$prow1=mysqli_fetch_array($pro1);
                    $tmp_p = $prow1['tmp'];
                    $tmp1 = $prow1['tmp1'];
                    $tmp2 = $prow1['tmp2'];
                        }
                    
				?>


<div class="panel panel-default sammacmedia">
    <div class="panel-heading"><center><h4 class="modal-title" id="myModalLabel">Offender Picture</h4></center></div>
      <div class="panel-body">
        <form action="picrecinf.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="row">
                        <p class="text-center">Offender No: <?php echo $id;?></p>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-thumbnail">
                            <?php
                            if(isset($mysqli,$_POST['upload'])){ 
                                if($tmp_r = $tmp_p){
                                 $sql ="SELECT * FROM records WHERE tmp='$tmp_r'";
                                 $res = mysqli_query($mysqli,$sql);
                                 if(mysqli_num_rows($res) > 0){
                                     while($row = mysqli_fetch_assoc($res)){
                                         $id = $row['id'];
                                         $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp_r'";
                                         $resImg = mysqli_query($mysqli,$sqlImg);
                                         while($rowImg = mysqli_fetch_assoc($resImg)){
                                                 echo "<img src='assets/image/uploads/user".$tmp.".jpg' style = 'width:290px; height:240px'>";
                                            
                                         }
                                     }
                                 }
                                }
                            }
                                            
                            ?>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="img-thumbnail">
                           <?php 
                                 $sql ="SELECT * FROM records WHERE tmp='$tmp_r'";
                                 $res = mysqli_query($mysqli,$sql);
                                 if(mysqli_num_rows($res) > 0){
                                     while($row = mysqli_fetch_assoc($res)){
                                         $id = $row['id'];
                                         $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp1'";
                                         $resImg = mysqli_query($mysqli,$sqlImg);
                                         while($rowImg = mysqli_fetch_assoc($resImg)){
                                                 echo "<img src='assets/image/uploads/user".$tmp1.".jpg' style = 'width:290px; height:240px'>";
                                            
                                         }
                                     }
                                 }
                           ?> 
                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-thumbnail">
                           <?php 
                             $sql ="SELECT * FROM records WHERE tmp='$tmp_r'";
                             $res = mysqli_query($mysqli,$sql);
                             if(mysqli_num_rows($res) > 0){
                                 while($row = mysqli_fetch_assoc($res)){
                                     $id = $row['id'];
                                     $sqlImg ="SELECT * FROM picture WHERE tmp='$tmp2'";
                                     $resImg = mysqli_query($mysqli,$sqlImg);
                                     while($rowImg = mysqli_fetch_assoc($resImg)){
                                             echo "<img src='assets/image/uploads/user".$tmp2.".jpg' style = 'width:290px; height:240px'>";
                                        
                                     }
                                 }
                             }

                    
                           ?>
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <label>Right Side</label> 
                        <input type="file" class="form-control" name="file1" >
                        </div>
                        <div class="col-md-4">
                        <label>Middle </label> 
                        <input type="file" class="form-control" name="file" >       
                        </div>
                        <div class="col-md-4">
                        <label>Left Side</label> 
                        <input type="file" class="form-control" name="file2">   
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">
                        <center><button type="submit" name="upload" class="btn btn-info">Upload Picture</button></center>
                    </div>
                    <div class="row"><br></div>
                    
                 <div class="line"></div>
				</div>
               
				 </form>
                 
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
            
