<div class="modal fade" id="edit-activity-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project Output Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="edit_pra_status">Status of Activity</label>
                  <select id="edit_pra_status" name="status" class="form-control risk-level" required>
                      <option value="0">Low</option>
                      <option value="1">Medium</option>
                      <option value="2">High</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="edit_pra_accomplishment">Accomplishment for the Quarter</label>
                    <textarea id="edit_pra_accomplishment" name="accomplishment" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_pra_challenges">REMARKS <br>Challenges / Bottlenecks and plans to address them / Lessons Learned</label>
                    <textarea id="edit_pra_challenges" name="challenges" class="form-control" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Create</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
