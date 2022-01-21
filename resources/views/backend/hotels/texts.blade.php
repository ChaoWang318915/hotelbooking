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
					<li class="active"><a href="{{url('/texts',$hid)}}">Teaser Texts</a></li>
					<li><a href="{{url('/hotel-texts',$hid)}}">Hotel Texts</a></li>
					<li><a href="{{url('/hotel-features',$hid)}}">Hotel Features</a></li>
					<li><a href="{{url('/info-pages',$hid)}}">Info Pages</a></li>
					<li><a href="{{url('/content',$hid)}}">Content</a></li>
				</ul>
			</div>
			<div class="details-form" style="max-width: 65%">
				<form action="{{url('text_update',$hid)}}" id="text_form" method="post">
                  @csrf
					<div class="field">
						<label for="lbl-004">Standard Teaser Text</label>
						<div class="input-wrap">
							<textarea id="lbl-014" rows="10" name="standard_teaser_text">{!!old('standard_teaser_text', isset($teaser_text) ? $teaser_text->standard_teaser_text : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Diver</label>
						<div class="input-wrap">
						<textarea id="lbl-015" rows="10" name="diver">{!!old('diver', isset($teaser_text) ? $teaser_text->diver : '') !!}</textarea>
					</div>
					</div>

					<div class="field">
						<label for="lbl-004">Family</label>
						<div class="input-wrap">
							<textarea id="lbl-016" rows="10" name="family">{!!old('family', isset($teaser_text) ? $teaser_text->family : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Luxury</label>
						<div class="input-wrap">
							<textarea id="lbl-017" rows="10" name="luxury">{!!old('luxury', isset($teaser_text) ? $teaser_text->luxury : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Honeymoon</label>
						<div class="input-wrap">
							<textarea id="lbl-018" rows="10" name="honeymoon">{!!old('honeymoon', isset($teaser_text) ? $teaser_text->honeymoon : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Recreation</label>
						<div class="input-wrap">
							<textarea id="lbl-019" rows="10" name="recreation">{!!old('recreation', isset($teaser_text) ? $teaser_text->recreation : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Friends of the Maldives</label>
						<div class="input-wrap">
							<textarea id="lbl-020" rows="10" name="friends_of_maldives">{!!old('friends_of_maldives',isset($teaser_text) ? $teaser_text->friends_of_maldives : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Best ager</label>
						<div class="input-wrap">
							<textarea id="lbl-021" rows="10" name="best_ager">{!!old('best_ager',isset($teaser_text) ? $teaser_text->best_ager : '') !!}</textarea>
						</div>
					</div>

					<div class="field">
						<label for="lbl-004">Adult Only</label>
						<div class="input-wrap">
							<textarea id="lbl-021" rows="10" name="adults_only">{!!old('adults_only',isset($teaser_text) ? $teaser_text->adults_only : '') !!}</textarea>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    $('#hotel_admin').addClass('active');
    $('#texts').addClass('active');

   //  tinymce.init({selector:'textarea#lbl-014'});
  	// tinymce.init({selector:'textarea#lbl-015'});
  	// tinymce.init({selector:'textarea#lbl-016'});
  	// tinymce.init({selector:'textarea#lbl-017'});
  	// tinymce.init({selector:'textarea#lbl-018'});
  	// tinymce.init({selector:'textarea#lbl-019'});
  	// tinymce.init({selector:'textarea#lbl-020'});
  	// tinymce.init({selector:'textarea#lbl-021'});
});
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#text_form').submit();
 });
});
</script> 
@endsection
