<div class="modal fade" id="samstrover1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Offender Picture</h4></center>
                </div>
             <?php
					$pro=mysqli_query($mysqli,"select * from records where id='".$row['id']."'");
					$prow=mysqli_fetch_array($pro);
                    $tmp = $prow['tmp'];
				?>

                <form >
                <div class="modal-body">

                    <div class="row">
                        <p class="text-center">Offender No: <?php echo $prow['employee_id'];?></p>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <a href="#"  class="img-thumbnail">
                           <?php require('recordpropic.php');?> 
                        </a>  
                        </div>
                        <div class="col-md-4">
                        <a href="#"  class="img-thumbnail">
                           <?php require('recordpropic.php');?> 
                        </a>  
                        </div>
                        <div class="col-md-4">
                        <a href="#"  class="img-thumbnail">
                           <?php require('recordpropic.php');?> 
                        </a>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <label>Thumb Finger</label> 
                        <input type="file" class="form-control" name="file" required>  
                        </div>
                        <div class="col-md-4">
                        <label>Index Finger</label> 
                        <input type="file" class="form-control" name="file" required>       
                        </div>
                        <div class="col-md-4">
                        <label>Middle Finger</label> 
                        <input type="file" class="form-control" name="file" required>   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#"  class="img-thumbnail">
                            <?php require('recordpropic.php');?> 
                            </a>  
                        </div>
                        <div class="col-md-4">
                            <a href="#"  class="img-thumbnail">
                            <?php require('recordpropic.php');?> 
                            </a>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                        <label>Ring Finger</label> 
                        <input type="file" class="form-control" name="file" required>       
                        </div>
                        <div class="col-md-4">
                        <label>Little Finger</label> 
                        <input type="file" class="form-control" name="file" required>   
                        </div>
                    </div>  

                    <div class="row"><br></div>
                    <div class="row">
                        <center><button type="submit" class="btn btn-info">Upload Picture</button></center>
                    </div>  
                    <div class="row"><br></div>
                    
                 <div class="line"></div>
				</div>
               
				 </form>
            </div>
        </div>
    </div>
