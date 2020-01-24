<div class="modal fade" id="create-management" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('ProgressReportManagementController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" value="{{ Helper::encrypt_id($project->id) }}">
                <input type="hidden" name="progress_report_id" value="{{ Helper::encrypt_id($progress_report->id) }}">
                <div class="form-group">
                    <label for="m_product">IEC/Knowledge Product</label>
                    <input type="text" id="m_product" name="product" class="form-control" autofocus >
                </div>
                <div class="form-group">
                    <label for="m_type">Type</label>
                    <input type="text" id="m_type" name="type" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="m_published">Date Published/Produced</label>
                    <input type="text" id="m_published" name="published" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="m_audience">Date Published/Produced</label>
                    <input type="text" id="m_audience" name="audience" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="m_link">Link <small>(if available)</small></label>
                    <input type="text" id="m_link" name="link" class="form-control" >
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
