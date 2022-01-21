<!-- This is the Header from Backend -->
<div class="top">
  <strong class="logo">
    <a href="#"><img src="{{url('images/logo.png')}}" alt="image description" width="223" height="44"></a></strong>
<div class="content-block">
  <header class="content-top">
      <nav class="main-menu">
        <ul>
          <li id="hotel_admin" class="{{ (request()->is('hotel-administration')) ? 'active' : '' }} {{ (request()->is('hotel-details')) ? 'active' : '' }} {{ (request()->is('hotel-edit*')) ? 'active' : '' }} {{ (request()->is('room-edit*')) ? 'active' : '' }} {{ (request()->is('rooms-overview')) ? 'active' : '' }} {{ (request()->is('add-room*')) ? 'active' : '' }}">
            <a href="{{url('/hotel-administration')}}">Hotel Administration</a>
          </li>
          <li id="availability-li" class="{{ (request()->is('availability-overview')) ? 'active' : '' }}">
            <a href="{{url('/availability-overview')}}">Availability</a>
          </li>
          <li class="{{ (request()->is('currency-overview')) ? 'active' : '' }} {{ (request()->is('add-currency')) ? 'active' : '' }}">
            <a href="{{url('/currency-overview')}}">Currency</a>
          </li>
          <!-- <li class="{{ (request()->is('sitemanager')) ? 'active' : '' }}">
            <a href="{{url('/sitemanager')}}">Sitemanager</a>
          </li> -->
          <li class="{{ (request()->is('islands')) ? 'active' : '' }} {{ (request()->is('add-islands')) ? 'active' : '' }} {{ (request()->is('islands-edit*')) ? 'active' : '' }}" >
            <a href="{{url('/islands')}}">Islands</a>
          </li>
          <li class="{{ (request()->is('atolls')) ? 'active' : ''  }}  {{ (request()->is('add-atoll')) ? 'active' : ''  }} {{ (request()->is('atoll-edit*')) ? 'active' : ''  }}">

            <a href="{{url('/atolls')}}">Atolls</a>
          </li>
          <li class="{{ (request()->is('tp-header-texts')) ? 'active' : '' }}">
            <a href="{{url('/tp-header-texts')}}">Teaser Page - Header Texts</a>
          </li>
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else


          <li class="nav-item dropdown logoutbt" style="margin:9px 100px">
              <span class="board1 float-right">
             <span class="labls">
              <?php
              $hid= @request()->route()->parameters['id'];
              // dd($hid);
              if(isset($hid)){
              $hotelname=App\Hotel::select('id','hotel_name','status')->where('id',$hid)->first();



              ?>

              <label>{{$hotelname['hotel_name']}} </label>
                <label class="switch bt4">
                  <?php if($hotelname['status']==1) {?>
                <input type="checkbox" checked disabled="disabled">
                <?php } else{?>
                  <input type="checkbox" disabled="disabled">
                  <?php }?>
              <span class="slider round"></span>
              </label>

               <label>  | &nbsp; HOTEL ID: {{$hotelname['id']}} </label>

               </span>




                </span>

              <?php } ?>
            </li>


            <li class="nav-item dropdown logoutbt" style="color: #006a9a; font-size: 16px; text-decoration: underline;
  text-decoration-color: #006a9a; ">
  <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                   <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout X') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  <!-- </div> -->
              </li>
          @endguest
        </ul>
      </nav>
<!-- <div class="search-hotel">
          <form action="#">
            <input type="text" placeholder="Search Island / ID">
            <button type="button" class="search-btn"><span class="fas fa-search"></span></button>
          </form>
        </div> -->
    </header>
  </div>
</div>
