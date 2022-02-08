<x-auth-layout title="{{ __('auth.forgot_title') }}" location="container" header-class="header-con" body-class="auth">


    <div class="container">
    <a href="{{ route('main') }}" class="close">&times;</a>
    <div class="small-circle">
      <h1>UNIQUE.</h1>
      <h2>The best of you</h2>
    </div>
    <div class="sign-form forgot-password">
      <form action="{{ route('password.update') }}" method="POST">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-container">
          
          <!--<div class="form-group">-->
          <!--  <input type="tel" id="phone" name="phone" placeholder="Phone">-->
          <!--</div>-->
          <div class="form-group">
            <input type="email" id="email" name="email" placeholder="E-Mail" value="{{ old('email', $request->email) }}">
          </div>
          <div class="form-group">
              <input type="password" name="password" placeholder="{{ __('auth.pswrd') }}">
          </div>
          <div class="form-group">
              <input type="password" name="password_confirmation" placeholder="{{ __('auth.confirm_pswrd') }}">
          </div>
          <button type="submit" class="submit">{{ __('auth.forgot_title') }}</button>
        </div>
      </form>
    </div>
    </div>
</x-auth-layout>
