@if ( !auth()->user()->hasRole('partner') )
  <div class="mT-30 mL-20 mB-10">
    <div class="layer w-100 text-left">
      <h4 class="lh-1 mB-5 lib vam">Outcome List</h4>&nbsp;
      <a href="#create-outcome"
      data-toggle="modal"
      data-target="#create-outcome"
      class="modal-create btn btn-small btn-success pX-5 pY-2">
        <i class="ti-plus"></i>
      </a>
    </div>
  </div>
  @include('dashboard.project.outcome.create')
  @include('dashboard.project.outcome.edit')
@endif
<div id="outcome-container" class="listing mL-20">
  @if( !$project->outcomes->isEmpty())
    @php $count = 0; @endphp
    @foreach( $project->outcomes as $outcome )
      @if($outcome->active == 1 || auth()->user()->hasRole('admin'))
        @php $count++; @endphp
        <div class="bgc-white p-10 bd mT-5" @if($outcome->active == 0) style="border-color: red!important;" @endif>
            <h5 class="lh-1 mB-5 lib"><span class="small bold">{{ $count }}</span>. {{ $outcome->title }}</h5>&nbsp;
            @if ( auth()->user()->hasRole('partner') )
              <a href="{{ action('OutcomeController@partnerShowOutcome', Helper::encrypt_id($outcome->id)) }}?count={{ $count }}" title="View this Outcome"><i class="c-green-500 ti-eye"></i></a>
            @endif
            @if( !auth()->user()->hasRole('partner') )
              <a href="{{ route('outcome.show', ['id' => Helper::encrypt_id($outcome->id)]) }}?count={{ $count }}" title="View this Outcome"><i class="c-green-500 ti-eye"></i></a>
              <a class="lib mL-10 modal-edit"
              data-toggle="modal"
              data-target="#edit-outcome"
              href="#edit-outcome"
              title="Edit this Outcome"
              data-edit-url="{{ action('OutcomeController@edit', ['id'=> Helper::encrypt_id($outcome->id) ])}}"
              data-action-url="{{ action('OutcomeController@update', ['id'=> Helper::encrypt_id($outcome->id) ])}}">
                <i class="c-blue-500 ti-pencil-alt"></i>
              </a>
              @if($outcome->active == 1)
              <form style="display: inline-block; vertical-align: middle;" action="{{ action('OutcomeController@deactivate', [ 'id'=> Helper::encrypt_id($outcome->id)] )}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger del" title="Dectivate this Outcome"  onclick="return confirm('Are you sure you want to remove this outcome?');"><i class="ti-trash"></i></button>
              </form>
              @else($outcome->active == 0)
              <form style="display: inline-block; vertical-align: middle;" action="{{ action('OutcomeController@activate', [ 'id'=> Helper::encrypt_id($outcome->id)] )}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-success act" title="Activate this Outcome"  onclick="return confirm('Are you sure you want to activate this outcome?');"><i class="c-green-500 ti-check"></i></button>
              </form>
              @endif
            @endif
            <div class="row">
                <p class="col-md-12 mB-0"><strong>Outcome Description: </strong>{{ Helper::the_excerpt($outcome->description, 20) }} @if ( strlen($outcome->description) > 20 ) <a href="#modal" data-toggle="modal" data-target="#modal" data-content="{{ $outcome->description }}" data-title="{{ $outcome->title }}" class="see-more">see more</a> @endif</p>
            </div>
        </div>
      @endif
    @endforeach
    @else
      <div class="bgc-white p-20 bd mT-20">
        <h5 class="lh-1 center mB-0">No Outcome Available</h5>
      </div>
    @endif
</div>
