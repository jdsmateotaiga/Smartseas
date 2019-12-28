@extends('layouts.auth')

@section('content')

      <div class="peers ai-s fxw-nw h-100vh">
         @include('auth.bg')
         <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r authentication">
            <h4 class="fw-300 c-grey-900 mB-40">Forgot Password ?</h4>
            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="mB-40">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('login') }}"><i class="ti-arrow-left"></i> Back to Login</a>
         </div>
         
      </div>

@stop





