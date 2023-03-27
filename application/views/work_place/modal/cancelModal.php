<!-- The Modal -->
<div class="modal" id="cancelModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cancel Document</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <form action ="document/cancelDocument" method="post">
        <input type="hidden" name="document_id" value="" id="document_id" class="form-control">
        <p>By Clicking Done, the file will be cancelled and will no longer be accessible and could not be viewed by other offices. Are you sure you want to cancel the document? </p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="submit" class="btn btn-primary">Done <i class="fa fa-save"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
