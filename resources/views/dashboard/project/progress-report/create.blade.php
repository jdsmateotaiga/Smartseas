<div class="modal fade" id="create-progress-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="{{ action('RiskLogController@store') }}" method="POST">
        {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Risk Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="project_id" value="{{ Helper::encrypt_id($project->id) }}">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" autofocus ></textarea>
                </div>
                <div class="form-group">
                    <label for="date_identified">Date Identified</label>
                    <select class="form-control" id="date_identified" name="date_identified" >
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
                    <label for="type">Type</label>
                    <input type="text" id="type" name="type" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="response">Countermeasures/Management Response</label>
                    <textarea id="response" name="response" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="owner">Owner</label>
                    <input type="text" id="owner" name="owner" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="submitted_by">Submitted, Updated by</label>
                    <input type="text" id="submitted_by" name="submitted_by" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="last_update">Last Update</label>
                    <input type="text" id="last_update" name="last_update" class="form-control" autoComplete="off">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <textarea id="status" name="status" class="form-control" ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Create Risk Log</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
          </div>
      </form>
    </div>
</div>
