<div class="modal fade" id="create-output-indicator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('ProgressReportOutputController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project Output Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" value="{{ Helper::encrypt_id($progress_report->project->id) }}">
                <input type="hidden" name="outcome_id" value="{{ Helper::encrypt_id($outcome->id) }}">
                <input type="hidden" name="output_id" value="{{ Helper::encrypt_id($output->id) }}">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" autofocus ></textarea>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" id="type" name="type" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="response">Countermeasures/Management Response</label>
                    <textarea id="response" name="response" class="form-control" ></textarea>
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
