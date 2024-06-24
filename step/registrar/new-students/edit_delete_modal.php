<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    option{
        font-family: 'Poppins', sans-serif;
    }
</style>
<div class="modal fade" id="addsection_<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add New Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <form method="POST" action="code.php">


                    <div class="form-group">
                        <label class="form-group"> Course </label>
                        <input type="text" name="course" id="course" class="form-control" value="<?php echo $student['course_name']; ?>" readonly>

                    </div>
                    <div class="form-group">
                        <label class="form-group"> Year Level </label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo $student['year_name']; ?>" readonly>
                        <input type="hidden" name="year_id" id="year_id" class="form-control" value="<?php echo $student['year_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Name of Section | ex: N or A</label>
                        <input type="" name="sections" id="sections" class="form-control" placeholder="Enter New Section" required>
                    </div>
                    <div class="form-group">
                        <label>Section Code | ex: BSIT 1 N</label>
                        <input type="" name="section_code" id="section_code" class="form-control" placeholder="Enter Section Code" required>
                    </div>





                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary"> Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->


<!-- Delete -->