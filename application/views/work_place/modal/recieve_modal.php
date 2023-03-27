<!-- The Modal -->
<div class="modal" id="receiveModal">
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
            Please input the corresponding Referral Code of the document. If the referral code was not found, please contact the Administrator
        </div>
        <p></p>
        <form action="<?=base_url('recieve_document');?>" method="post">

            <div class="form-group">
                 <label for="referral_code">Input Referral Code</label>
            </div>
            <input type="hidden" name="last_id" id="last_id" class="form-control">
            <div class="input-group mb-3">
                <input type="text" name="referral_code" id="referral_code" class="form-control">
                <input type="hidden" name="document_id" id="document_id" class="form-control">
                
                <div class="input-group-append">
                  <button type="button" class="input-group-text btn btn-primary" id="searchReferral"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div id="showContent"></div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
        <button type="submit" class="btn btn-primary" id="receiveButton" disabled>Recieve Document <i class="fa fa-save"></i></button>
      </div>
        </form>
    </div>
  </div>
</div>