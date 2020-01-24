@if( count($project->outcomes) )
  <table class="table table-striped risk-table mB-0" id="summary">
    <thead class="thead-dark">
      <tr>
        <th>Outcome</th>
        <th>In Pesos (PHP)</th>
        <th>Percent share to total</th>
      </tr>
    </thead>
    <tbody>
      @php
        $total_cost = 0;
        $arr = [];
        $count = 1;
        foreach($project->outcomes as $outcome) {
          $cost = 0;
          foreach($outcome->tasks as $task) {
              $get_task_month = $task->month;
              $get_item = explode(',', $get_task_month);
              foreach($get_item as $month) {
                $cost_per_month = explode('-', $month)[2];
                if($cost_per_month != '') {
                    $cost = $cost + (double)$cost_per_month;
                }
              }
          }
          $total_cost = $total_cost + $cost;
          $set = [
            'cost' => $cost,
            'title' => $outcome->title
          ];
          array_push($arr,$set);
        }
      @endphp
      @foreach($arr as $item)
        <tr>
          <td>{{ $count++ }}. {{ $item['title'] }}</td>
          <td>{{ number_format($item['cost'], 2, '.', ',') }}</td>
          @php $percentage = round(($item['cost'] / $total_cost) * 100, 2); @endphp
          <td>{{ $percentage }}%</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
          <td>Total</td>
          <td>{{ number_format($total_cost, 2, '.', ',') }}</td>
          <td>100%</td>
    </tfoot>
</table>
@else
  No Summary!
@endif
