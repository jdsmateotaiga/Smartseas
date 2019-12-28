@extends('layouts.dashboard')
@section('content')
@if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
<h2 class="text-center">Project Detail</h2>
<div class="bgc-white p-20 bd" id="project-board" @if($project->active == 0) style="border-color: red!important;"" @endif>
   <div class="layer w-100">
     <h3 class="lh-1 lib mB-10">{{ $project->title }}</h3>&nbsp;&nbsp;
      @if( !auth()->user()->hasRole('partner') )
        <a href="{{ route('report.show', ['id' => Helper::encrypt_id($project->id)]) }}"><i class="c-green-500 ti-agenda"></i></a>
        <a class="lib mL-5" href="{{ route('project.edit', ['id' => Helper::encrypt_id($project->id)]) }}" title="Edit this Project"><i class="c-blue-500 ti-pencil-alt"></i></a>
        @if($project->active == 1)
        <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProjectController@deactivate', [ 'id'=> Helper::encrypt_id($project->id)] )}}" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger del" title="Remove this project"  onclick="return confirm('Are you sure you want to remove this project?');"><i class="ti-trash"></i></button>
        </form>
        @elseif($project->active == 0)
        <form style="display: inline-block; vertical-align: middle;" action="{{ action('ProjectController@activate', [ 'id'=> Helper::encrypt_id($project->id)] )}}" method="post">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success act" title="Activate this project"  onclick="return confirm('Are you sure you want to activate this project?');"><i class="c-green-500 ti-check"></i></button>
        </form>
        @endif
      @endif
   </div>
   <div class="row">
        <div class="col-md-4">
          <div><strong>Project Owner: </strong>{{ $project->owner->partner_name }}</div>
          <div><strong>Project ID: </strong>{{ $project->project_id }}</div>
          <div><strong>Award ID: </strong>{{ $project->award_id }}</div>
          <div><strong>Responsible Partners:</strong>
            <span style="display: inline-block; vertical-align: top;">
            @foreach($users as $partner)
              <span title="{{ $partner->partner_name }}">{{ $partner->partner_code }}</span>, &nbsp;
            @endforeach
            </span>
          </div>
        </div>
        <div class="col-md-8 row">
          <div class="col-md-6">
            <strong>Start Date: </strong>{{ $project->start_date }}
          </div>
          <div class="col-md-6">
            <strong>Completion Date: </strong>{{ $project->completion_date }}
          </div>
          <div class="col-md-12">
            <div><strong>Implementing Partner: </strong>{{ $project->implementing_partner }}</div>
            <div><strong>Project Objective: </strong>{{ Helper::the_excerpt($project->objective, 20) }} @if ( strlen($project->objective) > 20 ) <a href="#modal" data-toggle="modal" data-target="#modal" data-content="{{$project->objective}}" class="see-more">see more</a> @endif</div>
          </div>
        </div>
    </div>
</div>
@if ( strlen($project->objective) > 20 )
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title see-more-title" id="exampleModalLabel">Project Objective</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body"><div class="see-more-content">{{ $project->project_objective }}</div></div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
</div>
@endif
  @include('dashboard.project.outcome.index')
@stop
