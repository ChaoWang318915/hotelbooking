@extends('layouts.backend')
@section('content')

<style type="text/css">
  textarea{resize: auto;}
</style>
<!-- /content-menu -->
<div class="d-flex">
  <div class="main-sidebar"></div>
  <div class="content-area">
  	<nav class="content-menu">
  		<ul class="nav">
  			 <li>
          <a href="{{url('/islands')}}">
            <span class="fas fa-chevron-left"></span>back
          </a>
         </li>
  			 <li id="button_id" class="button_id">
           <a href="#">
            <span class="far fa-save"></span>save
           </a>
          </li>
          <li>
              @include('backend.message')
              @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
          </li>
        
  		</ul>
  	</nav>
<!-- /content-menu -->
<div class="content content-room">
  <div class="details-form  details-form-moduls">
   <h3 class="form-name">Island Details</h3>
  <form action="{{route('islands-update',$islands->id)}}" id="islandedit_form" method="post" style="margin-bottom:45px;" enctype="multipart/form-data">
   @csrf
    <input type="hidden" name="island_status" value="{{$islands->island_status}}">
  		<div class="field">
  			<label>Island Name*</label>
  			<input type="text" name="island_name" value="{{$islands->island_name}}" class="@error('island_name') is-invalid @enderror">
      </div>
      
      <div class="text-danger">
        @error('island_name')
          <span>{{ $message}}</span>
        @enderror
      </div>
  							
      <div class="field">
  			<label>Atoll*</label>
  			  <select id="lbl-005" name="atoll_id">
            <option value="0">Select Atoll</option>
            <option value="{{$islands->atoll_id}}" selected>{{$islands->atoll_name}}</option>
              @foreach($atolls as $atoll)
  							<option value="{{$atoll->id}}">{{$atoll->atoll_name}}</option>
  						@endforeach
  				</select>
                   
  		</div>
      
      <div class="text-danger">
          @error('atoll_id')
            <span>{{ $message}}</span>
          @enderror
      </div>
  							
      <div class="field">
  			<label>Length x width*</label>
  				<input type="text" name="length_width" value="{{$islands->length_width}}">
      </div>
                
      <div class="text-danger">
        @error('length_width')
          <span>{{ $message}}</span>
        @enderror
      </div>
  		
    <div class="field">
  	  <label>Size*</label>
  		  <input type="text" class="short-input" name="size" value="{{$islands->size}}">
  	</div>
    
    <div class="text-danger">
      @error('size')
        <span>{{ $message}}</span>
      @enderror
    </div>
  	
  <div class="field">
    <label>Distance to Male*</label>
  	<input type="text" class="short-input" name="distance_to_male" value="{{$islands->distance_to_male}}">   
  </div>
  
  <div class="text-danger">
    @error('distance_to_male')
      <span>{{ $message}}</span>
    @enderror
  </div>
  
  <div class="field">
    <label>Island usage*</label>
  	  <input type="text" name="island_usage" value="{{$islands->island_usage}}">            
  </div>
  
  <div class="text-danger">
    @error('island_usage')
      <span>{{ $message}}</span>
    @enderror
  </div>
  
  <div class="field">
    <label>Population*</label>
  	  <input type="text" name="population" value="{{$islands->population}}">
  </div>
  
  <div class="text-danger">
    @error('population')
      <span>{{ $message}}</span>
    @enderror
  </div>
  
  <div class="field">

    <label>Google Coordinates*</label>
        <input type="text" name="google_coordinates" value="{{$islands->google_coordinates}}">
  </div>
  
  <div class="text-danger">
    @error('google_coordinates')
      <span>{{ $message}}</span>
    @enderror
   
  </div>
  
  <div class="field">
  	<label for="lbl-006">Neighbouring islands</label>
     <div class="input-wrap">
  	   <textarea id="lbl-006"  rows="7" name="neighbouring_islands">{{$islands->neighbouring_islands}}</textarea>
     </div>
  </div>
  
  <div class="text-danger">
    @error('neighbouring_islands')
      <span>{{ $message}}</span>
    @enderror
  </div>
  
  <div class="field field-desc">
    <label for="lbl-007">Description*</label>
    <div class="input-wrap">
  	  <textarea id="lbl-007" rows="15" name="description">{!!$islands->description!!}</textarea>
    </div>
  </div>
  
  <div class="text-danger">
    @error('description')
      <span>{{ $message}}</span>
    @enderror
  </div>
 </div>
          
 <div class="details-form">
    <div class="form-room-item">
      <div class="form-name" style="margin-bottom: 10px">
        <h3 class="form-name-img">Images <span class="chooseimg2 float-right"><input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
          <label class="chooseimg1" for="files">Choose Images</lable> </span></h3>
      </div>          
          <p style="color: #b0b0b0">Recommended Image size 1090 x 700*</p>
      
      <div>
          
      </div>
                
      <div class="image" id="image" class="img-fluid">
        @foreach($island_image as $island_images)                                
          <div class="images-box" style="margin-left: 0;">                                  
             <div class="image">
                <img src="{{url('/images/island/'.$island_images->image_name)}}" alt="#" class="img-fluid">
              </div>
              <p class="img-name">{{$island_images->image_name}}</p>
              <a href="{{route('island-image-delete',$island_images->id)}}" class="btn-delete">
                    <span class="far fa-trash-alt"></span>
              </a>                    
          </div>
        @endforeach
      </div>
  	</form>
   </div>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // tinymce.init({selector:'textarea#lbl-007'});
  $('#button_id').on('click',function(){
    
     $('#islandedit_form').submit();
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
          console.log('file',file);
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
