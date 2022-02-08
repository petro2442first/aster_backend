<x-app-layout title="{{ __('auth.title_login') }}"  bodyClass="register-body">
    <main class="login">
        <div class="register__container">
          <a href="./index.html" class="register__close">
            <img src="images/close.svg" alt="" />
          </a>
          <div class="register__title">АВТОРИЗАЦИЯ</div>
          <div class="register__description">
            Пожалуйста, авторизуйтесь или зарегистрируйтесь!
          </div>
          <div class="login__form">
            <form action="{{ route('login') }}" method="POST">
                @csrf
              <div class="login__group">
                <label for="email">E-Mail</label>
                <input name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="email" placeholder="" required />
              </div>
              <div class="login__group">
                <label for="pswrd">Пароль</label>
                <input name="password" type="password" placeholder="" required />
              </div>
              <button class="login__submit">Войти</button>
              @if ($errors->any())
                <div class="sign-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ __($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Route::has('password.request'))
            <a href="#" class="login__forgot-pswrd">Забыли пароль?</a>
                @endif

              <a href="{{ route('register') }}" class="login__not-registered">
                <p>Еще не зарегистрованы?</p>
                <a href="{{ route('register') }}" class="login__submit login__submit--alt"> Регистрация </a>
              </a>

            </form>
          </div>
        </div>
      </main>
</x-app-layout>
