<div class="modal fade" id="edit-partnership-forged" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Partnership Forged</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_pf_name">Name of partner</label>
                    <input type="text" id="edit_pf_name" name="name" class="form-control" autofocus >
                </div>
                <div class="form-group">
                    <label for="edit_pf_type">Type</label>
                    <input type="text" id="edit_pf_type" name="type" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="edit_pf_description">Description of partnership and how it has contributed to project results or sustainability</label>
                    <textarea id="edit_pf_description" name="description" class="form-control" ></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Update</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
