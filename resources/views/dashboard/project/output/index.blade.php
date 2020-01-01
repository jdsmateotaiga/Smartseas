@if ( !auth()->user()->hasRole('partner') )
  <div class="mT-30 mL-20 mB-10">
    <div class="layer w-100 text-left">
      <h4 class="lh-1 mB-5 lib vam">Output List</h4>&nbsp;
      <a href="#create-output"
      data-toggle="modal"
      data-target="#create-output"
      class="modal-create btn btn-success pX-5 pY-2">
        <i class="ti-plus"></i>
      </a>
    </div>
  </div>
  @include('dashboard.project.output.create')
  @include('dashboard.project.output.edit')
@endif
<div id="output-container" class="listing mL-20">
  @if( !$outcome->outputs->isEmpty() )
    @php $count = 0; @endphp
    @foreach( $outcome->outputs as $output )
      @if($output->active == 1)
        @php $count++; @endphp
        <div class="bgc-white p-10 bd mT-5">
            <h5 class="lh-1 mB-5 lib">@if(isset($_GET['count'])) <span class="small bold">{{ $_GET['count'] }}.{{ $count }}</span> @endif {{ $output->title }}</h5>
            @if ( auth()->user()->hasRole('partner') )
              <a href="{{ action('OutputController@partnerShowOutput', Helper::encrypt_id($output->id)) }}@if(isset($_GET['count'])) ?count={{ $_GET['count'] }}.{{ $count }} @endif" title="View this Output"><i class="c-green-500 ti-eye"></i></a>
            @endif
            @if( !auth()->user()->hasRole('partner') )
              <a href="{{ route('output.show', ['id' => Helper::encrypt_id($output->id)]) }}@if(isset($_GET['count']))?count={{ $_GET['count'] }}.{{ $count }} @endif" title="View this Output"><i class="c-green-500 ti-eye"></i></a>
              <a class="lib mL-10 modal-edit"
              data-toggle="modal"
              data-target="#edit-output"
              href="#edit-output"
              data-edit-url="{{ action('OutputController@edit', ['id'=> Helper::encrypt_id($output->id) ])}}"
              data-action-url="{{ action('OutputController@update', ['id'=> Helper::encrypt_id($output->id) ])}}">
                <i class="c-blue-500 ti-pencil-alt"></i>
              </a>
              <form style="display: inline-block; vertical-align: middle;" action="{{ action('OutputController@deactivate', [ 'id'=> Helper::encrypt_id($output->id)] )}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger del"  onclick="return confirm('Are you sure you want to remove this output?');"><i class="ti-trash"></i></button>
              </form>
            @endif
            <div class="row">
                <p class="col-md-12 mB-0"><strong>Output Description: </strong>
                {{ Helper::the_excerpt($output->description, 20) }}
                @if ( strlen($output->description) > 20 )
                <a href="#modal" data-toggle="modal" data-target="#modal" data-content="{{ $output->description }}" data-title="{{ $output->title }}" class="see-more">see more</a>
                @endif</p>
            </div>
        </div>
      @endif
    @endforeach
    @else
      <div class="bgc-white p-20 bd mT-20">
        <h5 class="lh-1 center mB-0">No Output Available</h5>
      </div>
    @endif
</div>
