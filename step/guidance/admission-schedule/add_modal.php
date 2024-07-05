<div class="modal fade" id="sched_date" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Admission Test Date</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="add.php">



          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label ">Admission Test Date</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="sched_date" required>
            </div>
          </div>
          <div class="mb-3 row">

            <div class="col-sm-8">
              <input type="hidden" name="status" value="1">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="admission_sched" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admission_time" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Admission Test Time</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="add.php">
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label ">Time Start</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" name="sched_time_start" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label ">Time End</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" name="sched_time_stop" required>
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col-sm-8">
              <input type="hidden" name="status" value="1">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="sched_time_id" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
          </form>
      </div>
    </div>
  </div>
</div>