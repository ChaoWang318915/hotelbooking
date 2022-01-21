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
            	<li><a href="{{url('/restaurants-bars-overview',$hid)}}"><span class="fas fa-chevron-left"></span>back</a></li>
            	<li id="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
           
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
        <div class="content content-rest">
			<div class="restaurants-tabs">
				<ul>
					<li><a href="{{url('/add-restaurants',$hid)}}">Restaurant</a></li>
					<li class="active"><a href="{{url('/add-bars',$hid)}}">Bar</a></li>
					<li><a href="{{url('/add-menuplan',$hid)}}">Menuplan</a></li>
				</ul>
			</div>
			<div class="details-form">
				<form action="{{route('bar-create',$hid)}}" method="post" id="bar_form" enctype="multipart/form-data">
					@csrf
					<div class="field">
						<label>Bar name </label>
						<input type="text" name="bar_name" value="{{ old('bar_name') }}">
					</div>
					<div class="field">
						<label for="lbl-004">Description </label>
						<textarea id="lbl-004" rows="5" name="description"></textarea>
					</div>
					<h3 class="form-name form-name-img">Images</h3>
						<div class="images-box-holder">
							<div class="details-form">
      <div class="form-room-item">
        
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</label></span></h3>
        <!-- <div>
                  <input type="file" id="files" name="file[]" multiple="multiple">
                </div> -->
                
                  <div class="image" id="image" class="img-fluid">
                    
                  
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
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#bar_form').submit();
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
@endsection
