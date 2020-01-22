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
                <input type="hidden" name="project_id" id="pro_project_id" value="">
                <input type="hidden" name="outcome_id" id="pro_outcome_id" value="">
                <input type="hidden" name="output_id" id="pro_output_id" value="">
                <div class="form-group">
                    <label for="indicator">Project Output Indicator/s</label>
                    <textarea id="indicator" name="indicator" class="form-control" autofocus ></textarea>
                </div>
                <div class="form-group">
                  <label for="year">Start Date</label>
                  <select class="form-control" id="year" name="year" required autoComplete="off">
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
                    <textarea id="baseline" name="baseline" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="quarter_milestone">Quarter Milestone</label>
                    <textarea id="quarter_milestone" name="quarter_milestone" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="annual_target">Annual Target</label>
                    <textarea id="annual_target" name="annual_target" class="form-control" ></textarea>
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
