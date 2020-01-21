<div class="modal fade" id="edit-output-indicator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project Output Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="indicator">Project Output Indicator/s</label>
                    <textarea id="edit_output_indicator" name="indicator" class="form-control" autofocus ></textarea>
                </div>
                <div class="form-group">
                  <label for="year">Start Date</label>
                  <select class="form-control" id="edit_output_year" name="year" required autoComplete="off">
                      <option disabled selected>Choose Year</option>
                      @php
                        for($i = 2010; $i <= 2100; $i++) {
                      @endphp
                          <option value="{{ $i }}">{{ $i }}</option>
                      @php
                        }
                      @endphp
                  </select>
                </div>
                <div class="form-group">
                    <label for="baseline">Baseline</label>
                    <textarea id="edit_output_baseline" name="baseline" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="quarter_milestone">Quarter Milestone</label>
                    <textarea id="edit_output_quarter_milestone" name="quarter_milestone" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="annual_target">Annual Target</label>
                    <textarea id="edit_output_annual_target" name="annual_target" class="form-control" ></textarea>
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
