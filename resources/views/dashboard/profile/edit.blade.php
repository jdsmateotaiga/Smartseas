@extends('layouts.dashboard')
@section('content')
<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
</div>
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <div class="layer w-100 mB-10"><h6 class="lh-1">Update Profile</h6></div>
            <div class="mT-30">
                <form method="POST" action="{{ action('ProfileController@update') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="basic-update" name="profile-action">
                    <div class="form-row">
                        @if ( $user->hasRole('partner') )
                        <div class="form-group col-md-12">
                            <label for="input">Partner Admin ID</label>
                            <input type="text" name="partner_admin_ID" class="form-control" id="input" value="{{ $user->partner_admin_ID }}">
                        </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="input1">
                                @if ( $user->hasRole('partner') )
                                    Partner Name
                                @else
                                    Profile Name
                                @endif
                            </label>
                            <input type="text" name="partner_name" class="form-control" id="input1" value="{{ $user->partner_name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input0">Picture</label>
                            <input type="file" name="partner_admin_image" class="form-control" id="input0" value="{{ $user->partner_admin_image }}">
                            @if( $user->partner_admin_image )
                                <p class="profile-img"><img src="{{ $user->partner_admin_image }}" alt=""><p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input2">
                                @if ( $user->hasRole('partner') )
                                    Partner Name Address
                                @else
                                    Address
                                @endif
                            </label>
                            <textarea name="partner_name_address" class="form-control" id="input2">{{ $user->partner_name_address }}</textarea>
                        </div>
                    </div>
                    @if ( $user->hasRole('partner') )
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input3">Partner Admin</label>
                            <input type="text" name="partner_admin" class="form-control" id="input3" value="{{ $user->partner_admin }}">
                            </div>
                        <div class="form-group col-md-6">
                            <label for="input4">Partner Admin Name</label>
                            <input type="text" name="partner_admin_name" class="form-control" id="input4" value="{{ $user->partner_admin_name }}">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="input6">Gender</label>
                            <select name="partner_admin_gender" id="input6" class="form-control">
                                <option value="male" @if($user->partner_admin_gender == 'Male') selected @endif>Male</option>
                                <option value="female" @if($user->partner_admin_gender == 'Female') selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input5">Partner Admin Address</label>
                            <textarea name="partner_admin_address" class="form-control" id="input5">{{ $user->partner_admin_address }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input7">Partner Admin Position</label>
                                <input type="text" name="partner_admin_position" class="form-control" id="input7" value="{{ $user->partner_admin_position }}">
                            </div>
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            <div class="layer w-100 mB-10"><h6 class="lh-1">Change Password</h6></div>
            <div class="mT-30">
                <form method="POST" action="{{ action('ProfileController@update') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" id="old_password" class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" id="password_confirm" class="form-control" name="password_confirm">
                    </div>
                    <button type="submit" class="btn btn-success">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
