<div class="mL-20">
    <div class="mT-30 mB-10">
        <div class="layer w-100 text-left">
            <h4 class="lh-1 mB-5 lib vam">
              @if(auth()->user()->hasRole('admin'))
                Submitted Progress Report from Partners
              @else
                Progress Report
              @endif
            </h4>&nbsp;
            <a href="#create-progress-report"
            data-toggle="modal"
            data-target="#create-progress-report"
            class="modal-create btn btn-small btn-success pX-5 pY-2">
                <i class="ti-plus"></i>
            </a>
        </div>
    </div>

    @if( count( $project->progress_reports) )
        <div id="" class="bd mT-5">
            <table class="table table-striped risk-table mB-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" width="40" class="text-center">#</th>
                        @if(auth()->user()->hasRole('admin'))
                          <th scope="col">Owner</th>
                        @endif
                        <th scope="col">Title</th>
                        <th scope="col">Reporting Date</th>
                        <th scope="col">Indicative/Emerging Results of the Project</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                  @php $count = 1; @endphp
                  @foreach($project->progress_reports as $progress_report)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            @if(auth()->user()->hasRole('admin'))
                              <td>{{ $progress_report->owner->partner_name }}</td>
                            @endif
                            <td><a href="{{ route('progress_report.show', ['id' => Helper::encrypt_id($progress_report->id)]) }}">{{ Helper::the_excerpt($progress_report->title, 50) }}</a></td>
                            <td>{{ $progress_report->reporting_date }}</td>
                            <td>{{ Helper::the_excerpt($progress_report->results, 50) }}</td>
                            <td>
                              <a class="lib btn btn-primary mL-10 modal-edit"
                                  data-toggle="modal"
                                  data-target="#edit-progress-report"
                                  href="#edit-progress-report"
                                  data-edit-url="{{ action('ProgressReportController@edit', ['id'=> Helper::encrypt_id($progress_report->id) ])}}"
                                  data-action-url="{{ action('ProgressReportController@update', ['id'=> Helper::encrypt_id($progress_report->id) ])}}">
                                  <span class="ti-pencil"></span>
                              </a>
                              <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProgressReportController@deactivate', [ 'id'=> Helper::encrypt_id($progress_report->id)] )}}" method="post">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-danger" title="deactivate this report"  onclick="return confirm('Are you sure you want to deactivate this report?');"><i class="ti-trash"></i></button>
                              </form>
                            </td>
                        </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    @else
      No submitted report available!
    @endif
</div>
@include('dashboard.project.progress-report.create')
@include('dashboard.project.progress-report.edit')
