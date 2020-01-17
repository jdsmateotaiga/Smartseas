<div class="pR-20 pL-20" style="width: 100%;">
    @php $outcome_count = 0; @endphp
    @foreach($progress_report->project->outcomes as $outcome)
    @php $outcome_count++; @endphp
    <div class="mB-20">
      <p style="background-color: #000; color: #fff; padding: 7px 10px;" class="mB-0">Outcome {{ $outcome_count }}.
        @if ( auth()->user()->hasRole('partner') )
          <a href="{{ action('OutcomeController@partnerShowOutcome', Helper::encrypt_id($outcome->id)) }}">
            {{ $outcome->title }}
          </a>
        @else
          <a href="{{ route('outcome.show', ['id' => Helper::encrypt_id($outcome->id)]) }}">
            {{ $outcome->title }}
          </a>
        @endif
      </p>
      @php $output_count = 0; @endphp
      @foreach($outcome->outputs as $output)
        @php $output_count++; @endphp
        <p style="background-color: #008000; color: #fff; padding: 7px 10px;" class="mB-0">Output {{ $outcome_count }}.{{ $output_count }}
          @if ( auth()->user()->hasRole('partner') )
            <a href="{{ action('OutputController@partnerShowOutput', Helper::encrypt_id($output->id)) }}">
              {{ $output->title }}
            </a>
          @else
            <a href="{{ route('output.show', ['id' => Helper::encrypt_id($output->id)]) }}">
              {{ $output->title }}
            </a>
          @endif
        </p>
        @include('dashboard.project.progress-report.report.output.index')
      @endforeach
    </div>
    @endforeach
</div>
