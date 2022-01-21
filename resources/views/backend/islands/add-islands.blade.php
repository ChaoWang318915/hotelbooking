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
  						<li ><a href="{{url('/islands')}}"><span class="fas fa-chevron-left"></span>back</a></li>
  						<li id="button_id" class="button_id"><a href="#"><span class="far fa-save"></span>save</a></li>
               <li>
                  @include('backend.message')
                </li>
  					</ul>
  				</nav>
  				<!-- /content-menu -->
          <div class="content">
  					<div class="details-form">
  						<h3 class="form-name">Island Details</h3>
  						<form action="{{Route('island-save')}}" id="island_form" method="post" style="margin-bottom:45px;" enctype="multipart/form-data" >
                @csrf
  							<div class="field">
  								<label>Island Name*</label>
  								<input type="text" name="island_name" value="{{old('island_name')}}" class="@error('island_name') is-invalid @enderror">
                    
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
  								<input type="text" name="length_width" value="{{old('length_width')}}">
                   
  							</div>
                <div class="text-danger">
                          @error('length_width')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Size*</label>
  								<input type="text" class="short-input" name="size" value="{{old('size')}}">
  							</div>
                <div class="text-danger">
                          @error('size')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Distance to Male*</label>
  								<input type="text" class="short-input" name="distance_to_male" value="{{old('distance_to_male')}}">   
  							</div>
                      <div class="text-danger">
                          @error('distance_to_male')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Island usage*</label>
  								<input type="text" name="island_usage" value="{{old('island_usage')}}">
                  
  							</div>
                 <div class="text-danger">
                          @error('island_usage')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Population*</label>
  								<input type="text" name="population" value="{{old('population')}}">
  							</div>
                <div class="text-danger">
                          @error('population')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label>Google Coordinates*</label>
  								<input type="text" name="google_coordinates" value="{{old('google_coordinates')}}">
  							</div>
                <div class="text-danger">
                          @error('google_coordinates')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
  							<div class="field">
  								<label for="lbl-006">Neighbouring islands</label>
                  <div class="input-wrap">
  								<textarea id="lbl-006"  rows="7" name="neighbouring_islands">{{old('neighbouring_islands')}}</textarea>
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
  								<textarea id="lbl-007" rows="15" name="description">{{old('description')}}</textarea>
                </div>
  							</div>
                <div class="text-danger">
                          @error('description')
                        <span>{{ $message}}</span>
                        @enderror
                    </div>
            <div class="details-form">
      <div class="form-room-item">
        <h3 class="form-name form-name-img" style="margin-bottom: 10px">Images <span class="chooseimg float-right">
                  <input type="file" style="display:none;" title="Choose Images" id="files" name="file[]" multiple="multiple">
                  <label class="chooseimg1" for="files">Choose Images</lable></span></h3>
                  <p style="color: #b0b0b0">Recommended Image size 1090 x 700*</p>

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
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('#button_id').on('click',function(){
    
     $('#island_form').submit();
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