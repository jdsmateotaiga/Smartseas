<div class="mL-20">
    <div class="mT-30 mB-10">
        <div class="layer w-100 text-left">
        <h5 class="lh-1 mB-5 lib vam">D. Partnership Forged</h5>&nbsp;
        <a href="#create-partnership-forged"
        data-toggle="modal"
        data-target="#create-partnership-forged"
        class="modal-create btn btn-small btn-success pX-5 pY-2">
            <i class="ti-plus"></i>
        </a>
        </div>
    </div>

    @if( count( $project->progress_report_partnership_forged($progress_report->id) ) )
        <div id="" class="bd mT-5">
            <table class="table table-striped risk-table mB-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" rowspan="2" width="40" class="text-center">#</th>
                        <th scope="col" rowspan="2">Name of Partner</th>
                        <th scope="col" rowspan="2">Type</th>
                        <th scope="col" rowspan="2">Description of partnership and how it has contributed to project results or sustainability</th>
                        <th scope="col" rowspan="2" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach($project->progress_report_partnership_forged($progress_report->id) as $partnership_forged)
                        <tr>
                            <td class="text-center">{{ $count++ }}</td>
                            <td>{{ $partnership_forged->name }}</td>
                            <td>{{ $partnership_forged->type }}</td>
                            <td>{{ $partnership_forged->description }}</td>
                            <td>
                            <a class="lib btn btn-primary mL-10 modal-edit"
                                data-toggle="modal"
                                data-target="#edit-partnership-forged"
                                href="#edit-partnership-forged"
                                data-edit-url="{{ action('ProgressReportPartnershipForgedController@edit', ['id'=> Helper::encrypt_id($partnership_forged->id) ])}}"
                                data-action-url="{{ action('ProgressReportPartnershipForgedController@update', ['id'=> Helper::encrypt_id($partnership_forged->id) ])}}">
                                <span class="ti-pencil"></span>
                            </a>
                            <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProgressReportPartnershipForgedController@destroy', [ 'id'=> Helper::encrypt_id($partnership_forged->id)] )}}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger" title="deactivate this risk log"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="ti-trash"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
      <p>No active Parnership Forged!</p>
    @endif

  @include('dashboard.project.progress-report.partnership-forged.create')
  @include('dashboard.project.progress-report.partnership-forged.edit')
</div>
