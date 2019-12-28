@extends('layouts.dashboard')


@section('content')
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12"></div>
        <div class="masonry-item col-md-6">
            <div class="bgc-white p-20 bd pos-r authentication">
                <div class="layer w-100 mB-10"><h6 class="lh-1">Create User</h6></div>
                <div class="mT-30">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="who_add_user_id" value="{{ Helper::encrypt_id(auth()->user()->id) }}">
                        <div class="form-group">
                            <label class="text-normal text-dark">Partner Code</label>
                            <input id="code" type="text" class="form-control{{ $errors->has('partner_code') ? ' is-invalid' : '' }}" name="partner_code" value="{{ old('partner_code') }}" required>
                            @if ($errors->has('partner_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('partner_code') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">Partner Name</label>
                            <input id="name" type="text" class="form-control{{ $errors->has('partner_name') ? ' is-invalid' : '' }}" name="partner_name" value="{{ old('partner_name') }}" required>
                            @if ($errors->has('partner_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('partner_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">Email Address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="text-normal text-dark">Partner Admin Name</label>
                            <input id="partner_admin_name" type="text" class="form-control{{ $errors->has('partner_admin_name') ? ' is-invalid' : '' }}" name="partner_admin_name" value="{{ old('partner_admin_name') }}" required>
                            @if ($errors->has('partner_admin_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('partner_admin_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="text-normal text-dark">Partner Admin Position</label>
                            <input id="partner_admin_position" type="text" class="form-control{{ $errors->has('partner_admin_position') ? ' is-invalid' : '' }}" name="partner_admin_position" value="{{ old('partner_admin_position') }}" required>
                            @if ($errors->has('partner_admin_position'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('partner_admin_position') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="text-normal text-dark">User Role</label>
                            <select id="role" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" name="role">
                                @if(auth()->user()->hasRole('project_manager'))
                                  <option value="partner">Partner</option>
                                @else
                                    @foreach($roles as $role)
                                      <option value="{{ $role->name }}">{{ $role->description }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">Password</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);" onClick="generateKey()" class="btn btn-primary">Generate</a>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="peers ai-c jc-sb fxw-nw">
                                <div class="peer"><button class="btn btn-primary">Register</button></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
