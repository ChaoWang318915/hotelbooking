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
  							<li><a href="{{url('/texts',$hid)}}">Teaser Texts</a></li>
  							<li ><a href="{{url('/hotel-texts',$hid)}}">Hotel Texts</a></li>
  							<li class="active"><a href="{{url('/hotel-features',$hid)}}">Hotel Features</a></li>
  							<li><a href="{{url('/info-pages',$hid)}}">Info Pages</a></li>
  							<li><a href="{{url('/content',$hid)}}">Content</a></li>
  						</ul>
  					</div>
  					<div class="details-form" style="max-width: 65%">
  						<form action="{{route('hotel-features-update',$hid)}}" method="post" id="feature_form">
                           @csrf
  							<div class="field">
  								<label for="lbl-004">Hotel</label>
  								<div class="input-wrap">
  									<textarea id="lbl-014" rows="5" name="text_hotel">{!!old('text_hotel', isset($hotel_feature) ? $hotel_feature->text_hotel : '') !!}</textarea>
  								</div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Hotel Features</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-015" rows="10" name="hotel_features">{!!old('hotel_features', isset($hotel_feature) ? $hotel_feature->hotel_features : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Sport & Recreation</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-016" rows="15" name="sport_recreation">{!!old('sport_recreation', isset($hotel_feature) ? $hotel_feature->sport_recreation : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Entertainment</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-017" rows="5" name="entertainment">{!!old('entertainment', isset($hotel_feature) ? $hotel_feature->entertainment : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Guestservice</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-018" rows="5" name="guestservice">{!!old('guestservice', isset($hotel_feature) ? $hotel_feature->guestservice : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Spa & Wellness</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-019" rows="5" name="spa_wellnaess">{!!old('spa_wellnaess', isset($hotel_feature) ? $hotel_feature->spa_wellnaess : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Catering</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-020" rows="5" name="catering">{!!old('catering', isset($hotel_feature) ? $hotel_feature->catering : '') !!}</textarea>
  							  </div>
  							</div>

  						</form>
  					</div>
  				</div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#texts').addClass('active');
    $('#hotel_admin').addClass('active');

    // tinymce.init({selector:'textarea#lbl-014'});
    // tinymce.init({selector:'textarea#lbl-015'});
    // tinymce.init({selector:'textarea#lbl-016'});
    // tinymce.init({selector:'textarea#lbl-017'});
    // tinymce.init({selector:'textarea#lbl-018'});
    // tinymce.init({selector:'textarea#lbl-019'});
    // tinymce.init({selector:'textarea#lbl-020'});
    // tinymce.init({selector:'textarea#lbl-021'});
   
});
</script>
    <script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#feature_form').submit();
 });
});
</script> 

@endsection
