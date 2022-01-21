@extends('layouts.backend')
@section('content')
<div class="d-flex">
	<?php 
        $hid=request()->route('id');
         ?>
<div class="main-sidebar"></div>
      <div class="content-area">

        <nav class="content-menu">
					<ul class="nav">
						<li><a href="{{url('hotel-edit',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
						<li>
							@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
						</li>	
					</ul>

				</nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        
         @if ($errors->any())
			<div class="alert alert-danger">
			  <ul>
			    @foreach ($errors->all() as $error)
			    <li>{{ $error }}</li>
			    @endforeach
			  </ul>
			</div>
			@endif
        <div class="content content-discount">
					<div class="details-form">
						<form action="{{route('discount-create',$hid)}}" method="post" id="discount_form">
							@csrf
							<h3 class="form-name">Add a Discount</h3>
						   <div class="radio-group">
								<div class="radio-item">
									<input type="radio" name="discount_type" checked value="Fix Amount" id="Fix-Amount">
									<label>Fix Amount</label>
								</div>
								<div class="radio-item">
									<input type="radio" name="discount_type" value="Percent" id="Percent">
									<label>Percent</label>
								</div>
								<div class="radio-item">
									<input type="radio" name="discount_type"  value="Free-Night" id="Free-Night">
									<label>Free-Night</label>
								</div>
							</div>

							<div class="field">
								<label>Discount Name*</label>
								<input type="text" name="discount_name">
							</div>
							<div class="field">
								<label>Discount Code*</label>
								<input type="text" name="discount_code">
							</div>
							<div class="field">
								<label>Minimum Stay*</label>
								<select id="lbl-021" name="minimum_stay">
									<option value="">Please select</option>
									<option value="3">Min. Stay 3 nights</option>
									<option value="5">Min. Stay 5 nights</option>
									<option value="7">Min. Stay 7 nights</option>
									<option value="10">Min. Stay 10 nights</option>
									<option value="14">Min. Stay 14 nights</option>
								</select>
							</div>

							<div class="period">
								<div class="field">
									<label>Booking Period*</label>
									<div class="items">
										<div class="item">
											<input type="date" name="booking_period_from">
											<label>from</label>
										</div>
										<div class="item">
											<input type="date" name="booking_period_to">
											<label>to</label>
										</div>
									</div>
								</div>
								<div class="field">
									<label>Travel Period*</label>
									<div class="items">
										<div class="item">
											<input type="date" name="travel_period_from">
											<label>from</label>
										</div>
										<div class="item">
											<input type="date" name="travel_period_to">
											<label>to</label>
										</div>
									</div>
								</div>
								
							</div>

							<h3 class="form-name">Room</h3>
							@foreach($rooms as $room)
							<div class="field field-disc-check">
								<label>{{$room->room_name}}</label>
								<!-- <input type="checkbox" name="room_id[]" class="roomids" value="{{$room->room_name}}"> -->
								<div class="d1190">



									<p>
									<input class="form-check-input " type="checkbox" value="" >
						
									 <label class="form-check-label" for="flexCheckChecked" style="margin-left: 30px">  Single  </label>
								 
     </p>
  <p><input class="form-check-input " type="checkbox" value="" > 
  <label class="form-check-label" for="flexCheckChecked" style="margin-left: 30px"> Double </label> </p>

    <p><input class="form-check-input " type="checkbox" value="" >
  <label class="form-check-label" for="flexCheckChecked" style="margin-left: 30px">  Tripple </label></p>
 
    <p><input class="form-check-input " type="checkbox" value="" >
  <label class="form-check-label" for="flexCheckChecked" style="margin-left: 30px">  Extra Pax </label></p>
 
  </div>

 



							</div>

							@endforeach
							<div class="input-link">
								<a href="javascript:void(0)" onclick="selectAll()">Select all</a>
								<a href="javascript:void(0)" onclick="selectNone()">Select none</a>
							</div>
							<div class="inputs-holder" id="reduction-div">
								<div class="field">
									<label>Reduction</label>
									<div class="input-wrap">
										<input type="text" name="reduction">
									</div>
								</div>


							</div>

							<div class="inputs-holder" id="Free-Night-div" style="display:none;">
								<div class="field">
									<label>From which day on:</label>
									<div class="input-wrap">
										<input type="text" name="free_night_days">
									</div>
								</div>
								<div class="field">
									<label>Repeat after X days?</label>
									<div class="input-wrap">
										<input type="checkbox" name="free_night_repeat" class="" value="1">
									</div>
								</div>
								<div class="field">
									<label>Free-Nights:</label>
									<div class="input-wrap">
										<input type="text" name="free_night_value">
									</div>
								</div>


							</div>
						</form>
					</div>
         <!-- Table with the existing Discounts starts here -->
					<div class="current-discount">
						<h3 class="form-name">Current Discount</h3>
						<table class="current-discount-table">
							<thead>
								<tr>
									<th>Room Name</th>
									<th>Booking Period</th>
									<th>Travel Period</th>
									<th>Discount Type</th>
									<th>Discount Name</th>
									<th>Discount Code</th>
									<th>Reduction</th>
									<th>Ratefield</th>

								</tr>
							</thead>
							<tbody>
								@foreach($discounts as $discount)
								<tr>
									<td><a title="Edit" href="{{route('discount-edit',['id'=>$hid,'did'=>$discount->id])}}">{{$discount->room_id}} </a></td>
									<td>{{date("d-m-Y", strtotime($discount->booking_period_from))}} - {{date("d-m-Y", strtotime($discount->booking_period_to))}}</td>
									<td>{{date("d-m-Y", strtotime($discount->travel_period_from))}} - {{date("d-m-Y", strtotime($discount->travel_period_to))}}</td>
									<td>{{$discount->discount_type}}</td>
									<td>{{$discount->discount_name}}</td>
									<td>{{$discount->discount_code}}</td>
									<td>{{$discount->reduction}}</td>
									<td></td>
									<td class="btn-holder">
										<a onclick="return confirm('Are you sure?')" href="{{route('discount-delete',['id'=>$hid,'did'=>$discount->id])}}" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								@endforeach
								<!-- <tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr>
								<tr>
									<td>Standard Zimmer</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>27.12.2018 - 10.01.2019</td>
									<td>Fixbettrag100</td>
									<td>Early Bird Discount</td>
									<td>CDFRES23</td>
									<td class="btn-holder">
										<a href="#" class="btn-delete">
											<span class="far fa-trash-alt"></span>
											<span>Delete</span>
										</a>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
      </div>
</div>

<script>

function selectAll(){
  		$('.roomids').attr('checked','checked');
  	}

  	function selectNone(){
  		$('.roomids').removeAttr('checked');
  	}

	$(document).ready(function(){
    $('#hotel_admin').addClass('active');
});
$(document).ready(function(){
    $('#discounts').addClass('active');
});

</script>
   <script type="text/javascript">
  $(document).ready(function(){



  $('#button_id').on('click',function(){
    
     $('#discount_form').submit();
 });
});


  $(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'Free-Night') {
            $('#Free-Night-div').show();           
            $('#reduction-div').hide();           
       }

       else {
            $('#Free-Night-div').hide();   
            $('#reduction-div').show();   
       }
   });
});
</script> 
@endsection
