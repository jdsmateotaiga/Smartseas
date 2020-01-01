@extends('layouts.dashboard')
@section('content')
@if(Session::has('message'))
    <p class="alert alert-success">{{ Session::get('message') }}</p>
@endif
<h2 class="text-center">Outcome Detail</h2>
<div class="bgc-white p-20 bd" id="project-board" @if($outcome->active == 0) style="border-color: red!important;"" @endif>
   <div class="layer w-100">
     <h2 class="lh-1 lib mB-10"> @if(isset($_GET['count'])) <span class="small bold">{{ $_GET['count'] }}.</span> @endif {{ $outcome->title }}</h2>
        @if( !auth()->user()->hasRole('partner') )
          <a class="lib mL-10 modal-edit"
          data-toggle="modal"
          data-target="#edit-outcome"
          href="#edit-outcome"
          title="Edit this Outcome"
          data-edit-url="{{ action('OutcomeController@edit', ['id'=> Helper::encrypt_id($outcome->id) ])}}"
          data-action-url="{{ action('OutcomeController@update', ['id'=> Helper::encrypt_id($outcome->id) ])}}">
            <i class="c-blue-500 ti-pencil-alt"></i>
          </a>
          @include('dashboard.project.outcome.edit')
        @endif
   </div>
    <div class="row">
      <div class="col-md-6">
        <div><strong>Under Project: </strong>{{ $outcome->project->title }}</div>
        <div><strong>Outcome Owner: </strong>{{ $outcome->owner->partner_name }}</div>
      </div>
      <div class="col-md-6 row">
        <div class="col-md-12">
          <div><strong>Outcome Description: </strong>{{ Helper::the_excerpt($outcome->description, 20) }} @if ( strlen($outcome->description) > 20 ) <a href="#modal" data-toggle="modal" data-target="#modal">see more</a> @endif</div>
          <div>
        </div>
      </div>
    </div>
 </div>
</div>
@include('dashboard.project.output.index')
  @if ( strlen($outcome->description) > 20 )
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title see-more-title" id="exampleModalLabel">Outcome Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body"><div class="see-more-content">{{ $outcome->description }}</div></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
  </div>
  @endif
@stop
