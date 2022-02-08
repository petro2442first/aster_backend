<x-app-layout title="{{ __('contacts.title') }}" body-class="contacts-body">
    <main class="main-container">
        <h1 class="main-logo">Контакты</h1>
        <div class="contacts">
          <div class="contacts__container">
            <div class="contacts__row">
              <div class="contacts-info">
                <div class="contacts-info__item">
                  <span>
                    <img src="{{ asset('images/paper_plane.svg') }}" alt="" />
                  </span>
                  <p>
                    30 St Mary Axe, London EC3A<br />8BF, Великобритания<br />
                    Этаж 26 офис 263(В)
                  </p>
                </div>
                <div class="contacts-info__item">
                  <span>
                    <img src="{{ asset('images/phone.svg') }}" alt="" />
                  </span>
                  <p>Tel: +44(0)2070715001</p>
                </div>
              </div>
              <div class="tech-support">
                <div class="tech-support__title">Тех. поддержка:</div>
                <div class="tech-support__row">
                  <a href="https://t.me/Aster_Support" class="tech-support__item">
                    <span>
                      <img src="{{ asset('images/settings.svg') }}" alt="" />
                    </span>
                    <p>Тех. поддержка</p>
                  </a>
                  <a href="https://t.me/Aster_Adviser" class="tech-support__item">
                    <span>
                      <img src="{{ asset('images/group.svg') }}" alt="" />
                    </span>
                    <p>Консультант</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="feedback">
              <div class="feedback__thumb">
                <img src="{{ asset('images/feedback.png') }}" alt="" />
              </div>
              <div class="feedback__form">
                <div class="feedback__title">
                  Задайте все вопросы сразу нам!
                </div>
                <form action="{{ route('mail') }}" method="POST">
                    @csrf
                  <h3></h3>
                  <div class="feedback__group">
                    <label for="email">Ваш Email</label>
                    <input type="email" name="" id="email" required />
                  </div>
                  <div class="feedback__message">
                    <label for="message">Тема</label>
                    <textarea name="" id="message"></textarea>
                  </div>
                  <button class="feedback__submit">Отправить</button>
                </form>
              </div>
            </div>
            <div class="contacts__map" id="google-map">
              <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d38994.933495928395!2d4.8934563!3d52.3489599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d993e16c994ddcb!2sMunttoren!5e0!3m2!1sru!2sua!4v1643041337292!5m2!1sru!2sua"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe> -->
            </div>
          </div>
        </div>
      </main>
      <script>
        function initGoogleMap() {
          var coordinates = new google.maps.LatLng(52.3489599, 4.8934563);
          var map = new google.maps.Map(document.getElementById("google-map"), {
            center: coordinates,
            zoom: 18,
            mapId: "b2db2156dc95d808",
          });
          var marker = new google.maps.Marker({
            position: coordinates,
            map: map,
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8FfC788YUCv9zjicBlu5WrePqZ4gryHQ&callback=initGoogleMap"></script>
</x-app-layout>
