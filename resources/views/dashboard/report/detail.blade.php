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
            </thead>
          </table>
          </div>
          <p style="background-color: #fbd1a2; color: #000; padding: 7px 10px;" class="mB-0">Activity {{ $outcome_count }}.{{ $output_count }}.{{ $activity_count }}
            <a href="{{ route('activity.show', ['id'=> Helper::encrypt_id($activity->id)]) }}">
              {{ $activity->title }}
            </a>
          </p>
          @endforeach
      @endforeach
    </div>
    @endforeach
</div>
