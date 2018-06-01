
  <div class="modal-dialog" role="document"  id="modalBody">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Amin Controller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="/add-new-admin" id="add-admin-form">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="email address">
            </div>
            <div class="form-group">
                <select class="form-control table-bordered" name="role" id="role" style="width: 50%;">
                  <option value="">Select</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                  <option value="super_admin">Super Admin</option>
                </select>
            </div>                
            <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="save" value="Save Changes" class="btn btn-primary float-right">
            </div>
        </form>
        
      </div>
    </div>
  </div>
