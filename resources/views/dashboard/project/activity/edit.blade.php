<div class="modal fade" id="edit-activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
          <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="form-group">
              <label for="edit_activity_title">Activity/Sub-Activity Description</label>
              <input type="text" id="edit_activity_title" name="title" class="form-control" required>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="edit_activity_start_date">Start Date</label>
                      <select class="form-control" id="edit_activity_start_date" name="start_date" required autoComplete="off">
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
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="edit_activity_end_date">End Date</label>
                      <select class="form-control" id="edit_activity_end_date" name="end_date" required autoComplete="off">
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
              </div>
          </div>
          <div class="form-group">
            <label for="">Activity/Sub-Activity Deliverables</label>
            <textarea class="form-control" placeholder="" id="edit_activity_deliverables" name="deliverables" rows="3"></textarea>
          </div>

      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Activity</button>
          <a class="btn btn-secondary" data-dismiss="modal">Close</a>
      </div>
  </div>
      </form>
    </div>
</div>
