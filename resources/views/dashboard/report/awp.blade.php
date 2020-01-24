@if( count($project->outcomes) )
  <div style="width: 100%;">

    @php $outcome_count = 0; @endphp
    @foreach($project->outcomes as $outcome)
    @php $outcome_count++; @endphp
    <div class="mB-20">
      <p style="background-color: #000; color: #fff; padding: 7px 10px;" class="mB-0">Outcome {{ $outcome_count }}.
        <a href="{{ route('outcome.show', ['id'=> Helper::encrypt_id($outcome->id)]) }}">
          {{ $outcome->title }}
        </a>
      </p>
      @php $output_count = 0; @endphp
      @foreach($outcome->outputs as $output)
        @php $output_count++; @endphp
        <p style="background-color: #008000; color: #fff; padding: 7px 10px;" class="mB-0">Output {{ $outcome_count }}.{{ $output_count }}
          <a href="{{ route('output.show', ['id'=> Helper::encrypt_id($output->id)]) }}">
            {{ $output->title }}
          </a>
        </p>
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
                <td rowspan={{ $activity->tasks->count() + 1 }}>Activity {{ $outcome_count }}.{{ $output_count }}.{{ $activity_count }}
                  <a href="{{ route('activity.show', ['id'=> Helper::encrypt_id($activity->id)]) }}">
                    {{ $activity->title }}
                  </a>
                </td>
                <td rowspan={{ $activity->tasks->count() + 1 }}>{{ $activity->deliverables }}</td>

            </tr>
            @foreach($activity->tasks as $task)
            <tr>
                @php
                  $quarter = explode(',', $task->timeline);
                @endphp
                <th  style="@if( in_array('1', $quarter) ) background-color: yellow @endif">&nbsp;</th>
                <th  style="@if( in_array('2', $quarter) ) background-color: yellow @endif">&nbsp;</th>
                <th  style="@if( in_array('3', $quarter) ) background-color: yellow @endif">&nbsp;</th>
                <th  style="@if( in_array('4', $quarter) ) background-color: yellow @endif">&nbsp;</th>
                <td  align="center">{{ $task->user->partner_code }}</td>
                <td  align="center">{{ $task->fund_source }}</td>
                <td  align="center">{{ $task->budget_code->code }}</td>
                <td  align="center">{{ $task->description }}</td>
                <td  align="center">{{ $task->amount }}</td>
            </tr>
            @endforeach
          @endforeach
        </table>
      @endforeach
    </div>
    @endforeach

</div>
@else
  No AWP!
@endif
