<!-- The Modal -->
<div class="modal" id="userModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=base_url('register');?>" method="post">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="office_id">Office</label>
                        <select name="office_id" id="office_id" class="form-control"></select>
                    </div>
                </div>
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