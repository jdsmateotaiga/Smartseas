<div class="mL-20">
    <div class="mT-30 mB-10">
        <div class="layer w-100 text-left">
        <h4 class="lh-1 mB-5 lib vam">Project Risk Log</h4>&nbsp;
        <a href="#create-risk-log"
        data-toggle="modal"
        data-target="#create-risk-log"
        class="modal-create btn btn-small btn-success pX-5 pY-2">
            <i class="ti-plus"></i>
        </a>
        </div>
    </div>
    @if( count( $project->risk_logs) )
        <div id="" class="bd mT-5">
            <table class="table table-striped risk-table mB-0">
                <thead class="thead-dark">
                    @php
                        $new_year = [];
                        foreach($project->risk_logs as $risk) {
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
                        <th scope="col" rowspan="2">Action</th>
                    </tr>
                    <tr>
                        @foreach($new_year as $year)
                            <th>{{ $year }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach($project->risk_logs as $risk)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            <td>{{ Helper::the_excerpt($risk->description, 50) }}</td>
                            <td>{{ $risk->date_identified }}</td>
                            <td>{{ $risk->type }}</td>
                            <td>{{ Helper::the_excerpt($risk->response, 50) }}</td>
                            <td>{{ $risk->owner }}</td>
                            <td>{{ $risk->submitted_by }}</td>
                            <td>{{ $risk->last_update }}</td>
                            <td>{{ Helper::the_excerpt($risk->status, 50) }}</td>
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
                            <td>
                            <a class="lib btn btn-primary mL-10 modal-edit"
                                data-toggle="modal"
                                data-target="#edit-risk-log"
                                href="#edit-risk-log"
                                data-edit-url="{{ action('RiskLogController@edit', ['id'=> Helper::encrypt_id($risk->id) ])}}"
                                data-action-url="{{ action('RiskLogController@update', ['id'=> Helper::encrypt_id($risk->id) ])}}">
                                <span class="ti-pencil"></span>
                            </a>
                            <form style="display: inline-block; vertical-align: middle;" action="{{ action('RiskLogController@deactivate', [ 'id'=> Helper::encrypt_id($risk->id)] )}}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger" title="deactivate this risk log"  onclick="return confirm('Are you sure you want to deactivate this risk log?');"><i class="ti-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
      No active risk log!
    @endif
</div>
@include('dashboard.project.risk-log.create')
@include('dashboard.project.risk-log.edit')
