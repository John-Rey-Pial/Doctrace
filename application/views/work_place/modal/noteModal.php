<!-- The Modal -->
<div class="modal" id="noteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Leave Note</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <form action ="document/noteDocument" method="post">
        <input type="hidden" name="trance_id" value="" id="trance_id" class="form-control">
        <p>The note will be seen by the next office that will receive the document</p>
        <div class="form-group">
          <textarea class="form-control" name="note" id="note" cols="30" rows="3" maxlength="100"></textarea>
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