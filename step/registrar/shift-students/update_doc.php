    
<div class="modal fade" id="update_<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Document</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form method="POST" action="update.php?id_number=<?php echo $student['id_number']; ?>">

            
            <div class="form-group">
                            <label class="form-group"> ID Number </label>
                            <input type="text" name="id_number" id="id_number" class="form-control"
                                value="<?php echo $row['id_number']; ?>" readonly>
                        </div>
            <div class="form-group">
                            <label class="form-group"> Name </label>
                            <input type="text" name="" id="" class="form-control"
                                value="<?php echo $row['lname']; ?>, <?php echo $row['fname']; ?> <?php echo $row['mname']; ?>" readonly>
                        </div>
                        <br>
            <div class="form-group">
                
                    <h4 class="form-group" style="text-align: center;"> Documents </h4>
                            <input type="text" name="nso" id="nso" class="form-control"
                                placeholder="NSO" value="" readonly style="background: aliceblue;">
                                <br>
                            <section class="radio-section">

                                <div class="radio-list">
                                    <div class="radio-item">
                                        <input type="hidden" name="nso" id="nso" value="<?php echo $row['nso']; ?>">
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="nso" id="nso" value="Available">
                                        <label for="radio1">Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="nso" id="nso" value="Not Available">
                                        <label for="radio2">Not Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="nso" id="nso" value="On Procces">
                                        <label for="radio3">On Procces</label>
                                    </div>
                                </div>
                            </section>
                        </div>
            <div class="form-group">
                            <input type="text" name="" id="" class="form-control"
                                placeholder="CARD" readonly style="background: aliceblue;"><br>
                            <section class="radio-section">

                                <div class="radio-list">
                                    <div class="radio-item">
                                        <input type="hidden" name="card" id="card" value="<?php echo $row['card']; ?>">
                                        <input type="radio" name="card" id="card" value="Available">
                                        <label for="radio1">Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="card" id="card" value="Not Available">
                                        <label for="radio2">Not Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="card" id="card" value="On Procces">
                                        <label for="radio3">On Procces</label>
                                    </div>
                                </div>
                            </section>
                        </div>
            <div class="form-group">
                            <input type="text" name="" id="" class="form-control"
                                placeholder="Good Moral" readonly style="background: aliceblue;"><br>
                            <section class="radio-section">

                                <div class="radio-list">
                                    <div class="radio-item">
                                        <input type="hidden" name="good_moral" id="good_moral" value="<?php echo $row['good_moral']; ?>">
                                        <input type="radio" name="good_moral" id="good_moral" value="Available">
                                        <label for="radio1">Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="good_moral" id="good_moral" value="Not Available">
                                        <label for="radio2">Not Available</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="good_moral" id="good_moral" value="On Procces">
                                        <label for="radio3">On Procces</label>
                                    </div>
                                </div>
                            </section>
                        </div>
            
                    

                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary"> Update</a>
        </form>
      </div>
    </div>
  </div>
</div>