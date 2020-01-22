<table style="width: 100%;">
  <thead>
    <tr>
      <th rowspan="2">Activity/Sub-activity <br>Description</th>
      <th rowspan="2">Activity/Sub-activity <br>Deliverables</th>
      <th colspan="2">Physical Performance</th>
      <th rowspan="2">REMARKS <br>Challenges / Bottlenecks and plans to address them / Lessons Learned</th>
      <th rowspan="2">Actions</th>
    </tr>
    <tr>
      <th>Status of Activity</th>
      <th>Status Update/<br>Accomplishment for the Quarter</th>
    </tr>
  </thead>
  <tbody>
      @foreach($output->activities as $activity)
        <tr>
            <td>{{ $activity->title }}</td>
            <td>{{ $activity->deliverables }}</td>
            @if($activity->activity_report)
              @php
                $risk_class = '';
                if($activity->activity_report->status == 0) {
                  $risk_class = 'bg-low';
                } else if ($activity->activity_report->status == 1) {
                  $risk_class = 'bg-medium';
                } else if ($activity->activity_report->status == 2) {
                  $risk_class  = 'bg-high';
                }
              @endphp
              <td class="{{ $risk_class }}">
                <span class="chip"></span>
              </td>
              <td>{{ $activity->activity_report->accomplishment }}</td>
              <td>{{ $activity->activity_report->challenges }}</td>
              <td>
                <a class="btn btn-primary modal-edit" data-toggle="modal" data-target="#edit-activity-report" href="#edit-activity-report"
                data-edit-url="{{ action('ProgressReportActivityController@edit', [ 'id' => Helper::encrypt_id($activity->activity_report->id) ]) }}"
                data-action-url="{{ action('ProgressReportActivityController@update', [ 'id' => Helper::encrypt_id($activity->activity_report->id) ]) }}"
                ><span class="ti-pencil"></span></a>
                <form style="display: inline-block;" action="{{ action('ProgressReportActivityController@destroy', [ 'id'=> Helper::encrypt_id($activity->activity_report->id)] )}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');"><span class="ti-trash"></span></button>
                </form>
              </td>
            @else
              <td colspan="4" class="text-center">
                <a href="#create-output-indicator"
                  data-toggle="modal"
                  data-target="#create-activity-report"
                  data-project_id="{{ Helper::encrypt_id($progress_report->project->id) }}"
                  data-outcome_id="{{ Helper::encrypt_id($outcome->id) }}"
                  data-output_id="{{ Helper::encrypt_id($output->id) }}"
                  data-activity_id="{{ Helper::encrypt_id($activity->id) }}"
                  class="modal-create btn btn-success pX-5 pY-2">
                    <i class="ti-plus"></i>
                  </a>
              </td>
            @endif
        </tr>
      @endforeach
  </tbody>
</table>
