<div style="padding: 30px 20px;">
<img src="{{ $progress_report->owner->partner_admin_image }}" width="80" alt="" style="float: right">
<h3>{{ $progress_report->title }}</h3>
<p><i>Period: {{ $progress_report->reporting_date }}</i></p>
<table id="report_detail" style="margin-bottom: 1em; width: 100%">
  <tbody>
    <tr>
      <th>Project ID / Output ID:</th>
      <td>{{ $progress_report->project->project_id }}</td>
      <th>Reporting Date:</th>
      <td>{{ $progress_report->reporting_date }}</td>
    </tr>
    <tr>
      <th>Full Title:</th>
      <td colspan="3">
        @if ( auth()->user()->hasRole('partner') )
          <a href="{{ action('ProjectController@partnerShowProject', Helper::encrypt_id($progress_report->project->id)) }}">
            {{ $progress_report->project->title }}
          </a>
        @else
          <a href="{{ route('project.show', ['id' => Helper::encrypt_id($progress_report->project->id)]) }}">
            {{ $progress_report->project->title }}
          </a>
        @endif
      </td>
    </tr>
    <tr>
      <th>Start Date:</th>
      <td>{{ $progress_report->project->start_date }}</td>
      <th>Completion Date:</th>
      <td>{{ $progress_report->project->completion_date }}</td>
    </tr>
    <tr>
      <th>Total Project Fund:<small>(and fund revisions, if any)</small></th>
      <td>{{ $progress_report->project->total_project_fund }}</td>
      <th>AWP Budget:</th>
      <td>{{ $progress_report->project->awp_budget }}</td>
    </tr>
    <tr>
      <th>Implementing Partner:</th>
      <td colspan="3">{{ $progress_report->project->implementing_partner }}</td>
    </tr>
    <tr>
      <th>Donor/s:</th>
      <td colspan="3">{{ $progress_report->project->donors }}</td>
    </tr>
    <tr>
      <th>Responsible Partner/s:</th>
      <td colspan="3">
        @foreach($users as $partner)
          {{ $partner->partner_name }}<br>
        @endforeach
      </td>
    </tr>
  </tbody>
  </table>
</div>
