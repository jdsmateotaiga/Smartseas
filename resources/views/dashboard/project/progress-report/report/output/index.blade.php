
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
  @include('dashboard.project.progress-report.report.output.edit')
@if(!$output->output_report->isEmpty())
  <div class="mB-10">
    <table style="width: 100% ">
      <thead>
          <tr>
            <th>Project Output Indicator/s</th>
            <th colspan="2">Baseline</th>
            <th>Quarter Milestone[2]</th>
            <th>Annual Target</th>
          </tr>
      </thead>
      <tbody>
          <tr colspan="5">

          </tr>
          <tr>
            <td>test</td>
            <td>2012</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
          </tr>
      </tbody>
    </table>
  </div>
@else
  No output indicator available!
@endif
