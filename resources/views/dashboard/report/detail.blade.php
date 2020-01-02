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
          @php $activity_count = 0; @endphp
          @foreach($output->activities as $activity)
          @php $activity_count++; @endphp
          <div  id="detail_awp">
            <table>
            <thead>
              <tr>
                <th colspan=2>Planned Activities</th>
                <th colspan=13>Physical Target</th>
                <th colspan=19>Financial Target</th>
              </tr>
              <tr>
                <th rowspan=3>Activity Description</th>
                <th rowspan=3>Deliverables</th>
                <th rowspan=3>Unit of Measurement</th>
                <th colspan=13>Physical Target</th>
                <th rowspan=3>Responsible Party</th>
                <th rowspan=3>Funding Source</th>
                <th colspan=2>Budget</th>
                <th rowspan=3>Unit Cost (PhP)</th>
                <th colspan=12>Amount (PhP)</th>
                <th rowspan=3>Total</th>
              </tr>
              <tr>
                <th colspan=3>1st Quarter</th>
                <th colspan=3>2nd Quarter</th>
                <th colspan=3>3rd Quarter</th>
                <th colspan=3>4th Quarter</th>
                <th rowspan=2>Total</th>
                <th rowspan=2>Code</th>
                <th rowspan=2>Description</th>
                <th colspan=3>1st Quarter</th>
                <th colspan=3>2nd Quarter</th>
                <th colspan=3>3rd Quarter</th>
                <th colspan=3>4th Quarter</th>
              </tr>
              <tr>
                <th>J</th>
                <th>F</th>
                <th>M</th>
                <th>A</th>
                <th>M</th>
                <th>J</th>
                <th>J</th>
                <th>A</th>
                <th>S</th>
                <th>O</th>
                <th>D</th>
                <th>N</th>

                <th>J</th>
                <th>F</th>
                <th>M</th>
                <th>A</th>
                <th>M</th>
                <th>J</th>
                <th>J</th>
                <th>A</th>
                <th>S</th>
                <th>O</th>
                <th>N</th>
                <th>D</th>
              </tr>
              <tr>
                <td colspan=34 style="background-color: #fbd1a2; color: #000; padding: 7px 10px;">
                  <a href="{{ route('activity.show', ['id'=> Helper::encrypt_id($activity->id)]) }}">
                    Activity {{ $outcome_count }}.{{ $output_count }}.{{ $activity_count }} {{ $activity->title }}
                  </a>
                </td>
              </tr>
            </thead>
            <tbody>
              @foreach($activity->tasks as $task)
              <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->deliverables }}</td>
                <td>{{ $task->unit_of_measurement->unit }}</td>
                @php
                  $month_count_cost = explode(',', $task->month);  
                  $total_count = 0;
                  $total_cost = 0;
                @endphp
                @foreach($month_count_cost as $item)
                  @php $total_count = $total_count + (double)explode('-', $item)[1]; @endphp
                  <td class="text-center">{{ explode('-', $item)[1] }}</td>
                @endforeach
                <td class="text-center">{{ $total_count }}</td>
                <td class="text-center">{{ $task->user->partner_code }}</td>
                <td class="text-center">{{ $task->fund_source }}</td>
                <td class="text-center">{{ $task->budget_code->code }}</td>
                <td class="text-center">{{ $task->budget_code->description }}</td>
                <td class="text-center">{{ $task->unit_cost }}</td>
                @foreach($month_count_cost as $item)
                  @php
                    $total_cost = $total_cost + (double)explode('-', $item)[2];
                    $cost_per_month = number_format((double)explode('-', $item)[2], 2, '.', ',')
                  @endphp
                  <td class="text-center">@if($cost_per_month != 0) {{ $cost_per_month }}  @endif</td>
                @endforeach
                <td class="text-center fW-b">{{  number_format($total_cost, 2, '.', ',') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>

          @endforeach
      @endforeach
    </div>
    @endforeach
</div>
