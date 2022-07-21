

<x-app-layout title="{{ __('auth.forgot_title') }}"  body-class="register-body">
    <main class="login">
        <div class="register__container">
            <a href="{{ route('main') }}" class="register__close">
                <img src="images/close.svg" alt="" />
              </a>
              <br>
          <div class="register__title">{{ __('auth.forgot_title') }}s</div>
          <div class="login__form">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
              <div class="login__group">
                <label for="email">E-Mail</label>
                <input name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" placeholder="" required />
              </div>
              <div class="login__group">
                <label for="pswrd">{{ __('auth.pswrd') }}</label>
                <input name="password" type="password" placeholder="" required />
              </div>
              <div class="login__group">
                <label for="repswrd">{{ __('auth.confirm_pswrd') }}</label>
                <input name="password_confirmation" type="password" placeholder="" required />
              </div>
              <button class="login__submit">{{ __('auth.forgot_title') }}</button>
              @if ($errors->any())
                <div class="sign-error">
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <br>
              <a href="{{ route('register') }}" class="login__not-registered">
                <p>{{ __('auth.no_reg') }}</p>
                <a href="{{ route('register') }}" class="login__submit login__submit--alt"> {{ __('auth.title_register') }} </a>
              </a>

            </form>
          </div>
        </div>
      </main>
</x-app-layout>

