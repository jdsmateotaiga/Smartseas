@extends('layouts.dashboard')
@section('content')
<div>
   @if(Session::has('message'))
      <p class="alert alert-success">{{ Session::get('message') }}</p>
   @endif
</div>
<div class="bgc-white p-20 bd">

    <a class="btn btn-primary create-code"
        data-toggle="modal"
        data-target="#create-unit"
        href="#create-unit"
    >
        Create Unit of Measurement
    </a>
   <div class="mT-30">
      <div id="dataTable_wrapper" class="dataTables_wrapper">
         <table id="dataTable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
               <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 314.5px;">Unit of Measurement</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 166.5px;">Description</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 56.5px;">Owner</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 56.5px;">Action</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th rowspan="1" colspan="1">Unit of Measurement</th>
                  <th rowspan="1" colspan="1">Description</th>
                  <th rowspan="1" colspan="1">Owner</th>
                  <th rowspan="1" colspan="1">Action</th>
               </tr>
            </tfoot>
            <tbody>
               @foreach( $unit_measurement as $item )
                        <tr role="row" class="odd">
                           <td>{{ $item->unit }}</td>
                           <td>{{ $item->description }}</td>
                           <td>@if($item->get_owner()->partner_name == auth()->user()->partner_name) Me @else {{ $item->get_owner()->partner_name }} @endif</td>
                           <td class="controls">
                              @if(Auth::id() == $item->user_id)
                              <a class="btn btn-primary modal-edit" data-toggle="modal" data-target="#edit-unit" href="#edit-unit"
                              data-edit-url="{{ action('UnitMeasurementController@edit', [ 'id' => Helper::encrypt_id($item->id) ]) }}"
                              data-action-url="{{ action('UnitMeasurementController@update', [ 'id' => Helper::encrypt_id($item->id) ]) }}"
                              ><span class="ti-pencil"></span></a>
                              <form style="display: inline-block;" action="{{ action('UnitMeasurementController@deactivate', [ 'id'=> Helper::encrypt_id($item->id)] )}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to deactivate this code?');"><span class="ti-trash"></span></button>
                              </form>
                              @endif
                           </td>
                        </tr>
                @endforeach
            </tbody>
         </table>
      </div>
   </div>
   </div>
</div>
@include('dashboard.settings.unit_of_measurement.edit')
@include('dashboard.settings.unit_of_measurement.create')
@stop
