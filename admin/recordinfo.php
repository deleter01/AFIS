<div class="modal fade" id="samstrover<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Offender Information</h4></center>
                </div>
             <?php
					$pro=mysqli_query($mysqli,"select * from records where id='".$row['id']."'");
					$prow=mysqli_fetch_array($pro);
                    $tmp = $prow['tmp'];
				?>
				<div class="row">
                     <p class="text-center">Records No: <?php echo $prow['employee_id'];?></p>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#"  class="img-thumbnail">
                           <?php require('recordpropic.php');?> 
                        </a>
                        </div>
                     <div class="col-md-4"></div>
                </div>
                <form >
                <div class="modal-body">
	 
                    
                    <div class="row">
                    <div class="col-md-6">
                    <label>First Name</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['fname'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>Middle Name</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['mname'];?>" readonly>        
                    </div>    
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>SurName</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['surname'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>Age</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['age'];?>" readonly>        
                    </div>    
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>Eduction Level</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['education'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>Blood Group</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['b_groud'];?>" readonly>        
                    </div>    
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>Nationality</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['nationality'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>Gender</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['gender'];?>" readonly>        
                    </div>    
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                    <label>Residency</label> 
                    <input name="email" type="text" class="form-control" value="<?php echo $prow['residency'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>Place of Birth</label> 
                    <input name="phone" type="text" class="form-control" value="<?php echo $prow['p_birth'];?>" readonly>        
                    </div>    
                    </div>
                     <div class="row">
                   <div class="col-md-6">
                    <label>Date of Birth</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['d_birth'];?>" readonly>        
                    </div>
                    <div class="col-md-6">
                    <label>Kin Name</label> 
                    <input name="province" type="text" class="form-control" value="<?php echo $prow['kname'];?>" readonly>    
                    </div>
                    </div>
                     <div class="row">
                   <div class="col-md-6">
                    <label>Marrige Status</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['w_status'];?>" readonly>        
                    </div>
                    <div class="col-md-6">
                    <label>Phone Number</label> 
                    <input name="province" type="text" class="form-control" value="<?php echo $prow['p_no'];?>" readonly>    
                    </div>
                    </div>     
                     <div class="row">
                   <div class="col-md-6">
                    <label>Joined Date</label> 
                    <input name="gender" type="text" class="form-control" value="<?php echo $prow['joined'];?>" readonly>        
                    </div>
                    <div class="col-md-6">
                    <label>Travel History</label> 
                    <input name="province" type="text" class="form-control" value="<?php echo $prow['t_history'];?>" readonly>    
                    </div>
                    </div> 
                 <div class="line"></div>
				</div>
               
				 </form>
            </div>
        </div>
    </div>
