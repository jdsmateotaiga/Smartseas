<div class="modal fade" id="create-output" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('OutputController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Output</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" value="{{ Helper::encrypt_id($outcome->project->id) }}">
                <input type="hidden" name="outcome_id" value="{{ Helper::encrypt_id($outcome->id) }}">
                <div class="form-group">
                    <label for="output_title">Output Title</label>
                    <input type="text" id="output_title" name="title" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" placeholder="Output Description" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Create Output</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
