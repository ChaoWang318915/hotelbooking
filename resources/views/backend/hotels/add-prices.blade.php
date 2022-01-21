@extends('layouts.backend')
@section('content')

    <div class="d-flex">
      
      <div class="main-sidebar"></div>
      <div class="content-area">
        <nav class="content-menu">
					<ul class="nav">
						<li><a href="{{url('/price-overview')}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li><a href="#"><span class="far fa-save"></span>save</a></li>
						<li><a href="#"><span class="far fa-edit"></span>edit</a></li>
						<li><a href="#"><span class="far fa-trash-alt"></span>delete</a></li>
						<!-- <li class="discount-block">
							<form action="#">
								<input type="text" class="form-control">
								<input type="submit" value="% calculate">
							</form>
						</li> -->
					</ul>
				</nav>
  <!-- /content-menu -->
@include('includes.inner_nav')
  <!-- /main-tabset -->
  <?php 
      $hid=request()->route('id');
      $did=request()->route('did');
      ?>
  <div class="tab-block">
   <!--  <div class="tab-sidebar">
      <div class="tab-sidebar-box">
        <h3>Room Rates</h3>
        <nav>
          <ul>
            <li class="active"><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Menuplan</h3>
        <nav>
          <ul>
            <li><a href="{{url('/price-menuplan')}}">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>Transfer</h3>
        <nav>
          <ul>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
      <div class="tab-sidebar-box">
        <h3>additional service</h3>
        <nav>
          <ul>
            <li><a href="#">27.12.2018 - 10.01.2019</a></li>
          </ul>
        </nav>
      </div>
    </div> -->
    <div class="tab-content">
      <!-- <div class="discount-form">
        <form action="#">
          <label for="lbl-001">Rate Code</label>
          <input type="text" class="form-control" id="lbl-001">
        </form>
      </div> -->
      
      <div class="table-blue-holder">
        @foreach($rooms as $room)
        <header class="table-head"><h4>{{$room->room_name}}</h4></header>
        <form action="#">
          <table>
            <tr>
              <?php $da=App\Rate_date::select('id','hotel_id','from','to')->where('id',$did)->first();?>
              <th>{{$da->from}} - {{$da->to}}</th>
              <th>Single</th>
              <th>Double</th>
              <th>Tripple</th>
              <th>Room</th>
              <th>Extra Pax</th>
              <th>Baby</th>
              <th>Child</th>
              <th>Teen</th>
              <th>Menuplan</th>
              <th>Price Status</th>
              <th>Minimum Stay</th>
            </tr>
            <tr>
              <td><input type="hidden" name="date_id" value={{$did}}></td>
              <td><input type="text" class="form-control" value="402"></td>
              <td><input type="text" class="form-control" value="472"></td>
              <td><input type="text" class="form-control" value="638"></td>
              <td><input type="text" class="form-control" value="0"></td>
              <td><input type="text" class="form-control" value="0"></td>
              <td><input type="text" class="form-control" value="7"></td>
              <td><input type="text" class="form-control" value="119"></td>
              <td><input type="text" class="form-control" value="0"></td>
              <td style="text-align: center"><select class="form-control">
                <option>Please select</option>
                <option>Breakfast</option>
                <option>Halfboard</option>
                <option>Fullboard</option>
                <option>All Inclusive</option>
              </select></td>
              <td style="text-align: center"><select class="form-control">
                <option>Please select</option>
                <option>Regular Price</option>
                <option>On Request</option>
                <option>Special Price</option>
              </select></td>
              <td style="text-align: center"><input type="text" class="form-control" value="3"></td>
            </tr>
          </table>
        </form>
        @endforeach
      </div>
      
    </div>
  </div>
</div>
</div>

<script>
$(document).ready(function(){
    $('#rates').addClass('active');
});
</script>
@endsection
