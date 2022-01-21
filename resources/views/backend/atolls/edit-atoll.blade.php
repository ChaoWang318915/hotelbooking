@extends('layouts.backend')
@section('content')
<style type="text/css">
  textarea{resize: auto;}
  
  .details-form{
    min-width: 550px;
  }

  label {
	  font-weight: 400 !important;
	  font-family: "Poppins", sans-serif !important;
  }
</style>
        <!-- /content-menu -->
      <div class="d-flex">
        <div class="main-sidebar"></div>
        <div class="content-area">
          <nav class="content-menu">
            <ul class="nav">
              <li><a href="{{url('/atolls')}}"><span class="fas fa-chevron-left"></span>back</a></li>
              <li id="button_id" class="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
              <!-- <li><a href="add-images.html"><span class="fas fa-plus"></span>add images</a></li> -->
            </ul>
          </nav>

  				<!-- /content-menu -->
          <div class="content content-room">
  					<div class="details-form details-form-moduls">
              <div class="form-name">
  						  <h3>Atoll Details</h3>
              </div>
  						<form action="{{route('atoll-update',$eatoll->id)}}" method="post" id="atoll_id"  enctype="multipart/form-data" style="margin-bottom:45px;">
              @csrf
              			<div class="blck">
  							<div class="field">
  								<label>Atoll Name*</label>
  								<input type="text"  name="atoll_name" value="{{$eatoll->atoll_name}}" required autocomplete="name">
  								
  							</div>
  							<div class="text-danger">
                 					@error('atoll_name')
             						<span>{{ $message}}</span>
             						@enderror
          					</div>
          				</div>
                  <input type="hidden" name="atoll_status" value="{{$eatoll->atoll_status}}">

                		<div class="blck">	
  							<div class="field">
  								<label>Atoll name in Dhivehi*</label>
  								<input type="text" name="atoll_name_dhivehi" value="{{$eatoll->atoll_name_dhivehi}}" >
  							</div>
  							<div class="text-danger">
              					@error('atoll_name_dhivehi')
             					<span>{{ $message}}</span>
             					@enderror
             				</div>
             			</div>

             			<div class="blck">
  							<div class="field">
  								<label>Length x width</label>
  								<input type="text" name="length_width" value="{{$eatoll->length_width}}">
  							</div>
  							<div class="text-danger">
                				@error('length_width')
                				<span>{{ $message}}</span>
                				@enderror
                			</div>
                		</div>

                		<div class="blck">
  							<div class="field">
  								<label>Number of islands in the atoll</label>
  								<input type="number" class="short-inputs" name="number_islands_atoll" value="{{$eatoll->number_islands_atoll}}">
  							</div>
  							<div class="text-danger">
              					@error('number_islands_atoll')
             					<span>{{ $message}}</span>
              					@enderror
              				</div>
         	 			</div>


         	 			<div class="blck">
  							<div class="field">
  								<label>Distance to Male</label>
  								<input type="number" class="short-inputs" name="distance_to_male" value="{{$eatoll->distance_to_male}}">
  							</div>
  							<div class="text-danger">	
              					@error('distance_to_male')
             					<span class="text-danger">{{ $message}}</span>
              					@enderror
              				</div>
          				</div>

          				<div class="blck">
  							<div class="field">
  								<label>Residents</label>
  								<input type="number" class="short-inputs" name="resident" value="{{ $eatoll->resident}}">
  							</div>
  							<div class="text-danger">	
             		 			@error('resident')
             					<span class="text-danger">{{ $message}}</span>
              					@enderror
              				</div>
          				</div>

          				<div class="blck">
  							<div class="field">
  								<label>Number of resorts in the atoll</label>
  								<input type="number" class="short-inputs" name="number_resorts_in_atoll" value="{{$eatoll->number_resorts_in_atoll}}">
  							</div>
  							<div class="text-danger">
                				@error('number_resorts_in_atoll')
             					<span class="text-danger">{{ $message}}</span>
              				@enderror
              				</div>
              			</div>

              			<div class="blck">
  							<div class="field">
  								<label>Google Coordinates*</label>
  								<input type="text" name="google_coordinates" value="{{$eatoll->google_coordinates}}">
  							</div>
  							<div class="text-danger">
                				@error('google_coordinates')
             					<span class="text-danger">{{ $message}}</span>
             					@enderror
             				</div>
          				</div>

          				<div class="blck">
  							<div class="field">
  								<label for="lbl-002">Inhabited islands</label>
  							  <div class="input-wrap">
  									<textarea id="lbl-002" rows="7" name="inhabited_islands">{{$eatoll->inhabited_islands}}</textarea>
  								</div>
  							</div>
  							<div class="text-danger">
                   				@error('inhabited_islands')
             					<span>{{ $message}}</span>
              					@enderror
  							</div>
  						</div>

  						<div class="blck">
  							<div class="field field-desc">
  								<label for="lbl-003">Description</label>
  								 <div class="input-wrap">
  								<textarea id="lbl-003" rows="15" name="description" >{{$eatoll->description}}</textarea>
  								</div>
  							</div>

  							<div class="text-danger">
                 				@error('description')
             					<span class="text-danger">{{ $message}}</span>
              					@enderror
  							</div>
  						</div>
                
  						
  					</div>
  	 	<!-- <div class="details-form">
            <div class="form-room-item">
                <div class="form-name">
                <h3 class="form-name-img">Images <span class="chooseimg2 float-right">  
				<input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable>
				  </span>
				</h3>
                </div>
                
                <div>
                </div>
                
                <div class="image" id="image" class="img-fluid">
                </div>

            </div>
                @foreach($atoll_image as $atoll_images)
        	<div class="images-box" style="margin-left: 0;">
          		<div class="image">
            		<img src="{{url('/images/atoll/'.$atoll_images->image_name)}}" alt="#" class="img-fluid">
          		</div>
          		<p class="img-name">{{$atoll_images->image_name}}</p>
          		<a href="{{route('atoll-image-delete', $atoll_images->id)}}" class="btn-delete">
            		<span class="far fa-trash-alt"></span>
          		</a>
        	</div>
         @endforeach
    	</div>  -->

            </form>
  			 </div>
  			</div>
      </div>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#atoll_id').submit();
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
          $('#image').append("<div class=\"col-md-2\"> " +
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