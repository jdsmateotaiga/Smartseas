<div class="modal fade" id="edit-progress-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Progress Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Progress Report Title</label>
                    <input type="text" id="edit_title" name="title" class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <label for="reporting_date">Reporting Date</label>
                    <input type="text" id="edit_reporting_date" name="reporting_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="results">Indicative/Emerging Results of the Project</label>
                    <textarea name="results" id="edit_results" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="technical_accomplishments">Technical Accomplishments</label>
                    <textarea name="technical_accomplishments" id="edit_technical_accomplishments" class="form-control" rows="5"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Edit Progress Report</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
