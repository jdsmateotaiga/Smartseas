
@extends('layouts.dashboard')
@section('content')
<div class="filter-area bgc-white pT-10 pL-20 pR-20 bd mB-30">
  <label for="" style="width: 100%; text-align: center;"><strong>Filter by Date</strong></label>
  <form class="toggle-container @if(isset($_GET['q1']) || isset($_GET['q2']) || isset($_GET['q3']) || isset($_GET['q4'])) active @endif" action="" method="GET">
    <div class="row">
    <div class="col-md-10">
        <div class="row">
          <div class="col-sm-3 text-center">
              <div class="form-group">
                  <label for="q1">Quarter 1</label>
                  <input type="checkbox" class="form-control" id="q1" name="q1" value="1" @if(isset($_GET['q1'])) checked @endif>
              </div>
          </div>
          <div class="col-sm-3 text-center">
              <div class="form-group">
                  <label for="q2">Quarter 2</label>
                  <input type="checkbox" class="form-control" id="q2" name="q2" value="2" @if(isset($_GET['q2'])) checked @endif>
              </div>
          </div>
          <div class="col-sm-3 text-center">
              <div class="form-group">
                  <label for="q3">Quarter 3</label>
                  <input type="checkbox" class="form-control" id="q3" name="q3" value="3" @if(isset($_GET['q3'])) checked @endif>
              </div>
          </div>
          <div class="col-sm-3 text-center">
              <div class="form-group">
                  <label for="q4">Quarter 4</label>
                  <input type="checkbox" class="form-control" id="q4" name="q4" value="4" @if(isset($_GET['q4'])) checked @endif>
              </div>
          </div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Filter</button>
    </div>
    </div>
  </form>
  <p class="text-center mB-5"><a href="#" class="filter-arrow @if(isset($_GET)) active @endif"><i class="ti-angle-down"></i><i class="ti-angle-up"></i></a></p>
</div>
@if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
<h2 class="text-center">Activity Detail</h2>
<div class="bgc-white p-20 bd" id="project-board" @if($activity->active == 0) style="border-color: red!important;"" @endif>
   <div class="layer w-100">
     <h2 class="lh-1 lib mB-10"><span class="small bold"></span> {{ $activity->title }}</h2>
        @if( !auth()->user()->hasRole('partner') )
        <a class="lib mL-10 modal-edit"
        data-toggle="modal"
        data-target="#edit-activity"
        href="#edit-activity"
        data-edit-url="{{ action('ActivityController@edit', ['id'=> Helper::encrypt_id($activity->id) ])}}"
        data-action-url="{{ action('ActivityController@update', ['id'=> Helper::encrypt_id($activity->id) ])}}">
            <i class="c-blue-500 ti-pencil-alt"></i>
        </a>
        @include('dashboard.project.activity.edit')
        @endif
   </div>
    <div class="row">
      <div class="col-md-6"><strong>Under Project: </strong>{{ $activity->project->title }}</div>
      <div class="col-md-6"><strong>Assigner: </strong>{{ $activity->owner->partner_name }}</div>
      <div class="col-md-6"><strong>Deliverables: </strong> {{ $activity->deliverables }}</div>
      <div class="col-md-3"><strong>Start Date: </strong> {{ $activity->start_date }}</div>
      <div class="col-md-3"><strong>End Date: </strong> {{ $activity->end_date }}</div>
      <div class="col-md-6"><strong>Outcome Description: </strong>{{ Helper::the_excerpt($activity->description, 20) }} @if ( strlen($activity->description) > 20 ) <a href="#modal" data-toggle="modal" data-target="#modal">see more</a> @endif</div>
    </div>
 </div>
</div>
@include('dashboard.project.task.index')
@if ( strlen($activity->description) > 20 )
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title see-more-title" id="exampleModalLabel">Outcome Description</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body"><div class="see-more-content">{{ $activity->description }}</div></div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
</div>
@endif
@stop
