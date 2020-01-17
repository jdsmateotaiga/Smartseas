<div style="padding: 0 20px;">
<h3>{{ $project->title }}</h3>
<table id="report_detail" style="margin-bottom: 1em; width: 100% ">
  <tr>
    <th>Project ID: </th>
    <td>{{ $project->project_id }}</td>
  </tr>
  <tr>
    <th>Award ID:</th>
    <td>{{ $project->award_id }}</td>
  </tr>
  <tr>
    <th>Responsible Partners:</th>
    <td>
      @foreach($users as $partner)
        {{ $partner->partner_name }}<br>
      @endforeach
    </td>
  </tr>
  <tr>
    <th>Start Date: </th>
    <td>{{ $project->start_date }}</td>
  </tr>
  <tr>
    <th>Completion Date:</th>
    <td>{{ $project->completion_date }}</td>
  </tr>
  <tr>
    <th>Implementing Partner:</th>
    <td>{{ $project->implementing_partner }}</td>
  </tr>
  <tr>
    <th>Project Objective:</th>
    <td>{{ $project->objective }}</td>
  </tr>
</table>
</div>
