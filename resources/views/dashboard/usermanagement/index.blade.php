@extends('layouts.dashboard')


@section('content')
<div>
   @if(Session::has('message'))
      <p class="alert alert-success">{{ Session::get('message') }}</p>
   @endif
</div>
<div class="bgc-white p-20 bd">
   <div class="layer w-100 mB-10"><h6 class="lh-1">Partners</h6></div>
   <div class="mT-30">
      <div id="dataTable_wrapper" class="dataTables_wrapper">
         <table id="dataTable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
               <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 314.5px;">Partner Name</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 166.5px;">Partner Admin Name</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 56.5px;">Partner Admin Position</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140.5px;">Role</th>
                  @if ( auth()->user()->hasRole('admin') )
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140.5px;">Owner</th>
                  @endif
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140.5px;">Status</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 140.5px;">Actions</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th rowspan="1" colspan="1">Partner Name</th>
                  <th rowspan="1" colspan="1">Partner Admin Name</th>
                  <th rowspan="1" colspan="1">Partner Admin Position</th>
                  <th rowspan="1" colspan="1">Role</th>
                  @if ( auth()->user()->hasRole('admin') )
                    <th rowspan="1" colspan="1">Owner</th>
                  @endif
                  <th rowspan="1" colspan="1">Status</th>
                  <th rowspan="1" colspan="1">Actions</th>
               </tr>
            </tfoot>
            <tbody>
               @foreach( $users as $user )
                        <tr role="row" class="odd">
                           <td><a href="{{ route('user-management.edit', ['id' => Helper::encrypt_id($user->id)]) }}">{{ $user->partner_name }}</a></td>
                           <td>{{ $user->partner_admin_name }}</td>
                           <td>{{ $user->partner_admin_position }}</td>
                           <td>{{ $user->get_role()->description }}</td>
                           @if ( auth()->user()->hasRole('admin') )
                            <td>@if( $user->get_owner()->who_add_user_id == auth()->user()->id ) {{ $user->get_owner()->partner_name }} @else Me  @endif</td>
                           @endif
                           <td>
                              @if ( $user->active == 1 )
                              <div class="alert alert-success mB-0" role="alert">Activated</div>
                              @else
                              <div class="alert alert-danger mB-0" role="alert">Deactivated</div>
                              @endif
                           </td>
                           <td class="controls">
                              <a class="btn btn-primary" href="{{ URL::to('user-management/' . Helper::encrypt_id($user->id) . '/edit') }}"><span class="ti-pencil"></span></a>
                              <form style="display: inline-block;" action="{{action('UserManagementController@destroy', [ 'id'=> Helper::encrypt_id($user->id)] )}}" method="post">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to deactivate this user?');"><span class="ti-trash"></span></button>
                              </form>
                           </td>
                        </tr>
                @endforeach
            </tbody>
         </table>
      </div>
   </div>
   </div>
</div>
@stop
