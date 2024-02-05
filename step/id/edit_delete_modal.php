<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    option{
        font-family: 'Poppins', sans-serif;
    }
</style>
<div class="modal fade" id="id_<?php echo  $student['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
            <div class="">
                 <form action="edit_PDO.php<?php echo '?id='.$id; ?>&<?php echo 'id_number='.$id_number; ?>" method="POST" enctype="multipart/form-data">
                            <?php if($qrcode['picture'] != ""): ?>
                                <div class="col-md-12">
                            <img src="uploads/<?php echo $qrcode['picture']; ?>" width="100px" height="100px" >
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





 
<!-- Delete -->


 
<!-- Delete -->






















