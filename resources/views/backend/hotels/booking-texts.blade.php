@extends('layouts.backend')
@section('content')

    <div class="d-flex">
      <div class="main-sidebar"></div>
      <div class="content-area">
        <nav class="content-menu">
					<ul class="nav">
						<li><a href="{{url('hotel-administration')}}"><span class="fas fa-chevron-left"></span>back</a></li>
						<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
            <li>@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif</li>
					</ul>
				</nav>
        <!-- /content-menu -->
        @include('includes.inner_nav')
        <!-- /main-tabset -->
        <?php 
        $hid=request()->route('id');
         ?>
        <div class="content content-rest">

          <div class="restaurants-tabs">
            <ul>
              <li class="active"><a href="{{url('/booking-texts',$hid)}}">Regular Price</a></li>
              <li><a href="{{url('/on-request',$hid)}}">On Request</a></li>
              <li><a href="{{url('/special-price',$hid)}}">Special Price</a></li>
            </ul>
          </div>

          <div class="details-form">
            <h3 class="form-name">Check-In / Check-Out</h3>
            <form action="{{route('regular-price-update',$hid)}}" method="post" id="regular_form">
              @csrf
              <div class="field">
                <label>Check-In</label>
                <input type="text" name="check_in" value="{{old('check_in', isset($rp) ? $rp->check_in : '') }}">
              </div>
              <div class="field">
                <label>Check-Out</label>
                <input type="text" name="check_out" value="{{old('check_out', isset($rp) ? $rp->check_out : '') }}">
              </div>
            
          </div>


          <div class="details-form" style="max-width:80%;">
            <h3 class="form-name">Check-in Texts</h3>
            
              <div class="field">
                <label for="lbl-024">Info Check-In</label>
                <textarea id="lbl-034" rows="14" name="info_check_in" >{{old('info_check_in', isset($rp) ? $rp->info_check_in : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-044">No arrival allowed on</label>
                <textarea id="lbl-055" rows="5" name="no_arrival_allowed_on">{{old('no_arrival_allowed_on', isset($rp) ? $rp->no_arrival_allowed_on : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-054">Required at check-in</label>
                <textarea id="lbl-066" rows="5" name="required_at_check_in">{{old('required_at_check_in', isset($rp) ? $rp->required_at_check_in : '') }}</textarea>
              </div>
      
          </div>

          <div class="details-form">
            <h3 class="form-name">Can be cancelled free of charge until</h3>
              
              <div class="field">
                  <label>Days before arrival</label>
                <input type="text" name="days_before_arrival" value="{{old('days_before_arrival', isset($rp) ? $rp->days_before_arrival : '') }}">
              </div>
            
          </div>

          <div class="details-form" style="max-width: 80%;">
            <h3 class="form-name">Payments Texts</h3>
          

              <div class="field">
                <label for="lbl-004">Cancellation Policy</label>
                <textarea id="lbl-017" rows="5" name="cancellation_policy">{{old('cancellation_policy', isset($rp) ? $rp->cancellation_policy : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Payment Information</label>
                <textarea id="lbl-018" rows="10" name="payment_information">{{old('payment_information', isset($rp) ? $rp->payment_information : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Price Information</label>
                <textarea id="lbl-019" rows="10" name="price_information">{{old('price_information', isset($rp) ? $rp->price_information : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Important Information for your booking</label>
                <textarea id="lbl-020" rows="10" name="information_booking">{{old('information_booking', isset($rp) ? $rp->information_booking : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Inclusive</label>
                <textarea id="lbl-021" rows="10" name="inclusive">{{old('inclusive', isset($rp) ? $rp->inclusive : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Costs to be paid on Site</label>
                <textarea id="lbl-021" rows="10" name="costs_paid_site">{{old('costs_paid_site', isset($rp) ? $rp->costs_paid_site : '') }}</textarea>
              </div>

              <div class="field">
                <label for="lbl-004">Hotel Policy</label>
                <textarea id="lbl-021" rows="10" name="hotel_policy">{{old('hotel_policy', isset($rp) ? $rp->hotel_policy : '') }}</textarea>
              </div>

              <div class="field" style="display:none">
                <label for="lbl-004">Regelung für Kinder</label>
                <textarea id="lbl-021" rows="10" name="free_container">{{old('free_container', isset($rp) ? $rp->free_container : '') }}</textarea>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

<script>
$(document).ready(function(){
    $('#btexts').addClass('active');
    $('#hotel_admin').addClass('active');

});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#regular_form').submit();
 });
});
</script> 
@endsection
