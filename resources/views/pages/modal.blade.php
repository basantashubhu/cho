<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"  id="modalBody">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change website Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="/change-logo" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="websiteName" placeholder="Your website name">
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="file" id="file" />
            </div>                
            <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="save" value="Save Changes" class="btn btn-primary float-right">
            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
