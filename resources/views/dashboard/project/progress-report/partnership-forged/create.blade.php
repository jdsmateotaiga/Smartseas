<div class="modal fade" id="create-partnership-forged" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('ProgressReportPartnershipForgedController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Partnership Forged</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" value="{{ Helper::encrypt_id($project->id) }}">
                <input type="hidden" name="progress_report_id" value="{{ Helper::encrypt_id($progress_report->id) }}">
                <div class="form-group">
                    <label for="pf_name">Name of partner</label>
                    <input type="text" id="pf_name" name="name" class="form-control" autofocus >
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" id="pf_type" name="type" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="pf_description">Description of partnership and how it has contributed to project results or sustainability</label>
                    <textarea id="pf_description" name="description" class="form-control" ></textarea>
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
