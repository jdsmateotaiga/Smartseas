<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ $project->title }}</title>
    <style media="screen">
      body {
        font-family:sans-serif;
        font-size: 14px;
      }
      th,td {
        padding: 5px 2px;
      }
      th {
        text-align: left;
        vertical-align: top;
      }
      p {
        margin: 0;
      }
      #activities table, #activities td, #activities th {
        border: 1px solid black;
        padding: 5px;
      }
      table {
        border-collapse: collapse;
      }
      #activities th {
        text-align: center;
        vertical-align: middle;
      }
    </style>
  </head>
  <body>
    <h3>{{ $project->title }}</h3>
    <table style="margin-bottom: 1em;">
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
<div style="width: 100%;">
  @php $outcome_count = 0; @endphp
  @foreach($project->outcomes as $outcome)
  @php $outcome_count++; @endphp
  <div>
    <p style="background-color: #000; color: #fff; padding: 7px 10px;">Outcome {{ $outcome_count }}. {{ $outcome->title }}</p>
    @php $output_count = 0; @endphp
    @foreach($outcome->outputs as $output)
      @php $output_count++; @endphp
      <p style="background-color: #008000; color: #fff; padding: 7px 10px;">Output {{ $outcome_count }}.{{ $output_count }} {{ $output->title }}</p>
      <table id="activities" width="100%">
        <tr>
          <th colspan=6>Planned Activities</th>
          <th colspan=5>Planned Budget</th>
        </tr>
        <tr>
          <th colspan=2>Activity/Sub-Activity</th>
          <th colspan=4>TIMEFRAME</th>
          <th rowspan=2>Responsible Party</th>
          <th rowspan=2>Funding Source</th>
          <th colspan=2>Budget</th>
          <th>Amount</th>
        </tr>
        <tr>
          <th>Description</th>
          <th>Deliverables</th>
          <th>Q1</th>
          <th>Q2</th>
          <th>Q3</th>
          <th>Q4</th>
          <th>Code</th>
          <th>Description</th>
          <th>USD</th>
        </tr>
        @php $activity_count = 0; @endphp
        @foreach($output->activities as $activity)
        @php $activity_count++; @endphp
          <tr>
              <td rowspan={{ $activity->tasks->count() + 1 }}>Activity {{ $outcome_count }}.{{ $output_count }}.{{ $activity_count }} {{ $activity->title }}</td>
              <td rowspan={{ $activity->tasks->count() + 1 }}>{{ $activity->deliverables }}</td>
          </tr>
          @foreach($activity->tasks as $task)
            <tr>
              @php
                $quarter = explode(',', $task->timeline);
              @endphp
              <th style="@if( in_array('1', $quarter) ) background-color: yellow @endif">&nbsp;</th>
              <th style="@if( in_array('2', $quarter) ) background-color: yellow @endif">&nbsp;</th>
              <th style="@if( in_array('3', $quarter) ) background-color: yellow @endif">&nbsp;</th>
              <th style="@if( in_array('4', $quarter) ) background-color: yellow @endif">&nbsp;</th>
              <td align="center">{{ $task->user->partner_code }}</td>
              <td align="center">{{ $task->fund_source }}</td>
              <td align="center">{{ $task->code->code }}</td>
              <td align="center">{{ $task->description }}</td>
              <td align="center">{{ $task->amount }}</td>
            </tr>
          @endforeach

        @endforeach

      </table>




    @endforeach
  </div>
  @endforeach
</div>

  </body>
</html>
