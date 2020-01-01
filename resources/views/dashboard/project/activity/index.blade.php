@if ( !auth()->user()->hasRole('partner') )
  <div class="mT-30 mL-20 mB-10">
      <div class="layer w-100 text-left">
        <h4 class="lh-1 mB-5 lib vam">Activity List</h4>&nbsp;
        <a href="#create-activity"
        data-toggle="modal"
        data-target="#create-activity"
        data-project_id="{{ Helper::encrypt_id($output->project->id) }}"
        data-outcome_id="{{ Helper::encrypt_id($output->outcome->id) }}"
        data-output_id="{{ Helper::encrypt_id($output->id) }}"
        class="modal-create btn btn-success pX-5 pY-2 create-activity">
          <i class="ti-plus"></i>
        </a>
      </div>
  </div>
  @include('dashboard.project.activity.create')
  @include('dashboard.project.activity.edit')
@endif
 @if( !$output->activities->isEmpty() )
  <div id="activity-container" class="listing mL-20">
  @php $count = 0; @endphp
    @foreach( $output->activities as $activity )
        @if($activity->active == 1)
          @php $count++; @endphp
          <div class="bgc-white p-10 bd mT-5">
              <h5 class="lh-1 mB-15 lib">@if(isset($_GET['count']))<span class="small bold">{{ $_GET['count'] }}.{{ $count }}</span>@endif {{ $activity->title }}</h5>
              @if ( auth()->user()->hasRole('partner') )
                <a href="{{ action('ActivityController@partnerShowActivity', Helper::encrypt_id($activity->id)) }}" title="View this Activity"><i class="c-green-500 ti-eye"></i></a>
              @endif
              @if( !auth()->user()->hasRole('partner') )
                <a href="{{ route('activity.show', ['id' => Helper::encrypt_id($activity->id)]) }}" title="View this Activity"><i class="c-green-500 ti-eye"></i></a>
                <a class="lib mL-10 modal-edit"
                data-toggle="modal"
                data-target="#edit-activity"
                href="#edit-activity"
                data-edit-url="{{ action('ActivityController@edit', ['id'=> Helper::encrypt_id($activity->id) ])}}"
                data-action-url="{{ action('ActivityController@update', ['id'=> Helper::encrypt_id($activity->id) ])}}">
                  <i class="c-blue-500 ti-pencil-alt"></i>
                </a>
                <form style="display: inline-block; vertical-align: middle;" action="{{ action('ActivityController@deactivate', [ 'id'=> Helper::encrypt_id($activity->id)] )}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger del"  onclick="return confirm('Are you sure you want to remove this activity?');"><i class="ti-trash"></i></button>
                </form>
              @endif
              <div class="row">
                  <p class="col-sm-6 mB-0"><strong>Deliverables: </strong> {{ $activity->deliverables }}</p>
                  <p class="col-sm-6 mB-0"><strong>Description: </strong>{{ Helper::the_excerpt($activity->description, 20) }} @if ( strlen($activity->description) > 20 ) <a href="#modal" data-toggle="modal" data-target="#modal" data-content="{{ $activity->description }}" data-title="{{ $activity->title }}" class="see-more">see more</a> @endif</p>
                  <p class="col-sm-6 mB-0"><strong>Start Date: </strong> {{ $activity->start_date }}</p>
                  <p class="col-sm-6 mB-0"><strong>End Date: </strong> {{ $activity->end_date }}</p>
              </div>

          </div>
        @endif
    @endforeach
    </div>
@else
    <div class="bgc-white p-20 bd mT-20 mL-20">
      <h5 class="lh-1 center mB-0">No Activity Available</h5>
    </div>
@endif
