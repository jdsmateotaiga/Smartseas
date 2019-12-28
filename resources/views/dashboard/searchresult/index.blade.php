@extends('layouts.dashboard')
@section('content')
  <div>
    <h2>Search result for "<span class="search-result">{{ $_GET['q'] }}</span>"</h2>
    <ul class="nav nav-tabs">
      <li><a data-toggle="tab" href="#projects" class="active">Projects @if($projects->count() > 0) ({{$projects->count()}}) @endif</a></li>
      <li><a data-toggle="tab" href="#outcomes">Outcomes @if($outcomes->count() > 0) ({{$outcomes->count()}}) @endif</a></li>
      <li><a data-toggle="tab" href="#outputs">Outputs @if($outputs->count() > 0) ({{$outputs->count()}}) @endif</a></li>
      <li><a data-toggle="tab" href="#activities">Activities @if($activities->count() > 0) ({{$activities->count()}}) @endif</a></li>
    </ul>
    <div class="tab-content">
      <div id="projects" class="bgc-white p-20 bd active">
          @if(!$projects->isEmpty())
          @foreach($projects as $project)
            <div class="bgc-white p-10 bd mT-5" @if($project->active == 0) style="border-color: red!important;" @endif>
                  <h5 class="lh-1 mB-5 lib">{{ $project->title }}</h5>&nbsp;
                  @if ( auth()->user()->hasRole('partner') )
                    <a href="{{ action('ProjectController@partnerShowProject', Helper::encrypt_id($project->id)) }}" title="View this project"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  @if( !auth()->user()->hasRole('partner') )
                    <a href="{{ route('project.show', ['id' => Helper::encrypt_id($project->id)]) }}" title="View this project"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  <div class="row">
                      <p class="col-md-12 mB-0"><strong>Project objective: </strong>{{ Helper::the_excerpt($project->objective, 20) }}</p>
                  </div>
            </div>
          @endforeach
          @else
              <center>No Project Available!</center>
          @endif
      </div>

      <div id="outcomes" class="bgc-white p-20 bd">
          @if(!$outcomes->isEmpty())
              @foreach($outcomes as $outcome)
              <div class="bgc-white p-10 bd mT-5" @if($outcome->active == 0) style="border-color: red!important;" @endif>
                  <h5 class="lh-1 mB-5 lib">{{ $outcome->title }}</h5>&nbsp;
                  @if ( auth()->user()->hasRole('partner') )
                    <a href="{{ action('OutcomeController@partnerShowOutcome', Helper::encrypt_id($outcome->id)) }}" title="View this Outcome"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  @if( !auth()->user()->hasRole('partner') )
                    <a href="{{ route('outcome.show', ['id' => Helper::encrypt_id($outcome->id)]) }}" title="View this Outcome"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  <div class="row">
                      <p class="col-md-12 mB-0"><strong>Outcome Description: </strong>{{ Helper::the_excerpt($outcome->description, 20) }}</p>
                  </div>
              </div>
            @endforeach
          @else
              <center>No Outcome Available!</center>
          @endif
      </div>

      <div id="outputs" class="bgc-white p-20 bd">
          @if(!$outputs->isEmpty())
              @foreach($outputs as $output)
              <div class="bgc-white p-10 bd mT-5" @if($output->active == 0) style="border-color: red!important;" @endif>
                  <h5 class="lh-1 mB-5 lib">{{ $output->title }}</h5>&nbsp;
                  @if ( auth()->user()->hasRole('partner') )
                    <a href="{{ action('OutputController@partnerShowOutput', Helper::encrypt_id($output->id)) }}" title="View this output"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  @if( !auth()->user()->hasRole('partner') )
                    <a href="{{ route('output.show', ['id' => Helper::encrypt_id($output->id)]) }}" title="View this output"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  <div class="row">
                      <p class="col-md-12 mB-0"><strong>Output Description: </strong>{{ Helper::the_excerpt($output->description, 20) }}</p>
                  </div>
              </div>
            @endforeach
          @else
              <center>No Output Available!</center>
          @endif
      </div>

      <div id="activities" class="bgc-white p-20 bd">
          @if(!$activities->isEmpty())
              @foreach($activities as $activity)
              <div class="bgc-white p-10 bd mT-5" @if($activity->active == 0) style="border-color: red!important;" @endif>
                  <h5 class="lh-1 mB-5 lib">{{ $activity->title }}</h5>&nbsp;
                  @if ( auth()->user()->hasRole('partner') )
                    <a href="{{ action('ActivityController@partnerShowActivity', Helper::encrypt_id($activity->id)) }}" title="View this activity"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  @if( !auth()->user()->hasRole('partner') )
                    <a href="{{ route('activity.show', ['id' => Helper::encrypt_id($activity->id)]) }}" title="View this activity"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  <div class="row">
                      <p class="col-md-12 mB-0"><strong>Activity Description: </strong>{{ Helper::the_excerpt($activity->description, 20) }}</p>
                  </div>
              </div>
            @endforeach
          @else
              <center>No Activity Available!</center>
          @endif
      </div>

      <div id="activities" class="bgc-white p-20 bd">
          @if(!$activities->isEmpty())
              @foreach($activities as $activity)
              <div class="bgc-white p-10 bd mT-5" @if($activity->active == 0) style="border-color: red!important;" @endif>
                  <h5 class="lh-1 mB-5 lib">{{ $activity->title }}</h5>&nbsp;
                  @if ( auth()->user()->hasRole('partner') )
                    <a href="{{ action('ActivityController@partnerShowActivity', Helper::encrypt_id($activity->id)) }}" title="View this activity"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  @if( !auth()->user()->hasRole('partner') )
                    <a href="{{ route('activity.show', ['id' => Helper::encrypt_id($activity->id)]) }}" title="View this activity"><i class="c-green-500 ti-eye"></i></a>
                  @endif
                  <div class="row">
                      <p class="col-md-12 mB-0"><strong>Activity Description: </strong>{{ Helper::the_excerpt($activity->description, 20) }}</p>
                  </div>
              </div>
            @endforeach
          @else
              <center>No Activity Available!</center>
          @endif
      </div>

    </div>
  </div>
@stop
