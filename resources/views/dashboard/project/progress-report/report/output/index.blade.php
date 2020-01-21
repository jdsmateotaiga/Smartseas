
  <div class="mT-10 mB-10">
    <div class="layer w-100 text-left">
      <h4 class="lh-1 mB-5 lib vam">Create Project Output Indicator</h4>&nbsp;
      <a href="#create-output-indicator"
      data-toggle="modal"
      data-target="#create-output-indicator"
      class="modal-create btn btn-success pX-5 pY-2">
        <i class="ti-plus"></i>
      </a>
    </div>
  </div>
  @include('dashboard.project.progress-report.report.output.create')
@if(!$output->output_report->isEmpty())
  <div class="mB-10">
    <table style="width: 100% ">
      <thead>
          <tr>
            <th class="text-center">Project Output Indicator/s</th>
            <th class="text-center" colspan="2">Baseline</th>
            <th class="text-center">Quarter Milestone</th>
            <th class="text-center">Annual Target</th>
            <th class="text-center">Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach($output->output_report as $output)
          <tr>
            <td>{{ $output->indicator }}</td>
            <td>{{ $output->year }}</td>
            <td>{{ $output->baseline }}</td>
            <td>{{ $output->quarter_milestone }}</td>
            <td>{{ $output->annual_target }}</td>
            <td>
              <a class="btn btn-primary modal-edit" data-toggle="modal" data-target="#edit-output-indicator" href="#edit-output-indicator"
              data-edit-url="{{ action('ProgressReportOutputController@edit', [ 'id' => Helper::encrypt_id($output->id) ]) }}"
              data-action-url="{{ action('ProgressReportOutputController@update', [ 'id' => Helper::encrypt_id($output->id) ]) }}"
              ><span class="ti-pencil"></span></a>
              <form style="display: inline-block;" action="{{ action('ProgressReportOutputController@destroy', [ 'id'=> Helper::encrypt_id($output->id)] )}}" method="post">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');"><span class="ti-trash"></span></button>
              </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@else
  No output indicator available!
@endif
