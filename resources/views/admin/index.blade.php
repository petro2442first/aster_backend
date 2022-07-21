<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Админ Панель</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Display:wght@800&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ mix('style.css') }}" />
  </head>
  <body class="admin-body">
    <div class="admin">
      <div class="admin__main-logo">
        <img src="{{ asset('images/about-1.png') }}" alt="" />
      </div>
      <div class="admin__sidebar">
        <div class="admin__logo">
          <img src="{{ asset('images/admin-logo.png') }}" alt="" />
        </div>
        <div class="admin__title">ADMIN</div>
        <nav class="admin__menu">
          <div class="admin__menu-item" data-tab_id="clients">
            <img src="{{ asset('images/admin-clients.svg') }}" alt="" />
            <span>Клиенты</span>
          </div>
          <div class="admin__menu-item" data-tab_id="requests">
            <img src="{{ asset('images/requests.svg') }}" alt="" />
            <span>Запросы</span>
          </div>
        </nav>
        <form action="{{ route('logout') }}" method="post" class="admin__logout">
            @csrf
            <button type="submit" >
              <img src="{{ asset('images/exit.svg') }}" alt="" /> Выход
            </button>
        </form>
      </div>
      <main class="admin__container">
        <div class="admin__block clients active" data-tab="clients">
          <div class="admin__block-title">Клиенты</div>
          <div class="clients__list">
              @forelse($users as $user)
              <div class="clients-item">
                <div class="clients-item__row">
                  <div class="clients-item__col">
                    <h3>Тарифы: </h3>
                    <div class="clients-item__tariffs">
                        @forelse ($user->tariffs() as $tariff)
                            <span class="{{ Str::slug($tariff->title, '') }}"></span>
                        @empty

                        @endforelse
                    </div>
                  </div>
                  <div class="clients-item__col">
                    <div class="clients-item__name">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="clients-item__email">{{ $user->email }}</div>
                    <div class="clients-item__phone">{{ $user->phone }}</div>
                  </div>
                </div>
                <div class="clients-item__open-btn" data-modal="#user-modal-{{ $user->id }}" >Открыть</div>
              </div>
              <div class="user @if(session('user_id') == $user->id) show @endif" id="user-modal-{{ $user->id }}">
                <div class="user__container">
                  <div class="user__close">
                    <img src="images/close.svg" alt="" />
                  </div>
                  <div class="user__info">
                    <div class="user__name">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="user__email">Был(а) в сети: {{ $user->last_login }}</div>
                    <div class="user__email">{{ $user->email }}</div>
                    <div class="user__phone">{{ $user->phone }}</div>
                    <div class="user__phone">IP: {{ $user->ip }}</div>
                    <div class="user__row">
                        <form action="{{ route('delete-user') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value={{ $user->id }}>
                            <button type="submit" class="user__delete">Удалить</button>
                        </form>
                      {{-- <div class="user__profile">Перейти в ЛК</div> --}}
                    </div>
                  </div>
                  <div class="user__block">
                    <form action="{{ route('user.set-balance') }}" method="POST">
                        @csrf
                    <div class="user__balance">
                            <p>БАЛАНС:</p>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="text" name="title" placeholder="Сообщение">
                            <input type="number" name="amount" step="0.01" value="{{ $user->balance }}">
                            <button type="submit">Изменить баланс</button>
                    </div>
                    </form>
                  </div>
                  <div class="user__tariffs">
                    <h3>Тарифы</h3>
                    <ul>
                        @foreach($user->getSortedTariffs()['acquired'] as $tariff)
                        <div class="tariff added">
                            <p>{{ $tariff->title }}</p>
                            <a href="{{ route('admin.remove-tariff', [
                                'id' => $tariff->id,
                                'user_id' => $user->id]) }}" class="remove">-</a>
                          </div>
                        @endforeach
                        @foreach($user->getSortedTariffs()['available'] as $tariff)
                        <div class="tariff available">
                            <p>{{ $tariff->title }}</p>
                            <a href="{{ route('admin.add-tariff', [
                                'id' => $tariff->id,
                                'user_id' => $user->id]) }}" class="add">+</a>
                          </div>
                        @endforeach
                    </ul>
                  </div>
                  <div class="user__history">
                    <h3>История транзакций</h3>
                    <ul>
                        @forelse ($user->transfers->reverse() as $index => $transfer)
                        <div class="history-item {{ $transfer->appointment == '+' ? 'in' : 'out' }}">
                            <p>{{$transfer->appointment}}{{ $transfer->value }}$</p>
                            <form action="{{ route('admin.edit-transfer-date', [
                                'user_id' => $user->id,
                                'id' => $transfer->id
                            ]) }}" method="GET">
                                <input type="date" name="date" id="" value="{{ $transfer->date }}">
                                <button type="submit">Сохранить</button>
                            </form>
                            <a href="{{ route('admin.delete-transfer', ['id' => $transfer->id]) }}" class="remove">-</a>
                        </div>
                        @empty
                            <p style="color: #fff">Вы не проводили никаких операций</p>
                        @endforelse
                    </ul>
                  </div>
                </div>
              </div>
              @empty
              Список пользователей пуст!
              @endforelse
          </div>
        </div>
        <div class="admin__block requests " data-tab="requests">
          <div class="admin__block-title">Запросы</div>
          <div class="requests__container">
              @forelse ($requests as $request)
              <div class="requests__item">
                <div class="requests__row">
                  <div class="requests__col">
                    <div class="requests__title">Вывод средств:</div>
                    <div class="requests__value">{{ $request->amount }}$</div>
                  </div>
                  <div class="requests__col">
                    <div class="requests__name">{{ $user->name }} {{ $user->lastname }}</div>
                    <div class="requests__email">{{ $user->email }}</div>
                    <div class="requests__phone">{{ $user->phone }}</div>
                  </div>
                </div>
                <div class="requests__btns">
                    <a href="{{ route('admin.delete-withdraw-request', ['req_id' => $request->id]) }}" class="requests__no">Удалить</a>
                  </div>
                </div>
              @empty
                  Список запросов на вывод пуст!
              @endforelse
          </div>
        </div>
      </main>
    </div>


    <script type="module" src="{{ mix('admin.js') }}"></script>
  </body>
</html>
