<!-- This are the TABS in Backend -->
    <?php
      $hid=request()->route('id');
    ?>
<nav class="main-tabset">
<ul>
    <li id="hDetails"><a href="{{url('/hotel-edit/'.$hid)}}">Hotel Details</a></li>
    <li id="rooms"><a href="{{url('/rooms-overview',$hid)}}">Rooms</a></li>
    <li id="rates"><a href="{{url('/price-overview',$hid)}}">Rates</a></li>
    <li id="discounts"><a href="{{url('/discounts',$hid)}}">Discounts</a></li>
    <li id="includes"><a href="{{url('/include-overview',$hid)}}">Hotel Includes</a></li>
    <li id="rest_bar"><a href="{{url('/restaurants-bars-overview',$hid)}}">Restaurants & Bars</a></li>
    <li id="transfer"><a href="{{url('/transfers',$hid)}}">Transfer</a></li>
    <li id="tag"><a href="{{url('/tag-manager',$hid)}}">Tag-Manager</a></li>
    <li id="texts"><a href="{{url('/texts',$hid)}}">Texts</a></li>
    <li id="btexts"><a href="{{url('/booking-texts',$hid)}}">Booking Texts</a></li>
  </ul>
</nav>
