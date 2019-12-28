<div class="modal fade" id="edit-outcome" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Outcome</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_outcome_title">Outcome Title</label>
                    <input type="text" id="edit_outcome_title" name="title" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="edit_outcome_description" placeholder="Outcome Description" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Outcome</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
