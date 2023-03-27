<!-- The Modal -->
<div class="modal" id="doneModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Keep Document</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <form action ="document/doneDocument" method="post">
        <input type="hidden" name="trace_id" value="" id="trace_id" class="form-control">
        <p>By Clicking Done, you are obliged to keep the hard copy of the document. Are you sure you want to keep the file? </p>
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