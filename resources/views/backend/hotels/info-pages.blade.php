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
  							<li ><a href="{{url('/hotel-features',$hid)}}">Hotel Features</a></li>
  							<li class="active"><a href="{{url('/info-pages',$hid)}}">Info Pages</a></li>
  							<li><a href="{{url('/content',$hid)}}">Content</a></li>
  						</ul>
  					</div>
            <div class="details-form" style="max-width: 65%">
  						<form action="{{route('info-pages-update',$hid)}}" method="post" id="info_form">
                         @csrf
  							<div class="field">
  								<label for="lbl-004">Contentbox 1</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-014" rows="10" name="contentbox1">{!!old('contentbox1', isset($info) ? $info->contentbox1 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 2</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-015" rows="10" name="contentbox2">{!!old('contentbox2', isset($info) ? $info->contentbox2 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 3</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-016" rows="10" name="contentbox3">{!!old('contentbox3', isset($info) ? $info->contentbox3 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 4</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-017" rows="10" name="contentbox4">{!!old('contentbox4', isset($info) ? $info->contentbox4 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 5</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-018" rows="10" name="contentbox5">{!!old('contentbox5', isset($info) ? $info->contentbox5 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 6</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-019" rows="10" name="contentbox6">{!!old('contentbox6', isset($info) ? $info->contentbox6 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 7</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-020" rows="10" name="contentbox7">{!!old('contentbox7', isset($info) ? $info->contentbox7 : '') !!}</textarea>
  							  </div>
  							</div>

  							<div class="field">
  								<label for="lbl-004">Contentbox 8</label>
  								<div class="input-wrap">
  								  <textarea id="lbl-021" rows="10" name="contentbox8">{!!old('contentbox8', isset($info) ? $info->contentbox8 : '') !!}</textarea>
  							  </div>
  							</div>

  						</form>
  					</div>
  				</div>
  </div>
</div>

<script>
$(document).ready(function(){

    $('#hotel_admin').addClass('active');
    $('#texts').addClass('active');

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
    
     $('#info_form').submit();
 });
});
</script> 
@endsection
