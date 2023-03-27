<!-- The Modal -->
<div class="modal" id="documentModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Document</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            You will be given a Referral Code after you saved the document. Please Attach it when passing the documents to other offices.
        </div>
        <p></p>
        <form action="<?=base_url('save_document');?>" method="post">

            <div class="form-group">
                 <label for="document">Document Title & Description</label>
                 <input type="text" name="document" id="document" class="form-control">
            </div>

            <div class="form-group">
                <input type="hidden" name="referral_code" id="referral_code" class="form-control">
            </div>

            <div class="form-group">
                <label for="document_type">Document Type</label>
                <select name="document_type" id="document_type" class="form-control"></select>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
      </div>
        </form>
    </div>
  </div>
</div>
