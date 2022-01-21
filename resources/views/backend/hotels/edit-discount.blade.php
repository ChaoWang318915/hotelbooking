@extends('layouts.backend')
@section('content')
<div class="d-flex">
<div class="main-sidebar"></div>
      <div class="content-area">
        <nav class="content-menu">
					<ul class="nav">
						<li><a href="{{url('hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
					</ul>
				</nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        <?php 
        $hid=request()->route('id');
         ?>
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
						<form action="{{route('discount-update',[$hid,$discounts->id])}}" method="post" id="discount_form">
							@csrf
							<h3 class="form-name">Add a Discount</h3>
						   <div class="radio-group">
								<div class="radio-item">
									<input type="radio" name="discount_type" @if($discounts->discount_type == 'Fix Amount') checked @endif value="Fix Amount" id="Fix-Amount">
									<label>Fix Amount</label>
								</div>
								<div class="radio-item">
									<input type="radio" name="discount_type" @if($discounts->discount_type == 'Percent') checked @endif value="Percent" id="Percent">
									<label>Percent</label>
								</div>
								<div class="radio-item">
									<input type="radio" name="discount_type"  value="Free-Night" id="Free-Night" @if($discounts->discount_type == 'Free-Night') checked @endif>
									<label>Free-Night</label>
								</div>
							</div>

							<div class="field">
								<label>Discount Name</label>
								<input type="text" name="discount_name" value="{{$discounts->discount_name }}">
							</div>
							<div class="field">
								<label>Discount Code</label>
								<input value="{{$discounts->discount_code }}" type="text" name="discount_code">
							</div>
							<div class="field">
								<label>Minimum Stay</label>
								<select id="lbl-021" name="minimum_stay">
									<option value="3" @if($discounts->minimum_stay =="3") selected @endif >Min. Stay 3 nights</option>
									<option value="5" @if($discounts->minimum_stay =="5") selected @endif >Min. Stay 5 nights</option>
									<option value="7" @if($discounts->minimum_stay =="7") selected @endif >Min. Stay 7 nights</option>
									<option value="10" @if($discounts->minimum_stay =="10") selected @endif >Min. Stay 10 nights</option>
									<option value="14" @if($discounts->minimum_stay =="14") selected @endif >Min. Stay 14 nights</option>
								</select>
							</div>

							<div class="period">
								<div class="field">
									<label>Booking Period</label>
									<div class="items">
										<div class="item">
											<input type="date" name="booking_period_from" value="{{$discounts->booking_period_from}}">
											<label>from</label>
										</div>
										<div class="item">
											<input type="date" name="booking_period_to" value="{{$discounts->booking_period_to}}">
											<label>to</label>
										</div>
									</div>
								</div>
								<div class="field">
									<label>Travel Period</label>
									<div class="items">
										<div class="item">
											<input type="date" name="travel_period_from" value="{{$discounts->travel_period_from}}">
											<label>from</label>
										</div>
										<div class="item">
											<input type="date" name="travel_period_to" value="{{$discounts->travel_period_to}}">
											<label>to</label>
										</div>
									</div>
								</div>
							</div>

							<h3 class="form-name">Room : {{$discounts->room_id}}</h3>
							
							<div class="inputs-holder" id="reduction-div">
								<div class="field">
									<label>Reduction</label>
									<div class="input-wrap">
										<input type="text" name="reduction" value="{{$discounts->reduction}}">
									</div>
								</div>


							</div>

							<div class="inputs-holder" id="Free-Night-div" style="display:none;">
								<div class="field">
									<label>From which day on:</label>
									<div class="input-wrap">
										<input type="text" name="free_night_days" value="{{$discounts->free_night_days}}">
									</div>
								</div>
								<div class="field">
									<label>Repeat after X days?</label>
									<div class="input-wrap">
										<input type="checkbox" name="free_night_repeat" class="" value="1" value="{{$discounts->free_night_repeat}}">
									</div>
								</div>
								<div class="field">
									<label>Free-Nights:</label>
									<div class="input-wrap">
										<input type="text" value="{{$discounts->free_night_value}}" name="free_night_value">
									</div>
								</div>


							</div>
						</form>
					</div>
         <!-- Table with the existing Discounts starts here -->
				
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
