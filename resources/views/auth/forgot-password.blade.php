<x-auth-layout title="{{ __('auth.forgot_title') }}" location="container" header-class="header-con" body-class="auth">


    <div class="container">
    <a href="{{ route('main') }}" class="close">&times;</a>
    <div class="small-circle">
      <h1>UNIQUE.</h1>
      <h2>The best of you</h2>
    </div>
    <div class="sign-form forgot-password">
      <form action="{{ route('password.email') }}" method="POST">
          @csrf
        <div class="form-container">
          
          <!--<div class="form-group">-->
          <!--  <input type="tel" id="phone" name="phone" placeholder="Phone">-->
          <!--</div>-->
          <div class="form-group">
            <input type="email" id="email" name="email" placeholder="E-Mail">
          </div>
          <button type="submit" class="submit">{{ __('auth.forgot_btn') }}</button>
          <br>
          <b style="color: #fff; font-size: 18px; margin-top: 15px">
                        {{ session('status') ?? '' }}
        </div>
      </form>
    </div>
    </div>
</x-auth-layout>
