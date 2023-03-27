<!-- The Modal -->
<div class="modal" id="outsideDocumentModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Outside Document</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <form action ="document/saveOutsideDocument" method="post">
        <input type="hidden" name="trance_id" value="" id="trance_id" class="form-control">
        <p>Outside documents are not included in our tracing system, but we can still log documents that are in/out of Cityhall</p>
        <div class="form-group">
          <label for="status">Select Action</label>
          <select name="status" id="status" class="form-control">
            <option value="0">IN</option>
            <option value="1">OUT</option>
          </select>
        </div>

        <div class="form-group">
            <label for="document">Document</label>
            <input type="text" name="document" id="document" class="form-control">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <div class="form-group">
            <label for="person">Sender/Receiver</label>
            <input type="text" name="person" id="person" class="form-control">
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
