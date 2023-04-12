@extends('admin.layout')
@section('page_title')
    Administración | Global Re
@endsection
@section('tab_title')
    <div id="date"></div>
    <script>
        function updateClock() {
            const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
                'octubre', 'noviembre', 'diciembre'
            ];
            const days = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

            const now = new Date();
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hour = now.getHours().toString().padStart(2, '0');
            const minute = now.getMinutes().toString().padStart(2, '0');
            const second = now.getSeconds().toString().padStart(2, '0');

            const dateString = `Global Reinsurance Broker Inc. | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('content')
    <style>
        .main-overview .overviewCard i {
            color: white;
            font-size: 1.75rem;
        }
    </style>
    <div class="main-header">
        <div class="main-header__intro-wrapper">
            <div class="main-header__welcome">
                <div class="main-header__welcome-title text-light">
                    @if ($user->sex === 'Femenino')
                        Bienvenida,
                    @else
                        Bienvenido,
                    @endif
                    <strong>{{ $user->name }}</strong>
                </div>
                <div class="main-header__welcome-subtitle text-light">Que tengas un excelente día.</div>
            </div>
            {{-- <div class="quickview">
            <div class="quickview__item">
                <div class="quickview__item-total">41</div>
                <div class="quickview__item-description">
                    <i class="far fa-calendar-alt"></i>
                    <span class="text-light">Cotizaciones</span>
                </div>
            </div>
            <div class="quickview__item">
                <div class="quickview__item-total">64</div>
                <div class="quickview__item-description">
                    <i class="far fa-comment"></i>
                    <span class="text-light">Notificaciones</span>
                </div>
            </div>
            <div class="quickview__item">
                <div class="quickview__item-total">0</div>
                <div class="quickview__item-description">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="text-light">Co-brokerajes</span>
                </div>
            </div>
        </div> --}}
        </div>
    </div>
    <div class="main-overview">
        <div class="overviewCard" onclick="window.location.href='{{ route('user.index') }}'">
            <div class="overviewCard-icon overviewCard-icon--document">
                <i class="fa-regular fa-user"></i>
            </div>
            <div class="overviewCard-description">
                <h3 class="overviewCard-title text-light">Administrar <strong>Usuarios</strong></h3>
                <p class="overviewCard-subtitle">{{ '(' . sizeof($users) . ') Usuarios registrados.' }}</p>
            </div>
        </div>
        <div class="overviewCard" onclick="window.location.href='{{ url('/admin/comercial/new_compromiso') }}'">
            <div class="overviewCard-icon overviewCard-icon--calendar">
                <i class="far fa-file-alt"></i>
                {{-- <i class="far fa-calendar-check"></i> --}}
            </div>
            <div class="overviewCard-description">
                <h3 class="overviewCard-title text-light">Nueva <strong>Cotización</strong></h3>
                <p class="overviewCard-subtitle">{{ '(' . sizeof($slips) . ') Cotizaciones realizadas.' }}</p>
            </div>
        </div>
        <div class="overviewCard" onclick="window.location.href='{{ url('/clientes_directos') }}'">
            <div class="overviewCard-icon overviewCard-icon--mail">
                <i class="fa-regular fa-handshake"></i>
                {{-- <i class="fa-solid fa-envelope"></i> --}}
            </div>
            <div class="overviewCard-description">
                <h3 class="overviewCard-title text-light">Clientes <strong>Directos</strong></h3>
                <p class="overviewCard-subtitle">{{ '(' . sizeof($sercops) . ') Clientes Directos.' }}</p>
            </div>
        </div>
        <div class="overviewCard" onclick="window.location.href='{{ url('/reinsurer') }}'">
            <div class="overviewCard-icon overviewCard-icon--photo">
                <i class="fa-regular fa-folder-open"></i>
            </div>
            <div class="overviewCard-description">
                <h3 class="overviewCard-title text-light">Brokers de <strong>Reaseguros</strong></h3>
                <p class="overviewCard-subtitle">{{ '(' . sizeof($brokers) . ') Brokers de reaseguros.' }}</p>
            </div>
        </div>
    </div>
    <!-- /.main__overview -->

    {{-- <div class="main__cards">
<div class="card">
  <div class="card__header">
    <div class="card__header-title text-light">Your <strong>Events</strong>
      <a href="#" class="card__header-link text-bold">View All</a>
    </div>
    <div class="settings">
      <div class="settings__block"><i class="fas fa-edit"></i></div>
      <div class="settings__block"><i class="fas fa-cog"></i></div>
    </div>
  </div>
  <div class="card__main">
    <div class="card__row">
      <div class="card__icon"><i class="fas fa-gift"></i></div>
      <div class="card__time">
        <div>today</div>
      </div>
      <div class="card__detail">
        <div class="card__source text-bold">Jonathan G</div>
        <div class="card__description">Going away party at 8:30pm. Bring a friend!</div>
        <div class="card__note">1404 Gibson St</div>
      </div>
    </div>
    <div class="card__row">
      <div class="card__icon"><i class="fas fa-plane"></i></div>
      <div class="card__time">
        <div>Tuesday</div>
      </div>
      <div class="card__detail">
        <div class="card__source text-bold">Matthew H</div>
        <div class="card__description">Flying to Bora Bora at 4:30pm</div>
        <div class="card__note">Delta, Gate 27B</div>
      </div>
    </div>
    <div class="card__row">
      <div class="card__icon"><i class="fas fa-book"></i></div>
      <div class="card__time">
        <div>Thursday</div>
      </div>
      <div class="card__detail">
        <div class="card__source text-bold">National Institute of Science</div>
        <div class="card__description">Join the institute for an in-depth look at Stephen Hawking</div>
        <div class="card__note">7:30pm, Carnegie Center for Science</div>
      </div>
    </div>
    <div class="card__row">
      <div class="card__icon"><i class="fas fa-heart"></i></div>
      <div class="card__time">
        <div>Friday</div>
      </div>
      <div class="card__detail">
        <div class="card__source text-bold">24th Annual Heart Ball</div>
        <div class="card__description">Join us and contribute to your favorite local charity.</div>
        <div class="card__note">6:45pm, Austin Convention Ctr</div>
      </div>
    </div>
    <div class="card__row">
      <div class="card__icon"><i class="fas fa-heart"></i></div>
      <div class="card__time">
        <div>Saturday</div>
      </div>
      <div class="card__detail">
        <div class="card__source text-bold">Little Rock Air Show</div>
        <div class="card__description">See the Blue Angels fly with roaring thunder</div>
        <div class="card__note">11:00pm, Jacksonville Airforce Base</div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card__header">
    <div class="card__header-title text-light">Recent <strong>Documents</strong>
      <a href="#" class="card__header-link text-bold">View All</a>
    </div>
    <div class="settings">
      <div class="settings__block"><i class="fas fa-edit"></i></div>
      <div class="settings__block"><i class="fas fa-cog"></i></div>
    </div>
  </div>
  <div class="card">
    <div class="documents">
      <div class="document">
        <div class="document__img"></div>
        <div class="document__title">tesla-patents</div>
        <div class="document__date">07/16/2018</div>
      </div>
      <div class="document">
        <div class="document__img"></div>
        <div class="document__title">yearly-budget</div>
        <div class="document__date">09/04/2018</div>
      </div>
      <div class="document">
        <div class="document__img"></div>
        <div class="document__title">top-movies</div>
        <div class="document__date">10/10/2018</div>
      </div>
      <div class="document">
        <div class="document__img"></div>
        <div class="document__title">trip-itinerary</div>
        <div class="document__date">11/01/2018</div>
      </div>
    </div>
  </div>
</div>
<div class="card card--finance">
  <div class="card__header">
    <div class="card__header-title text-light">Monthly <strong>Spending</strong>
      <a href="#" class="card__header-link text-bold">View All</a>
    </div>
    <div class="settings">
      <div class="settings__block"><i class="fas fa-edit"></i></div>
      <div class="settings__block"><i class="fas fa-cog"></i></div>
    </div>
  </div>
  <div id="chartdiv"></div>
</div>
</div> <!-- /.main-cards --> --}}
@endsection
