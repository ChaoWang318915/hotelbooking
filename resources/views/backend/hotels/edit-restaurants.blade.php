@extends('layouts.backend')
@section('content')

<div class="d-flex">
	<div class="main-sidebar"></div>
    <div class="content-area">
    	
        <nav class="content-menu">
			<ul class="nav">
				<?php $hid=request()->route('id');?>
				<li><a href="{{url('/restaurants-bars-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
				<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
				<li>
              @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
            </li>
				<!-- <li><a href="#"><span class="fas fa-plus"></span>add images</a></li> -->
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
        <div class="content content-rest">
			<div class="restaurants-tabs">
				<ul>
					<li class="active"><a href="">Restaurant</a></li>
					<!-- <li><a href="{{url('/add-bars',$hid)}}">Bar</a></li>
					<li><a href="{{url('/add-menuplan',$hid)}}">Menuplan</a></li> -->
				</ul>
			</div>
			<div class="details-form">
				<form action="{{route('restaurant-update',$restaurant->id)}}" method="post" id="rest_form"  enctype="multipart/form-data">
					@csrf
					<div class="field">
						<label>Restaurant name </label>
						<input type="text" name="restaurant_name" value="{{$restaurant->restaurant_name}}">
					</div>
					<div class="field">
						<label for="lbl-014">Description</label>
						<textarea id="lbl-014" rows="5" name="description">{{$restaurant->description}}</textarea>
					</div>
					<div class="field">
						<label>Cuisine</label>
						<div class="input-wrap">
							<input type="text" name="cuisine" value="{{$restaurant->cuisine}}">
							<p class="input-desc">International or food orientation</p>
						</div>
					</div>
					<div class="field">
						<label>Menu</label>
							<div class="input-wrap">
								<input type="text" name="menu" value="{{$restaurant->menu}}">
								<p class="input-desc">Buffet or à la carte</p>
							</div>
					</div>
					<div class="field">
						<label>Menuplan Incl.</label>
							<div class="input-wrap">
								<input type="text" name="menuplan_incl" value="{{$restaurant->menuplan_incl}}">
								<p class="input-desc">What menu plan can I use to get into the restaurant</p>
							</div>
					</div>
					<div class="field">
						<label>Opening hours</label>
							<input type="text" name="opening_hours" value="{{$restaurant->opening_hours}}">
					</div>
					<div class="field">
						<label>Open for</label>
							<div class="input-wrap">
								<input type="text" name="open_for" value="{{$restaurant->open_for}}">
								<p class="input-desc">Breakfast - lunch or dinner</p>
							</div>
					</div>
					<div class="field">
						<label for="lbl-015">Drescode</label>
						<textarea id="lbl-015" rows="5" name="drescode">{{$restaurant->drescode}}</textarea>
					</div>
					
					<div class="images-box-holder">
						 <div class="details-form">
      <div class="form-room-item">
        <h3 class="form-name form-name-img">Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span></h3>
        <!-- <div>
                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div> -->
                
                  <div class="image" id="image" class="img-fluid">
                    
                  @foreach($restaurant_image as $restaurant_img)
				        <div class="images-box">

				          <div class="image">
				            <img src="{{url('/images/restaurant/'.$restaurant_img->image_name)}}" alt="#">
				          </div>
				          <p class="img-name">{{$restaurant_img->image_name}}</p>
				          <a href="{{route('restaurant-image-delete', $restaurant_img->id)}}" class="btn-delete" onclick="return confirm(' you want to delete?');">
				            <span class="far fa-trash-alt"></span>
				            <span></span>
				          </a>
				        </div>
				        @endforeach
                </div>
      </div>
    </div>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#rest_bar').addClass('active');
    $('#hotel_admin').addClass('active');
});
</script>
 <script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#rest_form').submit();
 });
});
</script> 
<script type="text/javascript">
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $('#image').append("<div class=\"col-md-2\">" +
            "<img class=\"imageThumb\" style=\"\" src=\"" + e.target.result + "\" title=\"" +  e.target.name + "\"/>" +
            "</div>");
          

        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    
  }
});

</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#room_form').submit();
 });
});
</script> 

@endsection
