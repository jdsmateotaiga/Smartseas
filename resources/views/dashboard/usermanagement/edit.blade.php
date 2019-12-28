@extends('layouts.dashboard')
@section('content')
<div class="col-md-12">
    <div class="bgc-white p-20 bd pos-r authentication">
        @if($user)
            <div class="approve_section">
                <p class="image_approve"><img class="img_res" src="{{ $user->partner_admin_image }}" alt=""></p>
                @if ($user->partner_status == 1)
                    <div class="alert alert-success mB-0" role="alert">Active</div>
                @else
                    <div class="alert alert-danger mB-0" role="alert">Pending</div>
                @endif
                <div class="row">
                  <div class="col-md-6">
                    <table>

                      <tr>
                          <td><b>Email: </b></td>
                          <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                      </tr>
                      <tr>
                          <td><b>Partner Name: </b></td>
                          <td>{{ $user->partner_name }}</td>
                      </tr>
                      <tr>
                          <td><b>Partner Name Address: </b></td>
                          <td>{{ $user->partner_name_address }}</td>
                      </tr>

                  </table>
                  </div>
                  <div class="col-md-6">
                    <table>
                    <tr>
                        <td><b>Partner Admin ID: </b></td>
                        <td>{{ $user->partner_admin_ID }}</td>
                    </tr>
                    <tr>
                        <td><b>Partner Admin Name: </b></td>
                        <td>{{ $user->partner_admin_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Partner Admin Address: </b></td>
                        <td>{{ $user->partner_admin_address }}</td>
                    </tr>
                    <tr>
                        <td><b>Partner Admin Gender: </b></td>
                        <td>{{ $user->partner_admin_gender }}</td>
                    </tr>
                    <tr>
                        <td><b>Partner Admin Position: </b></td>
                        <td>{{ $user->partner_admin_position }}</td>
                    </tr>
                  </table>
                  </div>
                  <div class="col-md-12">
                      @if ($user->partner_status == 0)
                      <form class="form_approve" action="{{action('UserManagementController@update',[ 'id'=>Helper::encrypt_id($user->id) ])}}" method="post">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <input type="hidden" name="action" value="activate">
                          <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to activate this partner?');">Activate</button>
                      </form>
                      @else
                      <form class="form_decline" action="{{action('UserManagementController@update',[ 'id'=>Helper::encrypt_id($user->id) ])}}" method="post">
                          {{ method_field('PUT') }}
                          {{ csrf_field() }}
                          <input type="hidden" name="action" value="deactivate">
                          <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to deactivate this partner?');">Deactivate</button>
                      </form>
                      @endif
                  </div>
                </div>
            </div>
        @else
            <h1><center>User Not Available</center></h1>
        @endif
    </div>
</div>

@stop
