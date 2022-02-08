<x-app-layout title="{{ __('auth.title_register') }}" body-class="register-body" >
    <main class="register">
        <div class="register__container">
          <a href="{{ route('main') }}" class="register__close">
            <img src="images/close.svg" alt="" />
          </a>
          <div class="register__title">Регистрация</div>
          <div class="register__description">
            Пожалуйста вводите корректные данные!
          </div>
          <div class="register__form">
            <form action="{{ route('register') }}" method="POST">
                @csrf
              <div class="register__group">
                <label for="name">Имя</label>
                <input type="text" placeholder="" name="name" required />
              </div>
              <div class="register__group">
                <label for="lastname">Фамилия</label>
                <input type="text" placeholder="" name="lastname" required />
              </div>
              <div class="register__group">
                <label for="age">Возраст</label>
                <input type="number" min="18" max="99" placeholder="" name="age" required />
              </div>
              <div class="register__group">
                <label for="phone">Номер телефона</label>
                <input type="tel" placeholder="" name="phone" required />
              </div>
              <div class="register__group">
                <label for="email">E-Mail</label>
                <input name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" type="email" placeholder="" required />
              </div>
              <div class="register__group">
                <label for="pswrd">Пароль</label>
                <input name="password"type="password" placeholder="" required />
              </div>
              <div class="register__group">
                <label for="repswrd">Повторите пароль</label>
                <input name="password_confirmation" type="password" placeholder="" required />
              </div>
              <div class="register__checkbox">
                <input name="process_data" type="checkbox" id="personal-info" required/>

                <label for="personal-info"
                  >Я даю согласие на обработку персональных данных</label
                >
              </div>
              <button class="register__submit">Регистрация</button>
              <ul class="errors">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </form>
          </div>
        </div>
      </main>
</x-app-layout>
