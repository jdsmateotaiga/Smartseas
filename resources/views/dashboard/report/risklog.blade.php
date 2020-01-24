@if( count( $project->risk_logs(0)) )
    <div id="" class="bd mT-5">
          <table class="table table-striped risk-table mB-0" id="risklog">
              <thead class="thead-dark">
                  @php
                      $new_year = [];
                      foreach($project->risk_logs(0) as $risk) {
                              $get_risk_log = explode(',', $risk->risk_level);
                              foreach($get_risk_log as $year) {
                                  $get_year = explode('-', $year)[0];
                                  if( !in_array($get_year, $new_year) ) {
                                      array_push($new_year, $get_year);
                                  }
                              }
                      }
                      sort($new_year);
                  @endphp
                  <tr>
                      <th scope="col" rowspan="2" width="40" class="text-center">#</th>
                      <th scope="col" rowspan="2">Description</th>
                      <th scope="col" rowspan="2">Date Identified</th>
                      <th scope="col" rowspan="2">Type</th>
                      <th scope="col" rowspan="2">Countermeasures/Management Response</th>
                      <th scope="col" rowspan="2">Owner</th>
                      <th scope="col" rowspan="2">Submitted, updated by</th>
                      <th scope="col" rowspan="2">Last Update</th>
                      <th scope="col" rowspan="2">Status</th>
                      <th scope="col" colspan="{{ count($new_year) }}" class="text-center">Risk Level</th>
                  </tr>
                  <tr>
                      @foreach($new_year as $year)
                          <th>{{ $year }}</th>
                      @endforeach
                  </tr>
              </thead>
              <tbody>
                  @php $count = 1; @endphp
                  @foreach($project->risk_logs(0) as $risk)
                      <tr>
                          <td class="text-center">{{ $count++ }}</td>
                          <td>{{ $risk->description }}</td>
                          <td>{{ $risk->date_identified }}</td>
                          <td>{{ $risk->type }}</td>
                          <td>{{ $risk->response }}</td>
                          <td>{{ $risk->owner }}</td>
                          <td>{{ $risk->submitted_by }}</td>
                          <td>{{ $risk->last_update }}</td>
                          <td>{{ $risk->status }}</td>
                          @php $get_year = explode(',', $risk->risk_level); @endphp
                          @foreach($new_year as $year)
                          <td class="td-max">
                              @foreach($get_year as $d_y)
                                      @if( in_array($year, explode('-', $d_y) ) )
                                          <span class="bg-{{ explode('-', $d_y)[1] }}">&nbsp;</span>
                                      @endif
                              @endforeach
                          </td>
                          @endforeach
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
@else
  No active risk log!
@endif
