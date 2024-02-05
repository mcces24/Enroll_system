<div class="modal fade" id="view_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">View Users Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST">
                        <div class="form-group">
                            <label class="form-group"> Name </label>
                            <input  type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row['name']; ?>"  readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input  type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row['username']; ?>"  readonly>
                        </div>

                        <div class="form-group" style="color: red;" >
                            <label class="form-group"> Password </label>
                            <input style="color: red;" type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row['password']; ?>"  readonly>

                        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->

<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="edit.php">

            
                        <div class="form-group">
                            <label class="form-group"> User ID Number </label>
                            <input type="text" name="users_id" id="users_id" class="form-control"
                                value="<?php echo $row['id']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Users Name </label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Password </label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>">
                        </div>

            
            
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary"> Update</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->

<div class="modal fade" id="edit1_" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="add.php">

            
                        <div class="form-group">
                            <label class="form-group"> Users Name </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input type="email" name="username" id="username" class="form-control" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Password </label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Enter User Name">

                        </div>

                        <div class="form-group">
                            <label class="form-group"> Role </label>
                            <select class="form-control" name="role" id="role">
                                <option selected disabled>Select Role</option>
                                <option value="Guidance Office">Guidance Office</option>
                                <option value="BSIT Portal">BSIT Portal</option>
                                <option value="BSBA Portal">BSBA Portal</option>
                                <option value="BSHM Portal">BSHM Portal</option>
                                <option value="BSED Portal">BSED Portal</option>
                                <option value="BEED Portal">BEED Portal</option>
                                <option value="Registrar Office">Registrar Office</option>
                                <option value="ID Section">ID Section</option>
                                <option value="COR Section">COR Section</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Address </label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter User Address">

                        </div>

                        <div class="form-group">
                            <label class="form-group"> Contact </label>
                            <input type="number" name="contact" id="address" class="form-control" placeholder="Enter User Contact">

                        </div>

                        <div class="form-group">
                            <label class="form-group"> Department </label>
                            <input type="text" name="department" id="department" class="form-control" placeholder="Enter User Department">

                        </div>

                        <div class="form-group">
                            <label class="form-group"> Stutus </label>
                            <select class="form-control" name="status" id="status">
                                <option selected disabled>Select Status</option>
                                <option value="Portal Admin">Portal Admin</option>
                                <option value="Sub Admin">Sub Admin</option>
                                <option value="Assistant">Assistant</option>
                           </select>
                        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary"> Add Portal Users</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Delete Portal Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center">Are you sure you want to Delete</p>
            <h2 class="text-center"><?php echo $row['name'].''; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    option{
        font-family: 'Poppins', sans-serif;
    }
</style>
<div class="modal fade" id="id_<?php echo  $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
            <div class="">
                 <form action="edit_PDO.php?id=<?php echo  $row['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?php if($row['profile'] != ""): ?>
                                <div class="col-md-12">
                            <img src="uploads/<?php echo $row['profile']; ?>" width="100px" height="100px" >
                            </div>
                            <?php else: ?>
                                <div class="col-md-12">
                            <p>2x2 ID Picture</p>
                            </div>
                            <?php endif; ?>
                            <div>
                                <div class="form-group">
                                    <input class="form-control" type="file" name="image"  required>
                                </div>
                        
            </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="image" class="btn btn-danger">Upload Image</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>





 

















<div class="modal fade" id="viewadmin_<?php echo $row1['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">View Users Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST">
                        <div class="form-group">
                            <label class="form-group"> Name </label>
                            <input  type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row1['name']; ?>"  readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input  type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row1['email']; ?>"  readonly>
                        </div>

                        <div class="form-group" style="color: red;" >
                            <label class="form-group"> Password *this is md5 type </label>
                            <input style="color: red;" type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row1['password']; ?>"  readonly>

                        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->

<div class="modal fade" id="editadmin_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="edit.php">

            
                        <div class="form-group">
                            <label class="form-group"> User ID Number </label>
                            <input type="text" name="users_id" id="users_id" class="form-control"
                                value="<?php echo $row['id']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Users Name </label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Password </label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>">
                        </div>

            
            
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary"> Update</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->

<div class="modal fade" id="edit1admin_" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="add.php">

            
                        <div class="form-group">
                            <label class="form-group"> Users Name </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Username </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter User Name">
                        </div>

                        <div class="form-group">
                            <label class="form-group"> Password </label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Enter User Name">

                        </div>

                        <div class="form-group">
                            <label class="form-group"> Role </label>
                            <select class="form-control" name="role" id="role">
                                <option selected disabled>Select Role</option>
                                <option value="Guidance Office">Guidance Office</option>
                                <option value="BSIT Portal">BSIT Portal</option>
                                <option value="BSBA Portal">BSBA Portal</option>
                                <option value="BSHM Portal">BSHM Portal</option>
                                <option value="BSED Portal">BSED Portal</option>
                                <option value="BEED Portal">BEED Portal</option>
                                <option value="Registrar Office">Registrar Office</option>
                                <option value="ID Section">ID Section</option>
                                <option value="COR Section">COR Section</option>
                           </select>
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary"> Add Portal Users</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>


<!-- Delete -->
<div class="modal fade" id="deleteadmin_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Delete Portal Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center">Are you sure you want to Delete</p>
            <h2 class="text-center"><?php echo $row['name'].''; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    option{
        font-family: 'Poppins', sans-serif;
    }
</style>
<div class="modal fade" id="idadmin_<?php echo  $row1['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
            <div class="">
                 <form action="edit_PDO.php?id=<?php echo  $row1['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?php if($row1['profile'] != ""): ?>
                                <div class="col-md-12">
                            <img src="uploads/<?php echo $row1['profile']; ?>" width="100px" height="100px" >
                            </div>
                            <?php else: ?>
                                <div class="col-md-12">
                            <p>2x2 ID Picture</p>
                            </div>
                            <?php endif; ?>
                            <div>
                                <div class="form-group">
                                    <input class="form-control" type="file" name="image"  required>
                                </div>
                        
            </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="imageadmin" class="btn btn-danger">Upload Image</button>
    </div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>





 
<!-- Delete -->


 
<!-- Delete -->





















































































