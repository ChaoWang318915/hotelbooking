@extends('layouts.backend')
@section('content')
<?php 
      $hid=request()->route('id');
       ?>
<div class="d-flex">
  <div class="main-sidebar"></div>
  <div class="content-area">
    <nav class="content-menu">
			<ul class="nav">
    
				<li><a href="{{url('hotel-edit',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
				<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
        <li>
            @include('backend.message')
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
    <div class="content content-additional">
      <div class="details-form">
        <form action="{{url('transfers-update',$hid)}}" method="post"  id="transfer_form">
          @csrf
          <h3 class="form-name">Transfer</h3>
            <div class="field">
              <label>VIP Lounge</label>
              <input type="checkbox" name="vip_lounge" {{ isset($transfer) ? $transfer->vip_lounge == '1' ? 'checked=checked' :'' :'' }} >
            </div>

            <div class="field field-tranfer">
              <label>Waterplane</label>
              <div class="holder">
                <div class="input-wrap">
                  <p class="input-desc">Distance in km</p>
                  <input type="text" name="waterplane_distance" value="{{ old('waterplane_distance', isset($transfer) ? $transfer->waterplane_distance : '') }}" >
                </div>
                <div class="input-wrap">
                  <p class="input-desc">Duration in min.</p>
                  <input type="text" name="waterplane_duration" value="{{ old('waterplane_duration', isset($transfer) ? $transfer->waterplane_duration : '') }}">
                </div>
                <div class="input-wrap">
                  <p class="input-desc">Recom</p>
                  <input type="checkbox" name="waterplane_recom" style="margin: 15px 0" {{ isset($transfer) ? $transfer->waterplane_recom == '1' ? 'checked=checked' :'' :'' }} >
                </div>
                <div class="input-wrap">
                  <p class="input-desc">Availability</p>
                  <input type="checkbox" style="margin: 15px 0" name="waterplane_aval" {{ isset($transfer) ? $transfer->waterplane_aval == '1' ? 'checked=checked' :'' :'' }} >
                </div>
              </div>
            </div>

            <div class="field field-tranfer">
              <label>Domestic</label>
              <div class="holder">
                <div class="input-wrap">
                  <input type="text" name="domestic_distance" value="{{ old('domestic_distance', isset($transfer) ? $transfer->domestic_distance : '') }}">
                </div>
                <div class="input-wrap">
                  <input type="text" name="domestic_duration" value="{{ old('domestic_duration', isset($transfer) ? $transfer->domestic_duration : '') }}">
                </div>
                <div class="input-wrap">
                  <input type="checkbox" name="domestic_recom" {{ isset($transfer) ? $transfer->domestic_recom == '1' ? 'checked=checked' :'' :'' }}>
                </div>
                <div class="input-wrap">
                  <input type="checkbox" style="margin: 10px 0" name="domestic_aval" {{ isset($transfer) ? $transfer->domestic_aval == '1' ? 'checked=checked' :'' :'' }}>
                </div>
              </div>
            </div>

            <div class="field field-tranfer">
              <label>Speedboat</label>
              <div class="holder">
                <div class="input-wrap" >
                  <input type="text" name="speedboat_distance" value="{{ old('speedboat_distance', isset($transfer) ? $transfer->speedboat_distance : '') }}" >
                </div>
                <div class="input-wrap">
                  <input type="text" name="speedboat_duration" value="{{ old('speedboat_duration', isset($transfer) ? $transfer->speedboat_duration : '') }}" >
                </div>
                <div class="input-wrap">
                  <input type="checkbox" name="speedboat_recom" {{ isset($transfer) ? $transfer->speedboat_recom == '1' ? 'checked=checked' :'' :'' }}>
                </div>
                <div class="input-wrap">
                  <input type="checkbox" style="margin: 10px 0" name="speedboat_aval" {{ isset($transfer) ? $transfer->speedboat_aval == '1' ? 'checked=checked' :'' :'' }}>
                </div>
              </div>
            </div>

            <div class="field field-tranfer">
              <label>Ferry</label>
              <div class="holder">
                <div class="input-wrap">
                  <input type="text" name="ferry_distance"  value="{{ old('ferry_distance', isset($transfer) ? $transfer->ferry_distance : '') }}">
                </div>
                <div class="input-wrap">
                  <input type="text" name="ferry_duration" value="{{ old('ferry_duration', isset($transfer) ? $transfer->ferry_duration : '') }}">
                </div>
                <div class="input-wrap">
                  <input type="checkbox" name="ferry_recom" {{ isset($transfer) ? $transfer->ferry_recom == '1' ? 'checked=checked' :'' :'' }}>
                </div>
                <div class="input-wrap">
                  <input type="checkbox" style="margin: 10px 0" name="ferry_aval" {{ isset($transfer) ? $transfer->ferry_aval == '1' ? 'checked=checked' :'' :'' }}>
                </div>
              </div>
            </div>

              <h3 class="form-name">Description</h3>
              <div class="field field-right">
                <textarea id="lbl-019" rows="10" name="description">{{ old('description', isset($transfer) ? $transfer->description : '') }}</textarea>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#transfer').addClass('active');
});
  $(document).ready(function(){
    $('#hotel_admin').addClass('active');
});
  
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#transfer_form').submit();
 });
});
</script> 
@endsection
