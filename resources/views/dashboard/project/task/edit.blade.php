<div class="modal fade" id="edit-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <form action="" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" id="edit_task_title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="deliverables">Deliverables</label>
                  <textarea type="text" id="edit_task_deliverables" name="deliverables" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_task_partner_id">Responsible Party</label>
                    <select class="form-control" name="partner_id" id="edit_task_partner_id" required>
                    @foreach($users as $partner)
                      <option value="{{ $partner->id }}">{{ $partner->partner_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_task_fund_source">Funding Source</label>
                    <input type="text" id="edit_task_fund_source" name="fund_source" class="form-control" required>
                </div>
                <h6>Planned Budget</h6>
                <div class="form-group">
                    <label for="edit_task_code_id">Code</label>
                    <select id="edit_task_code_id" name="code_id" class="form-control">
                        <option selected disabled>Please Select</option>
                        @foreach($code as $item)
                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_task_amount">Amount</label>
                    <input type="text" id="edit_task_amount" name="amount" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="edit_task_task_status">Risk Status</label>
                  <select class="form-control" name="status" id="edit_task_task_status" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="edit_unit_measurement">Unit of Measurement</label>
                  <select class="form-control" name="unit_measurement" id="edit_unit_measurement">
                    <option selected disabled>Please Select</option>
                    @foreach($unit_measurement as $item)
                      <option value="{{ $item->id }}">{{ $item->unit }} - {{ $item->description }}</option>
                    @endforeach
                  </select>
                </div>
                <h6>Timeline</h6>
                <div class="row timeline">
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="edit_task_q_1">Quarter 1</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-1" name="q-1" value="1">
                          <table class="month-table">
                            <tr>
                                <td><label for="edit_m-1">Jan</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-1" name="m-1" value="Jan"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-2">Feb</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-2" name="m-2" value="Feb"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-3">Mar</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-3" name="m-3" value="Mar"></td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="edit_task_q-2">Quarter 2</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-2" name="q-2" value="2">
                          <table class="month-table">
                            <tr>
                                <td><label for="edit_m-4">Apr</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-4" name="m-4" value="Apr"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-5">May</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-5" name="m-5" value="May"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-6">Jun</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-6" name="m-6" value="Jun"></td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="edit_task_q-3">Quarter 3</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-3" name="q-3" value="3">
                          <table class="month-table">
                            <tr>
                                <td><label for="edit_m-7">Jul</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-7" name="m-7" value="Jul"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-8">Aug</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-8" name="m-8" value="Aug"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-9">Sep</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-9" name="m-9" value="Sep"></td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="edit_task_q-4">Quarter 4</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-4" name="q-4" value="4">
                          <table class="month-table">
                            <tr>
                                <td><label for="edit_m-10">Oct</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-10" name="m-10" value="Oct"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-11">Nov</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-11" name="m-11" value="Nov"></td>
                            </tr>
                            <tr>
                                <td><label for="edit_m-12">Dec</label></td>
                                <td><input type="checkbox" class="form-control" id="edit_m-12" name="m-12" value="Dec"></td>
                            </tr>
                          </table>
                      </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Task</button>
                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
            </div>
        </div>
      </form>
    </div>
</div>
