<div class="mL-20">
    <div class="mT-30 mB-10">
        <div class="layer w-100 text-left">
        <h5 class="lh-1 mB-5 lib vam">E. IEC and Knowledge Management</h5>&nbsp;
          <a href="#create-management"
          data-toggle="modal"
          data-target="#create-management"
          class="modal-create btn btn-small btn-success pX-5 pY-2">
              <i class="ti-plus"></i>
          </a>
        </div>
    </div>
    @if( count( $project->progress_report_management($progress_report->id)) )
        <div id="" class="bd mT-5">
            <table class="table table-striped risk-table mB-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" width="40" class="text-center">#</th>
                        <th scope="col">IEC/Knowledge Product</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date Published/Produced</th>
                        <th scope="col">Target Audience</th>
                        <th scope="col">Link <small>(if available)</small></th>
                        <th scope="col" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach($project->progress_report_management($progress_report->id) as $management)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            <td>{{ $management->product }}</td>
                            <td>{{ $management->type }}</td>
                            <td>{{ $management->published }}</td>
                            <td>{{ $management->audience }}</td>
                            <td>{{ $management->link }}</td>
                            <td>
                              <a class="lib btn btn-primary mL-10 modal-edit"
                                  data-toggle="modal"
                                  data-target="#edit-management"
                                  href="#edit-management"
                                  data-edit-url="{{ action('ProgressReportManagementController@edit', ['id'=> Helper::encrypt_id($management->id) ])}}"
                                  data-action-url="{{ action('ProgressReportManagementController@update', ['id'=> Helper::encrypt_id($management->id) ])}}">
                                  <span class="ti-pencil"></span>
                              </a>
                              <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProgressReportManagementController@destroy', [ 'id'=> Helper::encrypt_id($management->id)] )}}" method="post">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger" title="deactivate this item"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="ti-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
      <p>No IEC and Knowledge Management!</p>
    @endif
  @include('dashboard.project.progress-report.management.create')
  @include('dashboard.project.progress-report.management.edit')
</div>
