@extends('layouts.auth')

@section('content')

      <div class="peers ai-s fxw-nw h-100vh">
         @include('auth.bg')
         <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r authentication">
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="mB-40">
            {!! csrf_field() !!}
                  <div class="form-group">
                     <label class="text-normal text-dark">Email</label>
                     <input id="identity" type="identity" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}" autofocus>
                        @if ($errors->has('identity'))
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('identity') }}</strong>
                        </span>
                        @endif
                  </div>
                  <div class="form-group">
                     <label class="text-normal text-dark">Password</label>
                     <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                  </div>
               <div class="form-group">
                  <div class="peers ai-c jc-sb fxw-nw">
                     <div class="peer">
                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                              <input type="checkbox" id="inputCall1" class="peer" name="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Remember Me</span>
                              </label>
                        </div>
                     </div>
                     <div class="peer"><button class="btn btn-primary">Login</button></div>
                  </div>
               </div>
            </form>
            @if ($errors->has('message'))
            <div class="alert alert-danger">
                  Email and Password not Matched!
            </div>
            @endif


            <p><a href="/password/reset">Forgot password ?<br><i class="ti-arrow-right"></i></a></p>
         </div>
      </div>
@stop
