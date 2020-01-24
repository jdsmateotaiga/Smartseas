<div class="modal fade" id="create-activity-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('ProgressReportActivityController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" id="pra_project_id" value="">
                <input type="hidden" name="progress_report_id" id="pra_progress_report_id" value="">
                <input type="hidden" name="outcome_id" id="pra_outcome_id" value="">
                <input type="hidden" name="output_id" id="pra_output_id" value="">
                <input type="hidden" name="activity_id" id="pra_activity_id" value="">
                <div class="form-group">
                  <label for="status">Status of Activity</label>
                  <select name="status" id="status" class="form-control risk-level" required>
                      <option value="0">Low</option>
                      <option value="1">Medium</option>
                      <option value="2">High</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="accomplishment">Accomplishment for the Quarter</label>
                    <textarea id="accomplishment" name="accomplishment" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="challenges">REMARKS <br>Challenges / Bottlenecks and plans to address them / Lessons Learned</label>
                    <textarea id="challenges" name="challenges" class="form-control" ></textarea>
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
