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
                <div class="form-group">
                    <label for="edit_task_unit_cost">Unit Cost $</label>
                    <input type="text" id="edit_task_unit_cost" name="unit_cost" class="form-control" required>
                </div>

                <!-- <div class="form-group">
                  <label for="edit_task_task_status">Risk Status</label>
                  <select class="form-control" name="status" id="edit_task_task_status" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="edit_unit_measurement">Unit of Measurement</label>
                  <select class="form-control" name="unit_measurement" id="edit_unit_measurement">
                    <option selected disabled>Please Select</option>
                    @foreach($unit_measurement as $item)
                      <option value="{{ $item->id }}">{{ $item->unit }} - {{ $item->description }}</option>
                    @endforeach
                  </select>
                </div>
                <hr>
                <h6>Planned Budget</h6>
                <div class="form-group">
                    <label for="edit_task_code_id">Code</label>
                    <select id="edit_task_code_id" name="code_id" class="form-control">
                        <option selected disabled>Please Select</option>
                        @foreach($code as $item)
                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->description }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <h6>Timeline</h6>
                <div class="row timeline">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="q-1">Quarter 1</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-1" name="q-1" value="1">
                          <table class="month-table">
                            <tr>
                                <td width="10%"><label for="edit_m-1">Jan</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-1" name="m-1" value="1">
                                  <div class="m-sub">
                                    <input type="number" class="t-count form-control" id="edit_n-1" name="n-1" min="1" placeholder="Count" >
                                    <input type="number" class="t-cost form-control" id="edit_c-1" name="c-1" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-2">Feb</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-2" name="m-2" value="2">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-2" name="n-2" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-2" name="c-2" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="m-3">Mar</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-3" name="m-3" value="3">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-3" name="n-3" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-3" name="c-3" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="q-2">Quarter 2</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-2" name="q-2" value="2">
                          <table class="month-table">
                            <tr>
                                <td width="10%"><label for="edit_m-4">Apr</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-4" name="m-4" value="4">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-4" name="n-4" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-4" name="c-4" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-5">May</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-5" name="m-5" value="5">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-5" name="n-5" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-5" name="c-5" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-6">Jun</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-6" name="m-6" value="6">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-6" name="n-6" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-6" name="c-6" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="q-3">Quarter 3</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-3" name="q-3" value="3">
                          <table class="month-table">
                            <tr>
                                <td width="10%"><label for="edit_m-7">Jul</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-7" name="m-7" value="7">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-7" name="n-7" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-7" name="c-7" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-8">Aug</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-8" name="m-8" value="8">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-8" name="n-8" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-8" name="c-8" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-9">Sep</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-9" name="m-9" value="9">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-9" name="n-9" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-9" name="c-9" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                          </table>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="q-4">Quarter 4</label>
                          <input type="checkbox" class="form-control" id="edit_task_q-4" name="q-4" value="4">
                          <table class="month-table">
                            <tr>
                                <td width="10%"><label for="edit_m-10">Oct</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-10" name="m-10" value="10">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-10" name="n-10" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-10" name="c-10" min="1" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-11">Nov</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-11" name="m-11" value="11">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-11" name="n-11" min="1" placeholder="Count">
                                  <input type="number" class="t-cost form-control" id="edit_c-11" name="c-11" placeholder="Cost">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="10%"><label for="edit_m-12">Dec</label></td>
                                <td width="90%">
                                  <input type="checkbox" class="form-control t-month" id="edit_m-12" name="m-12" value="12">
                                  <div class="m-sub">
                                  <input type="number" class="t-count form-control" id="edit_n-12" name="n-12" min="1" placeholder="Count" >
                                  <input type="number" class="t-cost form-control" id="edit_c-12" name="c-12"  min="1" placeholder="Cost">
                                  </div>
                                </td>
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
